<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'email' => 'admin@onpropify',
                'email_verified_at' => '2023-08-16 20:15:53',
                'password' => Hash::make('123456'),
                'company' => 'Onpropify.',
                'language' => 'es',
            ],
            [
                'id' => 2,
                'name' => 'Gabriel',
                'email' => 'grizzuti@ultrait.com.ar',
                'email_verified_at' => '2023-08-16 20:15:53',
                'password' => Hash::make('qwerty'),
                'whatsapp' => '+54 1157504425',
                'birthdate' => '1967-08-30',
                'company' => 'UltraIT S.A.',
                'country' => 'AR',
                'city' => 'Haedo, Buenos Aires',
                'language' => 'es',
            ],
        ];

        foreach($rows as $row) {
            User::create($row);
        }        
        User::factory(30)->create();

        User::find(1)->sysmods()->attach(1,['function' => 'admin']);
    }
}
