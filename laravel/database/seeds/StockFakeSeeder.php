<?php

use Illuminate\Database\Seeder;

class StockFakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = \App\ModelItem::orderBy(DB::raw('RAND()'))->with('colors', 'sizes', 'model', 'model.subcollection')->limit(500)->get();
        $faker = \Faker\Factory::create();
        foreach($items as $item) {
            foreach($item->colors as $color) {
                foreach($item->sizes as $size) {
                    for($i=0; $i< $faker->optional(0.6)->numberBetween(1, 100); $i++) {
                        \App\Stock::create([
                            'collection_id' => $item->model->subcollection->collection_id,
                            'subcollection_id' => $item->model->subcollection->id,
                            'model_id' => $item->model->id,
                            'model_item_id' => $item->id,
                            'color_id' => $color->id,
                            'size_id' => $size->id,
                        ]);
                    }
                }
            }
        }
    }
}
