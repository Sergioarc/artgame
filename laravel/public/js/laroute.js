(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://localhost',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"admin","name":"admin.home","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections","name":"admin.collections.index","action":"Admin\CollectionsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/create","name":"admin.collections.create","action":"Admin\CollectionsController@create"},{"host":null,"methods":["POST"],"uri":"admin\/collections","name":"admin.collections.store","action":"Admin\CollectionsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}","name":"admin.collections.show","action":"Admin\CollectionsController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/edit","name":"admin.collections.edit","action":"Admin\CollectionsController@edit"},{"host":null,"methods":["PUT"],"uri":"admin\/collections\/{collections}","name":"admin.collections.update","action":"Admin\CollectionsController@update"},{"host":null,"methods":["PATCH"],"uri":"admin\/collections\/{collections}","name":null,"action":"Admin\CollectionsController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/collections\/{collections}","name":"admin.collections.destroy","action":"Admin\CollectionsController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections","name":"admin.collections.subcollections.index","action":"Admin\SubcollectionsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/create","name":"admin.collections.subcollections.create","action":"Admin\SubcollectionsController@create"},{"host":null,"methods":["POST"],"uri":"admin\/collections\/{collections}\/subcollections","name":"admin.collections.subcollections.store","action":"Admin\SubcollectionsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}","name":"admin.collections.subcollections.show","action":"Admin\SubcollectionsController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/edit","name":"admin.collections.subcollections.edit","action":"Admin\SubcollectionsController@edit"},{"host":null,"methods":["PUT"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}","name":"admin.collections.subcollections.update","action":"Admin\SubcollectionsController@update"},{"host":null,"methods":["PATCH"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}","name":null,"action":"Admin\SubcollectionsController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}","name":"admin.collections.subcollections.destroy","action":"Admin\SubcollectionsController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/sets","name":"admin.collections.subcollections.sets.index","action":"Admin\SetsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/sets\/create","name":"admin.collections.subcollections.sets.create","action":"Admin\SetsController@create"},{"host":null,"methods":["POST"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/sets","name":"admin.collections.subcollections.sets.store","action":"Admin\SetsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/sets\/{sets}","name":"admin.collections.subcollections.sets.show","action":"Admin\SetsController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/sets\/{sets}\/edit","name":"admin.collections.subcollections.sets.edit","action":"Admin\SetsController@edit"},{"host":null,"methods":["PUT"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/sets\/{sets}","name":"admin.collections.subcollections.sets.update","action":"Admin\SetsController@update"},{"host":null,"methods":["PATCH"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/sets\/{sets}","name":null,"action":"Admin\SetsController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/sets\/{sets}","name":"admin.collections.subcollections.sets.destroy","action":"Admin\SetsController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models","name":"admin.collections.subcollections.models.index","action":"Admin\ModelsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/create","name":"admin.collections.subcollections.models.create","action":"Admin\ModelsController@create"},{"host":null,"methods":["POST"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models","name":"admin.collections.subcollections.models.store","action":"Admin\ModelsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}","name":"admin.collections.subcollections.models.show","action":"Admin\ModelsController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/edit","name":"admin.collections.subcollections.models.edit","action":"Admin\ModelsController@edit"},{"host":null,"methods":["PUT"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}","name":"admin.collections.subcollections.models.update","action":"Admin\ModelsController@update"},{"host":null,"methods":["PATCH"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}","name":null,"action":"Admin\ModelsController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}","name":"admin.collections.subcollections.models.destroy","action":"Admin\ModelsController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items","name":"admin.collections.subcollections.models.items.index","action":"Admin\ModelItemsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items\/create","name":"admin.collections.subcollections.models.items.create","action":"Admin\ModelItemsController@create"},{"host":null,"methods":["POST"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items","name":"admin.collections.subcollections.models.items.store","action":"Admin\ModelItemsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items\/{items}","name":"admin.collections.subcollections.models.items.show","action":"Admin\ModelItemsController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items\/{items}\/edit","name":"admin.collections.subcollections.models.items.edit","action":"Admin\ModelItemsController@edit"},{"host":null,"methods":["PUT"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items\/{items}","name":"admin.collections.subcollections.models.items.update","action":"Admin\ModelItemsController@update"},{"host":null,"methods":["PATCH"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items\/{items}","name":null,"action":"Admin\ModelItemsController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items\/{items}","name":"admin.collections.subcollections.models.items.destroy","action":"Admin\ModelItemsController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items\/{items}\/colors","name":"admin.collections.subcollections.models.items.colors.index","action":"Admin\ColorsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items\/{items}\/colors\/create","name":"admin.collections.subcollections.models.items.colors.create","action":"Admin\ColorsController@create"},{"host":null,"methods":["POST"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items\/{items}\/colors","name":"admin.collections.subcollections.models.items.colors.store","action":"Admin\ColorsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items\/{items}\/colors\/{colors}","name":"admin.collections.subcollections.models.items.colors.show","action":"Admin\ColorsController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items\/{items}\/colors\/{colors}\/edit","name":"admin.collections.subcollections.models.items.colors.edit","action":"Admin\ColorsController@edit"},{"host":null,"methods":["PUT"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items\/{items}\/colors\/{colors}","name":"admin.collections.subcollections.models.items.colors.update","action":"Admin\ColorsController@update"},{"host":null,"methods":["PATCH"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items\/{items}\/colors\/{colors}","name":null,"action":"Admin\ColorsController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items\/{items}\/colors\/{colors}","name":"admin.collections.subcollections.models.items.colors.destroy","action":"Admin\ColorsController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items\/{items}\/sizes","name":"admin.collections.subcollections.models.items.sizes.index","action":"Admin\SizesController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items\/{items}\/sizes\/create","name":"admin.collections.subcollections.models.items.sizes.create","action":"Admin\SizesController@create"},{"host":null,"methods":["POST"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items\/{items}\/sizes","name":"admin.collections.subcollections.models.items.sizes.store","action":"Admin\SizesController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items\/{items}\/sizes\/{sizes}","name":"admin.collections.subcollections.models.items.sizes.show","action":"Admin\SizesController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items\/{items}\/sizes\/{sizes}\/edit","name":"admin.collections.subcollections.models.items.sizes.edit","action":"Admin\SizesController@edit"},{"host":null,"methods":["PUT"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items\/{items}\/sizes\/{sizes}","name":"admin.collections.subcollections.models.items.sizes.update","action":"Admin\SizesController@update"},{"host":null,"methods":["PATCH"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items\/{items}\/sizes\/{sizes}","name":null,"action":"Admin\SizesController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/collections\/{collections}\/subcollections\/{subcollections}\/models\/{models}\/items\/{items}\/sizes\/{sizes}","name":"admin.collections.subcollections.models.items.sizes.destroy","action":"Admin\SizesController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/stock","name":"admin.stock.index","action":"Admin\StockController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/stock\/create","name":"admin.stock.create","action":"Admin\StockController@create"},{"host":null,"methods":["POST"],"uri":"admin\/stock","name":"admin.stock.store","action":"Admin\StockController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/stock\/{stock}","name":"admin.stock.show","action":"Admin\StockController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/stock\/{stock}\/edit","name":"admin.stock.edit","action":"Admin\StockController@edit"},{"host":null,"methods":["PUT"],"uri":"admin\/stock\/{stock}","name":"admin.stock.update","action":"Admin\StockController@update"},{"host":null,"methods":["PATCH"],"uri":"admin\/stock\/{stock}","name":null,"action":"Admin\StockController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/stock\/{stock}","name":"admin.stock.destroy","action":"Admin\StockController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/api\/model-item-options\/{items}","name":"admin.api.model_item_options","action":"Admin\ApiController@getModelItemOptions"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/api\/collections","name":"admin.api.collections","action":"Admin\ApiController@getCollections"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/api\/subcollections\/{collections}","name":"admin.api.subcollections","action":"Admin\ApiController@getSubcollections"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/api\/models\/{subcollections}","name":"admin.api.models","action":"Admin\ApiController@getModels"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/api\/model-items\/{models}","name":"admin.api.model_items","action":"Admin\ApiController@getModelItems"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/api\/colors\/{items}","name":"admin.api.colors","action":"Admin\ApiController@getModelItemColors"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/api\/sizes\/{items}","name":"admin.api.sizes","action":"Admin\ApiController@getModelItemSizes"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/model-items-by-set\/{sets}","name":"api.model_items_by_set","action":"ApiController@getModelItemsBySet"},{"host":null,"methods":["POST"],"uri":"api\/add-to-cart","name":"api.add_to_cart","action":"ApiController@postAddToCart"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"home","name":null,"action":"PagesController@getHome"},{"host":null,"methods":["GET","HEAD"],"uri":"tienda\/{collections}\/{subcollections}","name":null,"action":"SubcollectionsController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"checkout\/cart\/{one?}\/{two?}\/{three?}\/{four?}\/{five?}","name":null,"action":"CheckoutController@getCart"},{"host":null,"methods":["POST"],"uri":"checkout\/add-to-cart\/{one?}\/{two?}\/{three?}\/{four?}\/{five?}","name":null,"action":"CheckoutController@postAddToCart"},{"host":null,"methods":["GET","HEAD"],"uri":"checkout\/payment\/{one?}\/{two?}\/{three?}\/{four?}\/{five?}","name":null,"action":"CheckoutController@getPayment"},{"host":null,"methods":["GET","HEAD"],"uri":"checkout\/payment-info\/{one?}\/{two?}\/{three?}\/{four?}\/{five?}","name":null,"action":"CheckoutController@getPaymentInfo"},{"host":null,"methods":["POST"],"uri":"checkout\/payment\/{one?}\/{two?}\/{three?}\/{four?}\/{five?}","name":null,"action":"CheckoutController@postPayment"},{"host":null,"methods":["GET","HEAD"],"uri":"checkout\/payment-success\/{one?}\/{two?}\/{three?}\/{four?}\/{five?}","name":null,"action":"CheckoutController@getPaymentSuccess"},{"host":null,"methods":["GET","HEAD"],"uri":"checkout\/payment-cancel\/{one?}\/{two?}\/{three?}\/{four?}\/{five?}","name":null,"action":"CheckoutController@getPaymentCancel"},{"host":null,"methods":["GET","HEAD","POST","PUT","PATCH","DELETE"],"uri":"checkout\/{_missing}","name":null,"action":"CheckoutController@missingMethod"},{"host":null,"methods":["GET","HEAD"],"uri":"login","name":null,"action":"Auth\AuthController@getLogin"},{"host":null,"methods":["POST"],"uri":"login","name":null,"action":"Auth\AuthController@postLogin"},{"host":null,"methods":["GET","HEAD"],"uri":"logout","name":null,"action":"Auth\AuthController@getLogout"},{"host":null,"methods":["POST"],"uri":"register","name":null,"action":"Auth\AuthController@postRegister"},{"host":null,"methods":["GET","HEAD"],"uri":"{static}","name":null,"action":"PagesController@getStatic"}],

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                return this.getCorrectUrl(uri + qs);
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = '/' + uri.replace(/^\/?/, '');

                if(!this.absolute)
                    return url;

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

