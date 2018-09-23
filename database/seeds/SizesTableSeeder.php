<?php

use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('product_size')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $product_ids = \App\Models\Product::all()->pluck('id')->toArray();
//        $faker = $faker = Faker\Factory::create();
        foreach ($product_ids as $id)
        {
            factory(\App\Models\Size::class, random_int(5, 10))->create([
                'product_id' => $id
            ]);
        }
    }
}
