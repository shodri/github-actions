<?php

namespace Database\Seeders;

use App\Models\Dtype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            ['id'=>101, 'dclass_id'=>1, 'name'=>'Edificio'],
            ['id'=>102, 'dclass_id'=>1, 'name'=>'Hotel'],
            ['id'=>103, 'dclass_id'=>1, 'name'=>'Ph'],
            ['id'=>104, 'dclass_id'=>1, 'name'=>'Casa'],
            ['id'=>105, 'dclass_id'=>1, 'name'=>'Barrio cerrado'],
            ['id'=>106, 'dclass_id'=>1, 'name'=>'Country club'],
            ['id'=>107, 'dclass_id'=>1, 'name'=>'Tiempo compartido'],
            ['id'=>201, 'dclass_id'=>2, 'name'=>'Local'],
            ['id'=>202, 'dclass_id'=>2, 'name'=>'Local Shopping Center'],
            ['id'=>203, 'dclass_id'=>2, 'name'=>'Oficina'],
            ['id'=>301, 'dclass_id'=>3, 'name'=>'Depósito'],
            ['id'=>302, 'dclass_id'=>3, 'name'=>'Baulera'],
        ];
        
        foreach($rows as $row) {
            Dtype::create($row);
        }
    }
}
