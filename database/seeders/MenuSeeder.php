<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'name' => 'Nasi Goreng Kampung',
                'category' => 'Makanan Utama',
                'price' => 28000,
                'cook_minutes' => 15,
                'added_at' => '2026-09-01',
                'is_spicy' => true,
                'is_best_seller' => true,
                'description' => 'Nasi goreng tradisional disajikan dengan telur mata sapi dan ayam suwir',
            ],
            [
                'name' => 'Rendang Daging Sapi',
                'category' => 'Makanan Utama',
                'price' => 45000,
                'cook_minutes' => 30,
                'added_at' => '2026-09-02',
                'is_spicy' => true,
                'is_best_seller' => true,
                'description' => 'Daging sapi empuk dimasak rempah khas Minangkabau',
            ],
            [
                'name' => 'Ayam Bakar Madu',
                'category' => 'Makanan Utama',
                'price' => 35000,
                'cook_minutes' => 25,
                'added_at' => '2026-09-05',
                'is_spicy' => false,
                'is_best_seller' => true,
                'description' => 'Ayam bakar bumbu manis gurih disajikan dengan lalapan segar',
            ],
            [
                'name' => 'Sate Ayam Madura',
                'category' => 'Makanan Utama',
                'price' => 30000,
                'cook_minutes' => 20,
                'added_at' => '2026-09-08',
                'is_spicy' => false,
                'is_best_seller' => true,
                'description' => '10 tusuk sate ayam lembut dengan siraman saus kacang gurih',
            ],
            [
                'name' => 'Soto Betawi Daging',
                'category' => 'Makanan Utama',
                'price' => 38000,
                'cook_minutes' => 20,
                'added_at' => '2026-09-10',
                'is_spicy' => false,
                'is_best_seller' => false,
                'description' => 'Kuah santan dan susu kaya rempah dengan irisan daging sapi empuk',
            ],
            [
                'name' => 'Bebek Goreng Kremes',
                'category' => 'Makanan Utama',
                'price' => 42000,
                'cook_minutes' => 25,
                'added_at' => '2026-09-12',
                'is_spicy' => true,
                'is_best_seller' => true,
                'description' => 'Bebek gurih renyah bertabur kremesan dan sambal korek',
            ],
            [
                'name' => 'Gado-Gado Spesial',
                'category' => 'Makanan Utama',
                'price' => 25000,
                'cook_minutes' => 15,
                'added_at' => '2026-09-15',
                'is_spicy' => false,
                'is_best_seller' => false,
                'description' => 'Sayuran rebus segar dengan saus kacang mede dan kerupuk emping',
            ],
            [
                'name' => 'Gurame Bakar Cobek',
                'category' => 'Makanan Utama',
                'price' => 55000,
                'cook_minutes' => 35,
                'added_at' => '2026-09-18',
                'is_spicy' => true,
                'is_best_seller' => false,
                'description' => 'Ikan gurame segar dibakar dengan bumbu cobek pedas khas Sunda',
            ],
            [
                'name' => 'Mie Aceh Kuah Kari',
                'category' => 'Makanan Utama',
                'price' => 32000,
                'cook_minutes' => 18,
                'added_at' => '2026-09-20',
                'is_spicy' => true,
                'is_best_seller' => false,
                'description' => 'Mie tebal dengan kuah kari pedas kaya rempah dan acar',
            ],
            [
                'name' => 'Es Teh Manis Melati',
                'category' => 'Minuman',
                'price' => 7000,
                'cook_minutes' => 3,
                'added_at' => '2026-09-01',
                'is_spicy' => false,
                'is_best_seller' => true,
                'description' => 'Teh melati wangi diseduh segar disajikan dingin dengan es batu',
            ],
            [
                'name' => 'Es Jeruk Peras Murni',
                'category' => 'Minuman',
                'price' => 12000,
                'cook_minutes' => 5,
                'added_at' => '2026-09-03',
                'is_spicy' => false,
                'is_best_seller' => false,
                'description' => 'Perasan jeruk segar asli tanpa tambahan pemanis buatan',
            ],
            [
                'name' => 'Es Cendol Durian',
                'category' => 'Minuman',
                'price' => 22000,
                'cook_minutes' => 8,
                'added_at' => '2026-09-06',
                'is_spicy' => false,
                'is_best_seller' => true,
                'description' => 'Cendol kenyal gula aren berpadu dengan santan dan daging durian',
            ],
            [
                'name' => 'Jus Alpukat Mentega',
                'category' => 'Minuman',
                'price' => 18000,
                'cook_minutes' => 7,
                'added_at' => '2026-09-09',
                'is_spicy' => false,
                'is_best_seller' => false,
                'description' => 'Alpukat mentega pilihan diblender lembut dengan krimer cokelat',
            ],
            [
                'name' => 'Kopi Tubruk Nusantara',
                'category' => 'Minuman',
                'price' => 15000,
                'cook_minutes' => 5,
                'added_at' => '2026-09-12',
                'is_spicy' => false,
                'is_best_seller' => false,
                'description' => 'Biji kopi arabika giling segar aroma semerbak',
            ],
            [
                'name' => 'Pisang Bakar Keju Cokelat',
                'category' => 'Penutup',
                'price' => 18000,
                'cook_minutes' => 10,
                'added_at' => '2026-09-04',
                'is_spicy' => false,
                'is_best_seller' => true,
                'description' => 'Pisang raja manis dibakar bertabur keju cheddar dan meses cokelat',
            ],
            [
                'name' => 'Roti Bakar Bandung',
                'category' => 'Penutup',
                'price' => 20000,
                'cook_minutes' => 12,
                'added_at' => '2026-09-08',
                'is_spicy' => false,
                'is_best_seller' => false,
                'description' => 'Roti gandum empuk dengan isian cokelat lumer dan keju parut',
            ],
            [
                'name' => 'Es Campur Pelangi',
                'category' => 'Penutup',
                'price' => 22000,
                'cook_minutes' => 8,
                'added_at' => '2026-09-14',
                'is_spicy' => false,
                'is_best_seller' => false,
                'description' => 'Kombinasi kelapa muda, alpukat, cincau hitam, kolang-kaling, dan sirup merah',
            ],
        ];

        foreach ($menus as $item) {
            Menu::create($item);
        }
    }
}
