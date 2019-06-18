@extends('layouts.app')

@if ($app)
    @section('image'){{$baseUrl}}/aplication/img/{{$app->img}}@endsection
    @section('title'){{$app->title}}@endsection
    @section('description'){{$app->description}}@endsection
@endif

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/home-product-index.css">
    <link rel="stylesheet" type="text/css" href="/css/product-index.css">
    <link rel="stylesheet" type="text/css" href="/css/post-index.css">
    <link rel="stylesheet" type="text/css" href="/css/thread-index.css">
@endsection

@section('content')

@include('home.products')

@if ($products->count() > 5)
    <div class="col-md-12 text-center">
        <a class="btn btn-info btn-sm mt-2" href="/search/post/{{$key}}">View more ... </a>
    </div>
@endif

<div class="container">
    @if ($posts->count())
        <h2 class="parent-color bold mt-3">News</h2>
        <div class="row">
            @foreach ($posts->where('menu.status',1) as $post)
                <div class="col-lg-6">
                    @include('posts.content-index')
                </div>
            @endforeach
            @if ($posts->count() > 6)
                <div class="col-md-12 text-center">
                    <a class="btn btn-info btn-sm mt-2" href="/search/post/{{$key}}">View More ... </a>
                </div>
            @endif
        </div>
    @endif

    @if ($threads->count())
        <h2 class="parent-color bold mt-5">Threads</h2>
        <div class="row">
            @foreach ($threads->where('category.status',1)->where('status',1) as $thread)
                @include('threads.content-index')
            @endforeach
            @if ($threads->count() > 6)
                <div class="col-md-12 text-center">
                    <a class="btn btn-info btn-sm mt-2" href="/search/thread/{{$key}}">View more ... </a>
                </div>
            @endif
        </div>
    @endif
</div>
@endsection