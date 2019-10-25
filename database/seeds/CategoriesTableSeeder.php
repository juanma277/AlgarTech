<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 13 ; $i++) { 
            DB::table('categories')->insert([
                'name' => Str::random(10),
            ]);
        }
    }
}
