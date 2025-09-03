<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        $query = Sale::with(['customer', 'cashier', 'items.product']);
        if ($request->has('date_from')) {
            $query->whereDate('created_at', '>=', $request->get('date_from'));
        }
        if ($request->has('date_to')) {
            $query->whereDate('created_at', '<=', $request->get('date_to'));
        }
        $sales = $query->orderByDesc('created_at')->paginate($request->get('per_page', 15));
        return response()->json([
            'success' => true,
            'data' => $sales
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'nullable|exists:customers,id',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'payment_method' => 'required|string',
            // 'paid_amount' => 'required|numeric|min:0',
        ]);
        return DB::transaction(function () use ($validated, $request) {
            // Calculate totals
            $subtotal = 0;
            $saleItems = [];
            foreach ($validated['items'] as $item) {
                $product = Product::findOrFail($item['product_id']);
                // Check stock
                if ($product->track_stock && $product->stock < $item['quantity']) {
                    throw new \Exception("Insufficient stock for product: {$product->name}");
                }
                $itemSubtotal = $product->price * $item['quantity'];
                $subtotal += $itemSubtotal;
                $saleItems[] = [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_sku' => $product->sku,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                    'discount' => $item['discount'] ?? 0,
                    'subtotal' => $itemSubtotal,
                ];
                // Update stock
                if ($product->track_stock) {
                    $product->decrement('stock', $item['quantity']);
                }
            }
            // Create sale
            $sale = Sale::create([
                'sale_number' => 'S' . date('Ymd') . str_pad(Sale::count() + 1, 4, '0', STR_PAD_LEFT),
                'customer_id' => $validated['customer_id'],
                'cashier_id' => $request->user()->id,
                'subtotal' => $subtotal,
                'discount_amount' => $request->get('discount_amount', 0),
                'tax_amount' => $request->get('tax_amount', 0),
                'total' => $subtotal - $request->get('discount_amount', 0) + $request->get('tax_amount', 0),
                // 'paid_amount' => $validated['paid_amount'],
                // 'change_amount' => $validated['paid_amount'] - ($subtotal - $request->get('discount_amount', 0) + $request->get('tax_amount', 0)),
                'payment_method' => $validated['payment_method'],
                'payment_status' => 'ສຳເລັດ',
                'completed_at' => now(),
            ]);
            // Create sale items
            foreach ($saleItems as $item) {
                $sale->items()->create($item);
            }
            return response()->json([
                'success' => true,
                'message' => 'Sale created successfully',
                'data' => $sale->load(['customer', 'items.product'])
            ], 201);
        });
    }

    public function show($id)
    {
        $sale = Sale::with(['customer', 'cashier', 'items.product'])->findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $sale
        ]);
    }
}
