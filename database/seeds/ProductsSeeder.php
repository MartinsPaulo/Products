<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Products')->insert([
            'name' => 'Martelo',
            'id_category' => '1',
            'price' => '3.99',
            'quantity' => '10',
            'expiration' => '2021/09/23',
        ]);
        DB::table('Products')->insert([
            'name' => 'Prego',
            'id_category' => '1',
            'price' => '0.99',
            'quantity' => '100',
            'expiration' => '2021/09/23',
        ]);
        DB::table('Products')->insert([
            'name' => 'Ferrari',
            'id_category' => '2',
            'price' => '93232.99',
            'quantity' => '10',
            'expiration' => '2021/09/23',
        ]);
        DB::table('Products')->insert([
            'name' => 'Arroz',
            'id_category' => '3',
            'price' => '13.99',
            'quantity' => '15',
            'expiration' => '2021/09/23',
        ]);
        DB::table('Products')->insert([
            'name' => 'Macarrão',
            'id_category' => '3',
            'price' => '3.99',
            'quantity' => '20',
            'expiration' => '2021/09/23',
        ]);
        DB::table('Products')->insert([
            'name' => 'Vestido',
            'id_category' => '4',
            'price' => '399.99',
            'quantity' => '140',
            'expiration' => '2021/09/23',
        ]);
    }
}
