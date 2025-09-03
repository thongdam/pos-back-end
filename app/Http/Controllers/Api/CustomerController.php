<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('customer_code', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        if ($request->has('membership_type')) {
            $query->where('membership_type', $request->membership_type);
        }

        if ($request->has('active')) {
            $query->active();
        }

        $customers = $query->orderBy('created_at', 'desc')->paginate(20);

        return response()->json($customers);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:customers,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:ຊາຍ,ຍິງ,ອື່ນໆ',
            'membership_type' => 'nullable|in:ທົ່ວໄປ,ເງິນ,ທອງ,ເພັດ',
        ]);

        $data = $request->all();

        // Generate customer code
        $lastCustomer = Customer::latest('id')->first();
        $nextId = $lastCustomer ? $lastCustomer->id + 1 : 1;
        $data['customer_code'] = 'CUS-' . str_pad($nextId, 6, '0', STR_PAD_LEFT);

        $customer = Customer::create($data);

        return response()->json($customer, 201);
    }

    public function show(Customer $customer)
    {
        return response()->json($customer->load('sales'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:customers,email,' . $customer->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:ຊາຍ,ຍິງ,ອື່ນໆ',
            'membership_type' => 'nullable|in:ທົ່ວໄປ,ເງິນ,ທອງ,ເພັດ',
        ]);

        $customer->update($request->all());

        return response()->json($customer);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json([
            'message' => 'Customer deleted successfully'
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $customers = Customer::active()
            ->where(function($q) use ($query) {
                $q->where('first_name', 'like', "%{$query}%")
                  ->orWhere('last_name', 'like', "%{$query}%")
                  ->orWhere('customer_code', 'like', "%{$query}%")
                  ->orWhere('phone', 'like', "%{$query}%");
            })
            ->limit(10)
            ->get();

        return response()->json($customers);
    }
}
