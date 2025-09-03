<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if (Category::count() === 0) {
            $this->command->error('❌ Please run CategorySeeder first!');
            $this->command->info('Run: php artisan db:seed --class=CategorySeeder');
            return;
        }
        // Get category IDs
        $sodaCategory = Category::where('name', 'ນ້ຳອັດລົມ')->first();
        $waterCategory = Category::where('name', 'ນ້ຳດື່ມ')->first();
        $beerCategory = Category::where('name', 'ເບຍ')->first();
        $noodleCategory = Category::where('name', 'ມາມ່າ')->first();
        $snackCategory = Category::where('name', 'ຂອງຫວານ')->first();
        $tobaccoCategory = Category::where('name', 'ສູບຢາ')->first();
        $householdCategory = Category::where('name', 'ເຄື່ອງໃຊ້ໃນບ້ານ')->first();
        $seasoningCategory = Category::where('name', 'ເຄື່ອງປຸງລົດ')->first();

        // subcategories
        $beverageCategory = Category::where('name', 'ເຄື່ອງດື່ມ')->first();
        $foodCategory = Category::where('name', 'ອາຫານແຫ້ງ')->first();
        $products = [
            // ເຄື່ອງດື່ມ (5)
            [
                'name' => 'Coca Cola 330ml',
                'description' => 'ໂຄ້ກ ກະປ໋ອງ 330ml',
                'sku' => 'COKE-330',
                'barcode' => '8851234567890',
                'price' => 8000,
                'cost' => 6000,
                'category_id' => $sodaCategory?->id ?? $beverageCategory->id,
                'stock' => 150,
                'min_stock' => 20,
                'max_stock' => 300,
                'unit' => 'ກະປ໋ອງ',
                'weight' => 0.33,
                'dimensions' => '6.5x6.5x12cm',
                'notes' => 'ເກັບໃນອຸນຫະພູມປົກກະຕິ',
            ],
            [
                'name' => 'Pepsi 500ml',
                'description' => 'ເປັບຊີ ຂວດ 500ml',
                'sku' => 'PEPSI-500',
                'barcode' => '8851234567891',
                'price' => 10000,
                'cost' => 7500,
                'category_id' => $sodaCategory?->id ?? $beverageCategory->id,
                'stock' => 80,
                'min_stock' => 15,
                'max_stock' => 200,
                'unit' => 'ຂວດ',
                'weight' => 0.5,
                'dimensions' => '7x7x20cm',
                'notes' => 'ເກັບໃນອຸນຫະພູມເຢັນ',
            ],
            [
                'name' => 'ນ້ຳດື່ມ Crystal 600ml',
                'description' => 'ນ້ຳດື່ມຄຣິສຕັລ',
                'sku' => 'WATER-600',
                'barcode' => '8851234567900',
                'price' => 3000,
                'cost' => 2000,
                'category_id' => $waterCategory?->id ?? $beverageCategory->id,
                'stock' => 200,
                'min_stock' => 50,
                'max_stock' => 500,
                'unit' => 'ຂວດ',
                'weight' => 0.6,
            ],
            [
                'name' => 'Beer Lao 640ml',
                'description' => 'ເບຍລາວ ຂວດໃຫຍ່',
                'sku' => 'BEERLAO-640',
                'barcode' => '8851234567910',
                'price' => 12000,
                'cost' => 9000,
                'category_id' => $beerCategory?->id ?? $beverageCategory->id,
                'stock' => 60,
                'min_stock' => 12,
                'max_stock' => 150,
                'unit' => 'ຂວດ',
                'weight' => 0.64,
                'notes' => 'ຕ້ອງເກັບໃນຕູ້ເຢັນ, ຫ້າມຂາຍໃຫ້ເດັກ',
            ],
            [
                'name' => 'Chang Beer 320ml',
                'description' => 'ເບຍຊ້າງ ກະປ໋ອງ',
                'sku' => 'CHANG-320',
                'barcode' => '8851234567911',
                'price' => 10000,
                'cost' => 7500,
                'category_id' => $beerCategory?->id ?? $beverageCategory->id,
                'stock' => 80,
                'min_stock' => 15,
                'max_stock' => 200,
                'unit' => 'ກະປ໋ອງ',
                'weight' => 0.32,
                'notes' => 'ຫ້າມຂາຍໃຫ້ເດັກ',
            ],

            // ອາຫານແຫ້ງ (3)
            [
                'name' => 'Mama ຫມູ',
                'description' => 'ມາມ່າລົດຫມູ',
                'sku' => 'MAMA-PORK',
                'barcode' => '8851234567920',
                'price' => 4000,
                'cost' => 3000,
                'category_id' => $noodleCategory?->id ?? $foodCategory->id,
                'stock' => 300,
                'min_stock' => 50,
                'max_stock' => 600,
                'unit' => 'ຖົງ',
                'weight' => 0.06,
                'dimensions' => '10x10x2cm',
            ],
            [
                'name' => 'Mama ກຸ້ງ',
                'description' => 'ມາມ່າລົດກຸ້ງ',
                'sku' => 'MAMA-SHRIMP',
                'barcode' => '8851234567921',
                'price' => 4000,
                'cost' => 3000,
                'category_id' => $noodleCategory?->id ?? $foodCategory->id,
                'stock' => 250,
                'min_stock' => 50,
                'max_stock' => 500,
                'unit' => 'ຖົງ',
                'weight' => 0.06,
            ],
            [
                'name' => 'Wai Wai ແກງພະ',
                'description' => 'ວາຍວາຍ ລົດແກງພະ',
                'sku' => 'WAIWAI-CURRY',
                'barcode' => '8851234567922',
                'price' => 3500,
                'cost' => 2500,
                'category_id' => $noodleCategory?->id ?? $foodCategory->id,
                'stock' => 200,
                'min_stock' => 40,
                'max_stock' => 400,
                'unit' => 'ຖົງ',
                'weight' => 0.06,
            ],

            // ຂອງຫວານ (3)
            [
                'name' => 'Lay\'s Classic 48g',
                'description' => 'ເລວສ໌ ລົດດັ້ງເດີມ',
                'sku' => 'LAYS-CLASSIC',
                'barcode' => '8851234567930',
                'price' => 12000,
                'cost' => 9000,
                'category_id' => $snackCategory->id,
                'stock' => 80,
                'min_stock' => 20,
                'max_stock' => 200,
                'unit' => 'ຖົງ',
                'weight' => 0.048,
            ],
            [
                'name' => 'Oreo Original',
                'description' => 'ໂອຣິໂອ ດັ້ງເດີມ',
                'sku' => 'OREO-ORIG',
                'barcode' => '8851234567931',
                'price' => 15000,
                'cost' => 12000,
                'category_id' => $snackCategory->id,
                'stock' => 60,
                'min_stock' => 15,
                'max_stock' => 150,
                'unit' => 'ຫໍ່',
                'weight' => 0.137,
            ],
            [
                'name' => 'ຊອກໂກແລດ Toblerone',
                'description' => 'ຊອກໂກແລດໂຕເບຣໂລນ',
                'sku' => 'TOBLERONE-100',
                'barcode' => '8851234567932',
                'price' => 45000,
                'cost' => 35000,
                'category_id' => $snackCategory->id,
                'stock' => 25,
                'min_stock' => 5,
                'max_stock' => 50,
                'unit' => 'ແທ່ງ',
                'weight' => 0.1,
                'notes' => 'ເກັບໃນອຸນຫະພູມເຢັນ',
            ],

            // ເຄື່ອງໃຊ້ໃນບ້ານ (2)
            [
                'name' => 'ສະບູ Dove',
                'description' => 'ສະບູດອບ',
                'sku' => 'SOAP-DOVE',
                'barcode' => '8851234567940',
                'price' => 18000,
                'cost' => 14000,
                'category_id' => $householdCategory->id,
                'stock' => 50,
                'min_stock' => 10,
                'max_stock' => 100,
                'unit' => 'ກ້ອນ',
                'weight' => 0.09,
            ],
            [
                'name' => 'ຢາສີຟັນ Colgate',
                'description' => 'ຢາສີຟັນໂຄເກດ',
                'sku' => 'TOOTHPASTE-COL',
                'barcode' => '8851234567941',
                'price' => 25000,
                'cost' => 20000,
                'category_id' => $householdCategory->id,
                'stock' => 40,
                'min_stock' => 8,
                'max_stock' => 80,
                'unit' => 'ຫໍ່',
                'weight' => 0.12,
            ],

            // ສູບຢາ (1 รายการ)
            [
                'name' => 'Marlboro Red',
                'description' => 'ມາຣບໍໂຣແດງ',
                'sku' => 'MARLBORO-RED',
                'barcode' => '8851234567950',
                'price' => 28000,
                'cost' => 22000,
                'category_id' => $tobaccoCategory->id,
                'stock' => 100,
                'min_stock' => 20,
                'max_stock' => 200,
                'unit' => 'ຊຸດ',
                'weight' => 0.02,
                'notes' => 'ຫ້າມຂາຍໃຫ້ເດັກອາຍຸຕ່ຳກວ່າ 18 ປີ',
            ],

            // ເຄື່ອງປຸງລົດ (1)
            [
                'name' => 'ນ້ຳປປາ Healthy Boy',
                'description' => 'ນ້ຳປປາເຮວທີບອຍ',
                'sku' => 'FISHSAUCE-HB',
                'barcode' => '8851234567960',
                'price' => 35000,
                'cost' => 28000,
                'category_id' => $seasoningCategory?->id ?? $foodCategory->id,
                'stock' => 45,
                'min_stock' => 12,
                'max_stock' => 100,
                'unit' => 'ຂວດ',
                'weight' => 0.7,
                'dimensions' => '6x6x18cm',
            ],
        ];

        // Insert all products
        foreach ($products as $product) {
            Product::create($product);
        }

        $this->command->info('✅ Created ' . count($products) . ' products successfully');

        // Display statistics
        $this->command->info('📊 Product Statistics:');

        $beverageCount = Product::whereHas('category', function($q) {
            $q->where('name', 'ເຄື່ອງດື່ມ')
              ->orWhere('parent_id', Category::where('name', 'ເຄື່ອງດື່ມ')->first()?->id);
        })->count();

        $foodCount = Product::whereHas('category', function($q) {
            $q->where('name', 'ອາຫານແຫ້ງ')
              ->orWhere('parent_id', Category::where('name', 'ອາຫານແຫ້ງ')->first()?->id);
        })->count();

        $snackCount = Product::whereHas('category', function($q) {
            $q->where('name', 'ຂອງຫວານ');
        })->count();

        $householdCount = Product::whereHas('category', function($q) {
            $q->where('name', 'ເຄື່ອງໃຊ້ໃນບ້ານ');
        })->count();

        $tobaccoCount = Product::whereHas('category', function($q) {
            $q->where('name', 'ສູບຢາ');
        })->count();

        $seasoningCount = Product::whereHas('category', function($q) {
            $q->where('name', 'ເຄື່ອງປຸງລົດ');
        })->count();

        $lowStockCount = Product::whereColumn('stock', '<=', 'min_stock')->count();

        $this->command->info("- ເຄື່ອງດື່ມ (Beverages): {$beverageCount}");
        $this->command->info("- ອາຫານແຫ້ງ (Dry Food): {$foodCount}");
        $this->command->info("- ຂອງຫວານ (Snacks): {$snackCount}");
        $this->command->info("- ເຄື່ອງໃຊ້ໃນບ້ານ (Household): {$householdCount}");
        $this->command->info("- ສູບຢາ (Tobacco): {$tobaccoCount}");
        $this->command->info("- ເຄື່ອງປຸງລົດ (Seasonings): {$seasoningCount}");
        $this->command->info("- ສິນຄ້າໃກ້ໝົດ (Low Stock): {$lowStockCount}");

        $this->command->info("\n🎯 Total Products: " . Product::count());
    }
}
