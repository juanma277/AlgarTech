<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Juan Manuel Valderrama',
            'email' => 'juanma27719@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
    }
}
