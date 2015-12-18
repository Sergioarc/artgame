<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Noir</title>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,800,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
</head>
<body style="background-color: black;">
    <div class="container">
        <div class="row">

            <div class="col-sm-8 col-sm-offset-2">
                <div class="row" id="carousel">

                    @for($i=1; $i<= 21; $i++)
                        @if(in_array($i, [2, 11, 18]))
                            <div class="col-xs-6 col-sm-4">
                                <a href="{{action('PagesController@getHome')}}">
                                    {!!Html::image("img/logo.jpg", null, ['class' => 'img-responsive'])!!}
                                </a>
                            </div>
                        @endif
                        <div class="col-xs-6 col-sm-4">
                            <a href="{{action('PagesController@getHome')}}">
                                {!!Html::image("img/welcome/".str_pad($i, 2, '0', STR_PAD_LEFT).".jpg", null, ['class' => 'img-responsive'])!!}
                            </a>
                        </div>
                    @endfor
                                                                                                                                                                                                       
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.1/masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/3.1.8/imagesloaded.pkgd.js"></script>
    {!! Html::script('js/welcome.js')!!}      
</body>
</html>