<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            [
                'id' => 1,
                'name' => 'Onpropify Administrator',
                'email' => 'admin@onpropify.com',
                'password' => Hash::make('123456'),
            ],
        ];

        foreach($rows as $row) {
            Admin::create($row);
        }        
    }
}
