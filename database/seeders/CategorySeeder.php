<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $mainCategories = [
            [
                'name' => 'ເຄື່ອງດື່ມ',
                'description' => 'ນ້ຳອັດລົມ ນ້ຳຜົນໄມ້ ແລະ ເຄື່ອງດື່ມອື່ນໆ',
                'color' => 'blue',
                'sort_order' => 1,
            ],
            [
                'name' => 'ອາຫານແຫ້ງ',
                'description' => 'ມາມ່າ ບິດ ແລະ ອາຫານແຫ້ງອື່ນໆ',
                'color' => 'orange',
                'sort_order' => 2,
            ],
            [
                'name' => 'ເຄື່ອງໃຊ້ໃນບ້ານ',
                'description' => 'ສະບູ ຍາສີຟັນ ແລະ ເຄື່ອງໃຊ້ສ່ວນຕົວ',
                'color' => 'green',
                'sort_order' => 3,
            ],
            [
                'name' => 'ຂອງຫວານ',
                'description' => 'ບອນບອນ ແກະ ແລະ ຂອງຫວານອື່ນໆ',
                'color' => 'pink',
                'sort_order' => 4,
            ],
            [
                'name' => 'ສູບຢາ',
                'description' => 'ບຸຫລີ່ ແລະ ຜະລິດຕະພັນຢາສູບ',
                'color' => 'red',
                'sort_order' => 5,
            ],
            [
                'name' => 'ເຄື່ອງປຸງລົດ',
                'description' => 'ນ້ຳປປາ ນ້ຳມັນພືດ ແລະ ເຄື່ອງປຸງລົດອື່ນໆ',
                'color' => 'yellow',
                'sort_order' => 6,
            ],
            [
                'name' => 'ຢາ ແລະ ສຸຂະພາບ',
                'description' => 'ຢາແຜນປະຈຳບ້ານ ວິດຕາມິນ ແລະ ຜະລິດຕະພັນເພື່ອສຸຂະພາບ',
                'color' => 'teal',
                'sort_order' => 7,
            ],
            [
                'name' => 'ອຸປະກອນອື່ນໆ',
                'description' => 'ຖ່ານໄຟ ຫຼອດໄຟ ແລະ ອຸປະກອນອື່ນໆ',
                'color' => 'gray',
                'sort_order' => 8,
            ],
        ];

        foreach ($mainCategories as $category) {
            Category::create($category);
        }

        $subCategories = [
            // ເຄື່ອງດື່ມ (ID: 1)
            ['name' => 'ນ້ຳອັດລົມ', 'parent_id' => 1, 'color' => 'blue', 'sort_order' => 1],
            ['name' => 'ນ້ຳຜົນໄມ້', 'parent_id' => 1, 'color' => 'blue', 'sort_order' => 2],
            ['name' => 'ນ້ຳດື່ມ', 'parent_id' => 1, 'color' => 'blue', 'sort_order' => 3],
            ['name' => 'ເບຍ', 'parent_id' => 1, 'color' => 'blue', 'sort_order' => 4],
            ['name' => 'ເຫຼົ້າ', 'parent_id' => 1, 'color' => 'blue', 'sort_order' => 5],

            // ອາຫານແຫ້ງ (ID: 2)
            ['name' => 'ມາມ່າ', 'parent_id' => 2, 'color' => 'orange', 'sort_order' => 1],
            ['name' => 'ບິດ', 'parent_id' => 2, 'color' => 'orange', 'sort_order' => 2],
            ['name' => 'ເຄັກ', 'parent_id' => 2, 'color' => 'orange', 'sort_order' => 3],
            ['name' => 'ເຂົ້າຂຽວ', 'parent_id' => 2, 'color' => 'orange', 'sort_order' => 4],

            // ເຄື່ອງໃຊ້ໃນບ້ານ (ID: 3)
            ['name' => 'ສະບູ', 'parent_id' => 3, 'color' => 'green', 'sort_order' => 1],
            ['name' => 'ຢາສີຟັນ', 'parent_id' => 3, 'color' => 'green', 'sort_order' => 2],
            ['name' => 'ເຄື່ອງສໍາອາງ', 'parent_id' => 3, 'color' => 'green', 'sort_order' => 3],
            ['name' => 'ຜ້າອະນາໄມ', 'parent_id' => 3, 'color' => 'green', 'sort_order' => 4],
            ['name' => 'ຢາຊຸດຜົມ', 'parent_id' => 3, 'color' => 'green', 'sort_order' => 5],

            // ຂອງຫວານ (ID: 4) - ບໍ່ມີ subcategories

            // ສູບຢາ (ID: 5) - ບໍ່ມີ subcategories

            // ເຄື່ອງປຸງລົດ (ID: 6)
            ['name' => 'ນ້ຳປປາ', 'parent_id' => 6, 'color' => 'yellow', 'sort_order' => 1],
            ['name' => 'ນ້ຳມັນພືດ', 'parent_id' => 6, 'color' => 'yellow', 'sort_order' => 2],
            ['name' => 'ເຄື່ອງເທດ', 'parent_id' => 6, 'color' => 'yellow', 'sort_order' => 3],
            ['name' => 'ນ້ຳຕານ', 'parent_id' => 6, 'color' => 'yellow', 'sort_order' => 4],
            ['name' => 'ເກືອ', 'parent_id' => 6, 'color' => 'yellow', 'sort_order' => 5],

            // ຢາ ແລະ ສຸຂະພາບ (ID: 7)
            ['name' => 'ຢາແກ້ເຈັບ', 'parent_id' => 7, 'color' => 'teal', 'sort_order' => 1],
            ['name' => 'ຢາແກ້ໄຂ້', 'parent_id' => 7, 'color' => 'teal', 'sort_order' => 2],
            ['name' => 'ວິດຕາມິນ', 'parent_id' => 7, 'color' => 'teal', 'sort_order' => 3],
            ['name' => 'ຢາປິວ', 'parent_id' => 7, 'color' => 'teal', 'sort_order' => 4],

            // ອຸປະກອນອື່ນໆ (ID: 8)
            ['name' => 'ຖ່ານໄຟ', 'parent_id' => 8, 'color' => 'gray', 'sort_order' => 1],
            ['name' => 'ຫຼອດໄຟ', 'parent_id' => 8, 'color' => 'gray', 'sort_order' => 2],
            ['name' => 'ສາຍໄຟ', 'parent_id' => 8, 'color' => 'gray', 'sort_order' => 3],
            ['name' => 'ເຄື່ອງເຂົ້າໄຟ', 'parent_id' => 8, 'color' => 'gray', 'sort_order' => 4],
            ['name' => 'ກະດາດ', 'parent_id' => 8, 'color' => 'gray', 'sort_order' => 5],
        ];

        foreach ($subCategories as $category) {
            Category::create($category);
        }

        $this->command->info('✅ Created ' . Category::count() . ' categories (8 main categories with subcategories)');
    }
}
