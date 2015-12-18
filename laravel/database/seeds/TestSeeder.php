<?php

use Illuminate\Database\Seeder;

use App\Collection;
use App\Subcollection;
use App\Model;
use App\ModelItem;
use App\Color;
use App\Size;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [

            'Everyday' => [
                'Colors' => [
                    'Top' => [
                        'Brassier' => [
                            'colors' => [
                                'Azul', 'Rojo', 'Amarillo', 'Verde'
                            ],

                            'sizes' => [
                                '32A', '32B', '32C', '32D',
                                '34A', '34B', '34C', '34D',
                                '36A', '36B', '36C', '36D',

                            ],
                        ]
                    ],
                    'Bottom' => [
                        'Bikini' => [
                            'colors' => [
                                'Azul', 'Rojo', 'Amarillo', 'Verde'
                            ],

                            'sizes' => [
                                'Chico', 'Mediano', 'Grande'
                            ],
                        ]
                    ],

                    'Accesorios' => [
                        'Perfume' => []
                    ],
                ]
            ],

            'Elite' => [
                'Pearls' => []
            ],

            'Kinky' => [
                'Cleopatra' => [

                ],

                'The erotic collection' => [

                ],

                'Let\'s play by Noir' => [

                ],

                'Instruments of pleasure' => [

                ]
            ],

            'Bridal' => [
                'The color collection' => [

                ]
            ],


        ];

        $faker = \Faker\Factory::create();        

        foreach($array as $collection_name => $collection_array) {
            $collection = Collection::create([
                'name' => $collection_name,
                'sku' => $faker->unique()->randomNumber(2)
            ]);

            foreach($collection_array as $subcollection_name => $subcollection_array) {
                $subcollection = new Subcollection([
                    'name' => $subcollection_name,
                    'sku' => $faker->unique()->randomNumber(2)
                ]);

                $subcollection->collection()->associate($collection);

                $subcollection->save();

                foreach($subcollection_array as $model_name => $model_array) {
                    $model = new Model([
                        'name' => $model_name,
                        'sku' => $faker->unique()->randomNumber(2)
                    ]);

                    $model->subcollection()->associate($subcollection);

                    $model->save();

                    foreach($model_array as $item_name => $item_array) {
                        $item = new ModelItem([
                            'name' => $item_name,
                            'sku' => $faker->randomLetter.$faker->unique()->randomNumber(2)
                        ]);
                        $item->model()->associate($model);

                        $item->save();

                        $colors = array_get($item_array, 'colors', []);
                        $sizes = array_get($item_array, 'sizes', []);

                        foreach($colors as $color) {
                            $color = new Color([
                                'name' => $color,
                                'sku' => $faker->unique()->randomNumber(2)
                            ]);

                            $color->modelItem()->associate($item);
                            $color->save();
                        }

                        foreach($sizes as $size) {
                            $size = new size([
                                'name' => $size,
                                'sku' => $faker->unique()->randomNumber(2)
                            ]);

                            $size->modelItem()->associate($item);
                            $size->save();
                        }
                    }
                }
            }
        }

        foreach(Subcollection::all() as $subcollection) {
            $items = ModelItem::whereHas('model', function($q) use ($subcollection) {
                $q->where('subcollection_id', $subcollection->id);
            })->get()->shuffle();

            while($items->count() > 0) {
                $max = $faker->numberBetween(1, $items->count());
                $setItems = $items->take($max);
                $items = $items->splice($max);
                $set = new App\Set([
                    'name' => $faker->word,
                    'description' => $faker->sentence,
                ]);
                $set->subcollection()->associate($subcollection);
                $set->save();
                foreach($setItems as $i) {
                    $set->modelItems()->attach($i->id);
                }
            }
        }
    }
}
