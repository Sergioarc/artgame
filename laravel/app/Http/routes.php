<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::resource('abrir-nivel','LevelsController');
   
Route::group([
        'namespace' => 'Admin',
        'prefix' => 'admin',
        'middleware' => 'auth.admin'
    ], function(){

    Route::get('/', [
            'as' => 'admin.home',
            function() {
                return view('admin.main');
            }
        ]

    );

    Route::resource('collections', 'CollectionsController');
    Route::resource('collections.subcollections', 'SubcollectionsController');
    Route::resource('collections.subcollections.sets', 'SetsController');
    Route::resource('collections.subcollections.models', 'ModelsController');
    Route::resource('collections.subcollections.models.items', 'ModelItemsController');
    Route::resource('collections.subcollections.models.items.colors', 'ColorsController');
    Route::resource('collections.subcollections.models.items.sizes', 'SizesController');
    
    Route::resource('stock', 'StockController');
    Route::resource('orders','OrdersController');
    

    Route::group(['prefix' => 'api'], function() {
        Route::get('model-item-options/{items}', [
            'uses' => 'ApiController@getModelItemOptions',
            'as'   => 'admin.api.model_item_options'
        ]);

        Route::get('collections', [
            'uses' => 'ApiController@getCollections',
            'as'   => 'admin.api.collections'
        ]);

        Route::get('subcollections/{collections}', [
            'uses' => 'ApiController@getSubcollections',
            'as'   => 'admin.api.subcollections'
        ]);

        Route::get('models/{subcollections}', [
            'uses' => 'ApiController@getModels',
            'as'   => 'admin.api.models'
        ]);

        Route::get('model-items/{models}', [
            'uses' => 'ApiController@getModelItems',
            'as'   => 'admin.api.model_items'
        ]);

        Route::get('colors/{items}', [
            'uses' => 'ApiController@getModelItemColors',
            'as'   => 'admin.api.colors'
        ]);

        Route::get('sizes/{items}', [
            'uses' => 'ApiController@getModelItemSizes',
            'as'   => 'admin.api.sizes'
        ]);
    });
});

Route::group(['prefix' => 'api'], function(){
    Route::get('model-items-by-set/{sets}', [
        'uses' => 'ApiController@getModelItemsBySet',
        'as'   => 'api.model_items_by_set'
    ]);

    Route::post('add-to-cart', [
        'uses' => 'ApiController@postAddToCart',
        'as'   => 'api.add_to_cart'
    ]);
});


Route::group(['middleware' => 'no_admin'], function() {
    Route::get('/', function(){
        return view('welcome');
    });
    Route::get('/home', ['as' => 'home', 'uses' => 'PagesController@getHome']);
    Route::get('tienda/{collections}/{subcollections}','SubcollectionsController@show');
    Route::controller('checkout', 'CheckoutController');
    
    Route::group(['middleware' => 'auth'], function() {
        Route::resource('pedidos', 'OrdersController', ['only' => ['show', 'index']]);
        Route::get('mi-perfil', 'Auth\AuthController@getProfile');
        Route::put('mi-perfil', 'Auth\AuthController@putProfile');
        Route::put('actualizar-contrasena', 'Auth\AuthController@putUpdatePassword');
    });
});

// Authentication routes...
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::post('/register', 'Auth\AuthController@postRegister');

Route::get('/{static}', 'PagesController@getStatic');
