<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            [
                'customer_code' => 'CUS-000001',
                'first_name' => 'ສົມປອງ',
                'last_name' => 'ວົງສະຫວ່າງ',
                'email' => 'sompong@email.com',
                'phone' => '020-12345678',
                'address' => 'ບ້ານດົງມັກແກ້ວ, ເມືອງສີສັດຕະນາກ, ນະຄອນຫຼວງວຽງຈັນ',
                'date_of_birth' => '1990-05-15',
                'gender' => 'ຊາຍ',
                'membership_type' => 'ທອງ',
                'points' => 1250,
                'total_spent' => 2500000,
                'total_orders' => 15,
                'last_visit' => now()->subDays(1),
            ],
            [
                'customer_code' => 'CUS-000002',
                'first_name' => 'ນາງມາລີ',
                'last_name' => 'ພັນສະຫວ່າງ',
                'email' => 'malee@email.com',
                'phone' => '020-87654321',
                'address' => 'ບ້ານໂພນທອງ, ເມືອງໄຊເສດຖາ, ນະຄອນຫຼວງວຽງຈັນ',
                'date_of_birth' => '1985-12-20',
                'gender' => 'ຍິງ',
                'membership_type' => 'ເງິນ',
                'points' => 850,
                'total_spent' => 1200000,
                'total_orders' => 8,
                'last_visit' => now()->subHours(3),
            ],
            [
                'customer_code' => 'CUS-000003',
                'first_name' => 'ວິໄລ',
                'last_name' => 'ບຸນມາ',
                'email' => 'vilai@email.com',
                'phone' => '020-11111111',
                'address' => 'ບ້ານນາດອກໄມ້, ເມືອງຈັນທະບູລີ, ນະຄອນຫຼວງວຽງຈັນ',
                'date_of_birth' => '1992-08-10',
                'gender' => 'ຍິງ',
                'membership_type' => 'ເພັດ',
                'points' => 2500,
                'total_spent' => 5000000,
                'total_orders' => 25,
                'last_visit' => now()->subMinutes(30),
            ],
            [
                'customer_code' => 'CUS-000004',
                'first_name' => 'ບຸນທັນ',
                'last_name' => 'ຫງອຄ',
                'phone' => '020-22222222',
                'address' => 'ບ້ານວັດຕາກ, ເມືອງຫາດຊາຍຟອງ, ນະຄອນຫຼວງວຽງຈັນ',
                'gender' => 'ຊາຍ',
                'membership_type' => 'ທົ່ວໄປ',
                'points' => 150,
                'total_spent' => 300000,
                'total_orders' => 3,
                'last_visit' => now()->subWeeks(1),
            ],
            [
                'customer_code' => 'CUS-000005',
                'first_name' => 'ແກ້ວ',
                'last_name' => 'ສີດາ',
                'email' => 'kaew@email.com',
                'phone' => '020-33333333',
                'address' => 'ບ້ານໂນນໂຮ້ງ, ເມືອງໄຊທານີ, ນະຄອນຫຼວງວຽງຈັນ',
                'date_of_birth' => '1988-03-25',
                'gender' => 'ຍິງ',
                'membership_type' => 'ທອງ',
                'points' => 980,
                'total_spent' => 1800000,
                'total_orders' => 12,
                'last_visit' => now()->subDays(3),
            ],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
        $this->command->info('✅ Created ' . Customer::count() . ' customers');
    }
}
