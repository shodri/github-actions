<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            ['id' => 1, 'name' => 'Departamento'],
            ['id' => 2, 'name' => 'Cochera'],
            ['id' => 3, 'name' => 'Baulera'],
            ['id' => 4, 'name' => 'Lote'],
            ['id' => 5, 'name' => 'Local'],
        ]; 

        foreach($rows as $row) {
            Utype::create($row);
        } 
    }
}
