@extends('layouts.app')

@if ($app)
    @section('image'){{ config('app.url') }}/aplication/img/{{$app->img}}@endsection
    @section('title'){{$app->title}}@endsection
    @section('description'){{$app->description}}@endsection
@endif

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/home-product-index.css">
    <link rel="stylesheet" type="text/css" href="/css/product-index.css">
@endsection

@section('content')

<div class="container">

    <div class="col-md-9">
        <div class="row">
            @if ($products->count())
                @foreach ($products as $product)
                    @include('products.thumb-content')
                @endforeach

                @if ($products->count() > 6)
                    <div class="col-md-12 text-center">
                        <a class="btn btn-info btn-sm mt-2" href="/search/product/{{$key}}">View more ... </a>
                    </div>
                @endif
            @endif
        </div>
    </div>

    @if ($posts->count())
        <h2 class="parent-color bold mt-3">News</h2>
        <div class="row">
            @foreach ($posts as $post)
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
            @foreach ($threads as $thread)
                @include('threads.content-index')
            @endforeach
            @if ($threads->count() > 6)
                <div class="col-md-12 text-center">
                    <a class="btn btn-info btn-sm mt-2" href="/search/thread/{{$key}}">View more ... </a>
                </div>
            @endif
        </div>
    @endif

    <div class="row">
        @if ($products->count() < 1 && $posts->count() < 1 && $threads->count() < 1)
            <div class="alert alert-light" role="alert">
              Pencarian tidak di temukan.
            </div>
        @endif
    </div>

</div>
@endsection
