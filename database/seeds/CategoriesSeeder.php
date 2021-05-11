<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Ferramenta',
            'active' => '1',
        ]);
        DB::table('categories')->insert([
            'name' => 'Carro',
            'active' => '1',
        ]);
        DB::table('categories')->insert([
            'name' => 'Comida',
            'active' => '1',
        ]);
        DB::table('categories')->insert([
            'name' => 'Roupa',
            'active' => '1',
        ]);
    }
}
