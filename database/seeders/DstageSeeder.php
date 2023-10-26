<?php

namespace Database\Seeders;

use App\Models\Dstage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DstageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $rows = [
            [
                "id" => 1,
                "name" => "Torre 1",
                "develop_id" => 1,
                "start_date" => "2023-10-01",
                "started_date" => "2023-10-01",
                "finish_date" => "2025-03-01",
                "phase_id" => 1,
                "status" => "enabled",
            ],
            [
                "id" => 2,
                "name" => "Torre 2",
                "develop_id" => 1,
                "start_date" => "2024-10-15",
                "finish_date" => "2024-03-01",
                "phase_id" => 2,
                "status" => "enabled",
            ],
            [
                "id" => 3,
                "name" => "Barrio Parque",
                "develop_id" => 1,
                "start_date" => "2024-03-01",
                "finish_date" => "2024-06-01",
                "phase_id" => 4,
                "status" => "enabled",
            ],
            [
                "id" => 4,
                "name" => "Shopping Comercial",
                "develop_id" => 1,
                "start_date" => "2024-03-01",
                "finish_date" => "2024-06-01",
                "phase_id" => 3,
                "status" => "enabled",
            ]
        ];
                
        foreach($rows as $row) {
            Dstage::create($row);
        }

    }
}
