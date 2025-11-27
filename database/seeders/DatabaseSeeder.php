<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'phone' => '081234567890',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'phone' => '081234567891',
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Siti Nurhaliza',
            'email' => 'siti@example.com',
            'phone' => '081234567892',
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        $categories = [
            ['name' => 'Elektronik', 'description' => 'Peralatan elektronik seperti laptop, proyektor, dll'],
            ['name' => 'Olahraga', 'description' => 'Peralatan olahraga seperti bola, raket, dll'],
            ['name' => 'Alat Tulis', 'description' => 'Peralatan tulis menulis dan kantor'],
            ['name' => 'Laboratorium', 'description' => 'Peralatan laboratorium dan praktikum'],
            ['name' => 'Multimedia', 'description' => 'Peralatan multimedia seperti kamera, mic, dll'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        $items = [
            [
                'code' => 'ELK-001',
                'name' => 'Laptop Asus',
                'category_id' => 1,
                'description' => 'Laptop Asus Core i5 RAM 8GB',
                'quantity' => 10,
                'available_quantity' => 10,
                'condition' => 'baik',
                'location' => 'Ruang TI',
            ],
            [
                'code' => 'ELK-002',
                'name' => 'Proyektor Epson',
                'category_id' => 1,
                'description' => 'Proyektor Epson EB-X41',
                'quantity' => 5,
                'available_quantity' => 5,
                'condition' => 'baik',
                'location' => 'Ruang Media',
            ],
            [
                'code' => 'OLR-001',
                'name' => 'Bola Futsal',
                'category_id' => 2,
                'description' => 'Bola futsal size 4',
                'quantity' => 20,
                'available_quantity' => 20,
                'condition' => 'baik',
                'location' => 'Gudang Olahraga',
            ],
            [
                'code' => 'OLR-002',
                'name' => 'Raket Badminton',
                'category_id' => 2,
                'description' => 'Raket badminton Yonex',
                'quantity' => 15,
                'available_quantity' => 15,
                'condition' => 'baik',
                'location' => 'Gudang Olahraga',
            ],
            [
                'code' => 'ALT-001',
                'name' => 'Spidol Whiteboard',
                'category_id' => 3,
                'description' => 'Spidol whiteboard berbagai warna',
                'quantity' => 100,
                'available_quantity' => 100,
                'condition' => 'baik',
                'location' => 'Ruang Guru',
            ],
            [
                'code' => 'LAB-001',
                'name' => 'Mikroskop',
                'category_id' => 4,
                'description' => 'Mikroskop biologi',
                'quantity' => 8,
                'available_quantity' => 8,
                'condition' => 'baik',
                'location' => 'Lab Biologi',
            ],
            [
                'code' => 'MUL-001',
                'name' => 'Kamera DSLR Canon',
                'category_id' => 5,
                'description' => 'Kamera Canon EOS 700D',
                'quantity' => 3,
                'available_quantity' => 3,
                'condition' => 'baik',
                'location' => 'Ruang Media',
            ],
            [
                'code' => 'MUL-002',
                'name' => 'Microphone Wireless',
                'category_id' => 5,
                'description' => 'Mic wireless untuk acara',
                'quantity' => 4,
                'available_quantity' => 4,
                'condition' => 'baik',
                'location' => 'Ruang Media',
            ],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
