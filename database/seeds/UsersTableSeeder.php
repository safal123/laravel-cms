<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'pokharelsafal66@gmail.com')->first();

        if(!$user) {
            User::create([
                'name' => 'Safal Pokharel',
                'email' => 'pokharelsafal66@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('safal123')
            ]);
        }
    }
}
