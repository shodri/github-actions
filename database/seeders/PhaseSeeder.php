<?php

namespace Database\Seeders;

use App\Models\Phase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            [
                'name' => 'Friends & Family',
                'short_name' => 'Fr. & Fam.',
                'color' => 'warning',
                'icon' => 'calendar',
                'order' => 1,
            ],
            [
                'name' => 'Preventa',
                'short_name' => 'Preventa',
                'color' => 'info',
                'icon' => 'gear',
                'order' => 2,
            ],
            [
                'name' => 'Pre Construcción',
                'short_name' => 'Pre-Const',
                'color' => 'info',
                'icon' => 'gear',
                'order' => 3,
            ],
            [
                'name' => 'En Construcción',
                'short_name' => 'En Const',
                'color' => 'secondary',
                'icon' => 'gear',
                'order' => 4,
            ],
            [
                'name' => 'Terminada',
                'short_name' => 'Terminad',
                'color' => 'success',
                'icon' => 'check',
                'order' => 5,
            ],
        ];

        foreach($rows as $row) {
            Phase::create($row);
        }        
    }
}
