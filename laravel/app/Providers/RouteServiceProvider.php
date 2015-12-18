<?php
namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        
        $router->pattern( 'static', 'noir|faq|contacto|entrega|terminos-y-condiciones|certificados-de-regalo' );
        $router->model( 'collections',    'App\Collection' );
        $router->model( 'subcollections', 'App\Subcollection' );
        $router->model( 'models',         'App\Model');
        $router->model( 'items',          'App\ModelItem');
        $router->model( 'colors',         'App\Color');
        $router->model( 'sizes',          'App\Size');
        $router->model( 'sets',           'App\Set');
        parent::boot($router);
    }
    
    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router)
        {
            require app_path('Http/routes.php');
        });
    }
}
