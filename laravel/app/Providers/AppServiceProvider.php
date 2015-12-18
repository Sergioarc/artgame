<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
use DB;
use Html;
use Validator;

use App\Collection;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        DB::listen(
            function ($sql, $bindings, $time) {
                if(App::environment('local')) {
                    \Log::debug($sql, $bindings);
                }
            }
        );
        
        Validator::extend('alpha_num_spaces', function($attribute, $value)
        {
            return preg_match('/^[\pL\s\d]+$/u', $value);
        });

        Html::macro('collections_menu', function(array $classes = array(), $active_collection_id = null) {
            $collections = Collection::has('stock')->with([
                'subcollections' => function($q) {
                    $q->has('stock');
                }
            ]);
            return view('menus.collections')
                ->with([
                    'collections' => $collections->get(),
                    'classes' => $classes,
                    'active_collection_id' => $active_collection_id
                ])->render();
                
                
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
            //
    }
}
