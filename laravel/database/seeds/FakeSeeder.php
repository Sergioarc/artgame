<?php

use Illuminate\Database\Seeder;

class FakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        factory(App\Collection::class, 4)->create()->each(function($collection) use ($faker){
            factory(
                App\Subcollection::class,
                $faker->numberBetween(2, 4)
            )->make()->each(
                function($subcollection) use($faker, $collection){
                    $collection->subcollections()->save($subcollection);
                    if( ! $subcollection->exists) return;
                    factory(
                        App\Model::class,
                        $faker->numberBetween(2,4)
                    )->make()->each(
                        function($model) use ($faker, $collection, $subcollection) {
                            
                            $subcollection->models()->save($model);
                            if( ! $model->exists ) return;
                            factory(
                                App\ModelItem::class,
                                $faker->numberBetween(4, 15)
                            )->make()->each(
                                function($model_item) use (
                                    $faker,
                                    $collection,
                                    $subcollection,
                                    $model
                                ) {
                                    $model->modelItems()->save($model_item);
                                    if (!$model_item->exists) return;
                                    factory(
                                        App\Color::class,
                                        $faker->numberBetween(2, 4)
                                    )->make()->each(
                                        function($color) use (
                                            $faker,
                                            $collection,
                                            $subcollection,
                                            $model,
                                            $model_item
                                        ) {
                                            $model_item->colors()->save($color);
                                            if (! $color->exists) return;
                                            $color->photo()->save(factory(App\ColorPhoto::class)->make());
                                        }
                                    );

                                    factory(
                                        App\Size::class,
                                        $faker->numberBetween(2, 6)
                                    )->make()->each(
                                        function($size) use(
                                            $faker,
                                            $model_item
                                        ){
                                            $model_item->sizes()->save($size);

                                        }
                                    );
                                }
                            );
                        }
                    );

                    factory(
                        App\Set::class,
                        $faker->numberBetween(2, 4)
                    )->create([
                        'subcollection_id' => $subcollection->id
                    ])->each(function($set) use(
                        $faker,
                        $subcollection
                    ) {
                        factory(
                            App\SetPhoto::class,
                            $faker->numberBetween(2, 4)
                        )->create([
                            'set_id' => $set->id,
                        ]);

                        $items = App\ModelItem::whereHas('model', function($q) use ($subcollection) {
                            $q->where('subcollection_id', $subcollection->id);
                        })->limit($faker->numberBetween(1, 4))->lists('id')->all();
                        $set->modelItems()->sync($items);
                    });
                }
            );
        });
        
    }
}
