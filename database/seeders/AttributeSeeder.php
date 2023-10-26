<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            ['id' => 1, 'name' => 'dormitorios', 'value_type' => 'quantity'],
            ['id' => 2, 'name' => 'baños', 'value_type' => 'quantity'],
            ['id' => 3, 'name' => 'sup. total', 'value_type' => 'size'],
            ['id' => 4, 'name' => 'sup. cubierta', 'value_type' => 'size'],
            ['id' => 5, 'name' => 'sup. descubierta', 'value_type' => 'size'],
            ['id' => 6, 'name' => 'ambientes', 'value_type' => 'quantity'],
            ['id' => 7, 'name' => 'vista', 'value_type' => 'combo["Frente","Lateral","Fondo","Calle","Lago","Parque"]'],
            ['id' => 8, 'name' => 'orientación', 'value_type' => 'text'],
        ];

        foreach($rows as $row) {
            Attribute::create($row);
        }        
    }
}
