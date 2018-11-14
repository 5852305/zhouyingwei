@extends('layouts.app')

@section('content')
    {!! editor_css() !!}
    <div class="container" >
       @includeIf('posts.form')
    </div>
    {!! editor_js() !!}
@endsection