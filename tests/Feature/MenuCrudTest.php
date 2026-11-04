<?php

namespace Tests\Feature;

use App\Models\Menu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MenuCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_halaman_beranda_dapat_diakses(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Manajemen Menu Restoran');
        $response->assertSee('Fajrin Widianto · 2457401007');
    }

    public function test_halaman_daftar_menu_menampilkan_pesan_kosong(): void
    {
        $response = $this->get('/menus');

        $response->assertStatus(200);
        $response->assertSee('Belum ada data menu');
    }

    public function test_halaman_daftar_menu_dapat_menampilkan_data(): void
    {
        Menu::create([
            'name' => 'Nasi Goreng Spesial',
            'category' => 'Makanan Utama',
            'price' => 25000,
            'cook_minutes' => 15,
            'added_at' => '2026-10-01',
            'is_spicy' => true,
            'is_best_seller' => true,
            'description' => 'Disajikan dengan telur mata sapi',
        ]);

        $response = $this->get('/menus');

        $response->assertStatus(200);
        $response->assertSee('Nasi Goreng Spesial');
        $response->assertSee('Makanan Utama');
        $response->assertSee('Rp 25.000');
    }

    public function test_halaman_tambah_menu_dapat_diakses(): void
    {
        $response = $this->get('/menus/create');

        $response->assertStatus(200);
        $response->assertSee('Tambah Menu Restoran');
        $response->assertSee('Makanan Utama');
        $response->assertSee('Minuman');
        $response->assertSee('Penutup');
    }

    public function test_validasi_tambah_menu_gagal_jika_kolom_wajib_kosong(): void
    {
        $response = $this->from('/menus/create')->post('/menus', []);

        $response->assertStatus(302);
        $response->assertRedirect('/menus/create');
        $response->assertSessionHasErrors(['name', 'category', 'price', 'cook_minutes', 'added_at']);
    }

    public function test_dapat_menambahkan_menu_baru(): void
    {
        $data = [
            'name' => 'Ayam Bakar Madu',
            'category' => 'Makanan Utama',
            'price' => 35000,
            'cook_minutes' => 25,
            'added_at' => '2026-10-05',
            'is_spicy' => '1',
            'is_best_seller' => '1',
            'description' => 'Ayam bakar dengan lalapan segar',
        ];

        $response = $this->post('/menus', $data);

        $response->assertStatus(302);
        $response->assertRedirect('/menus');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('menus', [
            'name' => 'Ayam Bakar Madu',
            'category' => 'Makanan Utama',
            'price' => 35000,
            'cook_minutes' => 25,
            'is_spicy' => 1,
            'is_best_seller' => 1,
        ]);
    }

    public function test_halaman_detail_menu_dapat_diakses(): void
    {
        $menu = Menu::create([
            'name' => 'Es Teh Manis Melati',
            'category' => 'Minuman',
            'price' => 7000,
            'cook_minutes' => 3,
            'added_at' => '2026-10-01',
            'is_spicy' => false,
            'is_best_seller' => true,
            'description' => 'Dingin dan segar',
        ]);

        $response = $this->get('/menus/' . $menu->id);

        $response->assertStatus(200);
        $response->assertSee('Es Teh Manis Melati');
        $response->assertSee('Minuman');
        $response->assertSee('Rp 7.000');
    }

    public function test_halaman_ubah_menu_dapat_diakses(): void
    {
        $menu = Menu::create([
            'name' => 'Pisang Bakar Keju',
            'category' => 'Penutup',
            'price' => 18000,
            'cook_minutes' => 10,
            'added_at' => '2026-10-04',
            'is_spicy' => false,
            'is_best_seller' => false,
        ]);

        $response = $this->get('/menus/' . $menu->id . '/edit');

        $response->assertStatus(200);
        $response->assertSee('Ubah Menu Restoran');
        $response->assertSee('Pisang Bakar Keju');
    }

    public function test_dapat_mengubah_menu(): void
    {
        $menu = Menu::create([
            'name' => 'Roti Bakar',
            'category' => 'Penutup',
            'price' => 15000,
            'cook_minutes' => 10,
            'added_at' => '2026-10-04',
            'is_spicy' => false,
            'is_best_seller' => false,
        ]);

        $response = $this->put('/menus/' . $menu->id, [
            'name' => 'Roti Bakar Spesial Cokelat',
            'category' => 'Penutup',
            'price' => 20000,
            'cook_minutes' => 12,
            'added_at' => '2026-10-04',
            'is_spicy' => '0',
            'is_best_seller' => '1',
            'description' => 'Topping melimpah',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/menus');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('menus', [
            'id' => $menu->id,
            'name' => 'Roti Bakar Spesial Cokelat',
            'price' => 20000,
            'is_best_seller' => 1,
        ]);
    }

    public function test_dapat_menghapus_menu(): void
    {
        $menu = Menu::create([
            'name' => 'Menu Hapus Test',
            'category' => 'Minuman',
            'price' => 5000,
            'cook_minutes' => 2,
            'added_at' => '2026-10-01',
            'is_spicy' => false,
            'is_best_seller' => false,
        ]);

        $response = $this->delete('/menus/' . $menu->id);

        $response->assertStatus(302);
        $response->assertRedirect('/menus');
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('menus', [
            'id' => $menu->id,
        ]);
    }
}
