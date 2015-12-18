<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Noir</title>

        {!! Html::style('css/app.css') !!}
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,800,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        {!!Html::style('css/owl.carousel.css')!!}
        {!!Html::style('css/owl.theme.css')!!}
        {!!Html::style('css/owl.transitions.css')!!}
        <script src="/js/laroute.js"></script>
        @yield('style')
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <header>
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-navbar-menu" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{action('PagesController@getHome')}}">
                            {!! Html::image('img/logo.jpg', 'Super videojuego') !!}
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="collapse-navbar-menu">
                        
                        <ul class="nav navbar-nav navbar-right">

                            @if(Auth::guest())
                                <li>
                                    <a href="{{action('Auth\AuthController@getLogin')}}">
                                        Iniciar sesión
                                    </a>
                                </li>
                            @else
                                @if(Auth::user()->role == 'admin')
                                    <li>
                                        <a href="{{route('admin.home')}}">Administración</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{action('CheckoutController@getCart')}}" class="cart-link">
                                            <span class="fa fa-fw fa-2x fa-shopping-cart"></span>
                                            @if(with($items = Cart::items())->count() > 0)
                                                <span class="badge">
                                                    {{$items->count()}}
                                                </span>
                                            @endif
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/home">
                                            Inicio
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{action('Auth\AuthController@getProfile')}}">
                                            Mi perfil
                                        </a>
                                    </li>
                                    <li>
                                          <a href="{{action('LevelsController@index')}}">
                                            Libro de videojuegos
                                        </a>

                                    </li>
                                    <li>
                                    <a href="{{action('BookController@index')}}">
                                        Mis fotografias
                                    </a>

                                    </li>
                                    
                                @endif
                                <li>
                                    <a href="{{action('Auth\AuthController@getLogout')}}">
                                        Cerrar sesión
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav>
        </header>

        <div class="container">
            @if(Session::has('success'))
            <div class="alert alert-success">{!! Session::get('success') !!}</div>
            @endif
                
        </div>
        
        @yield('content')
      
        {!! Html::script('js/jQuery/jquery.min.js') !!}
        {!! Html::script('js/bootstrap/bootstrap.min.js') !!}
        {!! Html::script('js/holder/holder.min.js') !!}
        {!!Html::script('js/utils.js')!!}
     
        {!!Html::script('js/owl.carousel.js')!!}
     
        <script type="text/javascript">
            Holder.addTheme("noir", {
                background: "#333",
                foreground: "#ededed",
                size: 14,
                font: "Helvetica",
                fontweight: "normal"
            });

            Holder.addTheme("noir-alt-1", {
                background: "#debc5f",
                foreground: "#ededed",
                size: 14,
                font: "Helvetica",
                fontweight: "normal"
            });

            Holder.addTheme("noir-alt-2", {
                background: "#ededed",
                foreground: "#debc5f",
                size: 14,
                font: "Helvetica",
                fontweight: "normal"
            });
        </script>
        @yield('script')

    </body>
</html>