<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Noir</title>

        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,800,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'> -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        {!! Html::style('css/admin.css') !!}
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
                            {!! Html::image('img/logo.png', 'Noir | Experience Boutique') !!}
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="collapse-navbar-menu">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="{{action('Admin\CollectionsController@index')}}">
                                    Colecciones
                                </a>
                            </li>
                            <li>
                                <a href="{{action('Admin\StockController@index')}}">
                                    Inventario
                                </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @if(Auth::check())
                                <li><a href="{{action('Auth\AuthController@getLogout')}}">Cerrar sesión</a></li>
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
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.1/masonry.pkgd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.8.0/holder.min.js"></script>
        <script type="text/javascript">
            Holder.addTheme("noir", {
                background: "#333",
                foreground: "#ededed",
                size: 14,
                font: "Helvetica",
                fontweight: "normal"
            });
        </script>
        {!! Html::script('js/laroute.js') !!}
        @yield('script')

    </body>
</html>