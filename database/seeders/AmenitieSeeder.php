<?php

namespace Database\Seeders;

use App\Models\Amenitie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AmenitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            ['name' => 'Piscina', 'classes' => [1]],
            ['name' => 'SUM', 'classes' => [1,2]],
            ['name' => 'Baulera', 'classes' => [1,2,3]],
            ['name' => 'Calefacción', 'classes' => [1,2,3]],
            ['name' => 'Quincho / Parrilla', 'classes' => [1]],
            ['name' => 'Encargado / Vigilancia', 'classes' => [1,2,3]],
            ['name' => 'Ascensor / Elevador', 'classes' => [1,2,3]],
            ['name' => 'Cancha de deportes', 'classes' => [1]],
            ['name' => 'Gimnasio', 'classes' => [1]],
            ['name' => 'Laundry', 'classes' => [1]],
        ];

        foreach($rows as $row) {
            Amenitie::create($row);
        }        
    }
}
