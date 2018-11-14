@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('message'))
    <div class="alert alert-success" role="alert">
    {{ session('message') }}
    </div>
    @endif

    <a href="{{ route('post.create') }}" class="btn btn-primary mb-1">添加文章</a>
    <table class="table table-hover">
       <tr>
           <th>ID</th>
           <th>标题</th>
           <th>添加时间</th>
           <th>更新时间</th>
           <th>操作</th>
       </tr>
        @forelse($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td><a href="{{ route('post.edit',$post->id) }}">{{ $post->title }}</a></td>
            <td>{{ $post->created_at }}</td>
            <td>{{ $post->updated_at }}</td>
            <td>
                <form action="{{ route('post.destroy',$post->id) }}" method="post">
                    <input name="_method" type="hidden" value="DELETE">
                    @csrf
               <button type="submit" class="btn btn-danger btn-sm">删除</button>
                </form>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="5">没有文章</td>
            </tr>
       @endforelse
    </table>
        {!! $posts->links() !!}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">Dashboard</div>--}}

                {{--<div class="card-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success" role="alert">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                        {{--<form action="{{ url('/form') }}" method="post">--}}
                            {{--@csrf--}}
                            {{--<div id="app">--}}
                                {{--<editor></editor>--}}
                            {{--</div>--}}
                            {{--<button type="submit">1111</button>--}}
                        {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>
@endsection
