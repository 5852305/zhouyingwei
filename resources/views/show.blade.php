<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="baidu-site-verification" content="X4EKI8ypyb" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta name="keywords" content="{{ $post->title }}"/>
    <meta name="description" content="{{ $post->title }}"/>
    <title>{{ $post->title }}-- ZhouYingWei </title>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" ></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .container h4{
                text-align: center;
            }
        </style>
    </head>
    <body>
            <div class="container">
                <h4 class="mt-4">{{ $post->title }}</h4>
                <hr class="my-4">
                <textarea style="display: none" id="markedText">{!! $post->content !!}</textarea>
                <div class="markedBox">
                <div id="marked" class="mt-2"></div>
                </div>
                 <div class="links text-center mt-4 mb-4">
                     <a href="{{ route('home') }}">文章列表</a>
                 </div>
            </div>
            <script>
                var _hmt = _hmt || [];
                (function() {
                    var hm = document.createElement("script");
                    hm.src = "https://hm.baidu.com/hm.js?7fbdf67be44171fde1f6ac24745846a2";
                    var s = document.getElementsByTagName("script")[0];
                    s.parentNode.insertBefore(hm, s);
                })();
            </script>

    </body>
</html>
