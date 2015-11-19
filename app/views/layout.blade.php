<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <title>15th AUT ACM-ICPC Live Blog</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <meta name="msapplication-TileColor" content="#000000">
    <meta name="msapplication-TileImage" content="{{ asset('img/apple-touch-icon_144.png') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('img/apple-touch-icon_144.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('img/apple-touch-icon_114.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('img/apple-touch-icon_72.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('img/apple-touch-icon_57.png') }}">

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-18478762-11', 'auto');
        ga('send', 'pageview');
    </script>
</head>
<body>

<header class="site-header">
    <div class="container">
        <img src="{{ asset('img/logo.png') }}" alt="Laracon EU" />
        {{--@if (Route::currentRouteNamed('home'))--}}
        {{--<div class="button button-style2 button-style2-active">Live Blog</div>--}}
        {{--@else--}}
        {{--<a class="button button-style2" href="{{ route('home') }}">Live Blog</a>--}}
        {{--@endif--}}
    </div>
</header>

<div class="content">
    <div class="container">
        @yield('content')
    </div>
</div>

<footer class="site-footer">
    <div class="container">
        <i class="fa fa-facebook"></i> |
        Implementation rights reserved to <a href="http://ceit-ssc.ir">AUT-CEIT-SSC</a> anewage |
        Copyright &copy; 2014 Laracon EU :
        <a href="https://github.com/driesvints/laraconeu-live" target="_blank">Source Code</a>
    </div>
</footer>

@if (Route::currentRouteNamed('home') && !empty('5e5a15889621b0bbd414'))
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//js.pusher.com/2.2/pusher.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        // Enable pusher logging - don't include this in production
//        Pusher.log = function(message) {
//            if (window.console && window.console.log) {
//                window.console.log(message);
//            }
//        };

        var pusher = new Pusher('{{ '5e5a15889621b0bbd414' }}');
        var channel = pusher.subscribe('test_channel');
        channel.bind('my_event', function(data) {
            var liveBlog = $("#live-blog");
            var countdownMessage = $("#countdown-message");

            // If the countdown message is still showing, remove it
            if (countdownMessage.length) {
                countdownMessage.remove();
            }

            // Add the message to the live blog on top
            liveBlog.prepend(data.message);
            var audio = new Audio('files/chord.mp3');
            audio.play();
        });
    </script>
@endif

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

</body>
</html>
