<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inventory;

class InventorySeeder extends Seeder
{
    public function run()
    {
        Inventory::create([
            'name' => 'Kursi Gaming',
            'code' => '001',
            'total' => 5,
            'status' => 'Tersedia',
        ]);

        Inventory::create([
            'name' => 'PC Gaming',
            'code' => '002',
            'total' => 3,
            'status' => 'Tersedia',
        ]);

        Inventory::create([
            'name' => 'Proyektor',
            'code' => '003',
            'total' => 2,
            'status' => 'Tersedia',
        ]);

        Inventory::create([
            'name' => 'AC',
            'code' => '004',
            'total' => 0,
            'status' => 'Kosong',
        ]);
    }
}
