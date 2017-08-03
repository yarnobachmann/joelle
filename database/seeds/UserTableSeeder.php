<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'name' => 'Yarno Bachmann',
          'email' => 'minejarno@gmail.com',
          'password' => Hash::make('pass'),
        ]);

        User::create([
          'name' => 'Joëlle Overeem',
          'email' => 'joelle.a.m.devries@gmail.com',
          'password' => Hash::make('cuteadmin'),
        ]);
    }
}
