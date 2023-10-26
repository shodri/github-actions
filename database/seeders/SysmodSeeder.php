<?php

namespace Database\Seeders;

use App\Models\Sysmod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SysmodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            [ 'id' => 1, 'name' => 'Backend', ],
        ];

        foreach($rows as $row) {
            Sysmod::create($row);
        }        
    }
}
