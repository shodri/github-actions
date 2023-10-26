<?php

namespace Database\Seeders;

use App\Models\Dclass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DclassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
                    ['id'=>1, 'name'=>'Residencial'],
                    ['id'=>2, 'name'=>'Comercial'],
                    ['id'=>3, 'name'=>'Industrial'],
                ];

        foreach($rows as $row) {
            Dclass::create($row);
        }
    }
}
