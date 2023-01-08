<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create([
            'fullname' => 'Anas MAimalee',
            'username' => 'anasmentQuser',
            'phone' => '08123442014',
            'email' => 'anas@todo',
            'password' => Hash::make(1234),
        ]);
        User::query()->create([
            'fullname' => 'Anas MAimalee',
            'username' => 'anasment@Admin',
            'role' => 'admin',
            'phone' => '08123442014',
            'email' => 'anas@admin',
            'password' => Hash::make(1234),
        ]);

        User::factory(19)->create();
    }

}
