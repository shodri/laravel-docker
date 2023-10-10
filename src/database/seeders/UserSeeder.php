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
                'name' => 'Gabriel',
                'email' => 'grizzuti@ultrait.com.ar',
                'email_verified_at' => '2023-08-16 20:15:53',
                'password' => Hash::make('m4r3m0t0'),
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
    }
}
