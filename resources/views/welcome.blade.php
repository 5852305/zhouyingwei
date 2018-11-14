<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="baidu-site-verification" content="X4EKI8ypyb" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta name="keywords" content="文章列表 -- ZhouYingWei"/>
    <meta name="description" content="文章列表 -- ZhouYingWei"/>
    <title>文章列表 -- ZhouYingWei</title>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" ></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .content {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="flex-center ">
        <div class="content">
            <div class="list-group mb-5 mt-5" >
                @foreach($posts as $post)
                    <a href="{{ route('show',$post->id) }}" class="list-group-item flex-column align-items-start list-group-item-action mt-2">
                        <div class="d-flex w-500 justify-content-between " >
                            <h5 class="mb-1 pt-1  pr-5">{{ $post->title }}</h5>
                            <small class="pt-2">{{ $post->created_at->format('Y-m-d') }}</small>
                        </div>
                    </a>
                @endforeach
            </div>
            {!! $posts->links() !!}
        </div>

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




