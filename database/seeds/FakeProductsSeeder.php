<?php

use Illuminate\Database\Seeder;

class FakeProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create('pt_BR');
        for ($i=0; $i<50; $i++) {
            DB::table('Products')->insert([
                'name' => $faker->text(10),
                'id_category' => $faker->randomNumber(1,4),
                'price' => $faker->randomFloat(2, 12, 150000),
                'quantity' => $faker->randomNumber(),
                'expiration' => $faker->date(),
            ]);
        }
    }
}
