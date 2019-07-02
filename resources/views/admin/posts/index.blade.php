@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/left-right-modal.css">
@endsection

@section('content')
<div class="container-fluid">
    
    <span class="parent-color bold text-size-15">Post List</i></span>
    @include('admin.left-sidebar')
            
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary btn-sm" href="/admin/post/create"><i class="fas fa-plus"></i> Create Post </a>
                    @if (session('status'))
                        <small class="danger">{{ session('status') }}</small>
                    @endif
                </div>
                @if($posts->count())
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <th>Img</th><th>Title</th><th>Menu</th><th>Tags</th><th>Comment</th><th>Created</th><th>User</th><th>Status</th><th>Edit</th><th>Delete</th>
                            @foreach($posts as $post)
                                <tr class="table-warning">
                                    <td class="text-center bg-light" rowspan="2" style="vertical-align: middle;">
                                        <img src="@if ($post->img == null)/parts/no-image.png @else /posts/thumb/{{$post->img}} @endif" class="dashboard-img">
                                    </td>
                                    <td class="td-250">
                                        <a class="text-link @if ($post->sticky==1) text-success @endif" href="/read/post/{{$post->slug}}">{{$post->title}}</a>
                                    </td>
                                    <td>{{$post->menu->name}}</td>
                                    <td>
                                        @if ($post->tags->count())
                                            @foreach ($post->tags as $tag)
                                                <a href="/tag/{{$tag->slug}}" class="tags">
                                                    <small>{{$tag->name}}</small>
                                                </a>
                                            @endforeach
                                        @else
                                            <samll class="post-tags">Uncategorize</samll>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($post->comment==1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                        , {{$post->comments->count()}}
                                    </td>
                                    <td><small>{{ date('d F, Y', strtotime($post->created_at))}}</small></td>
                                    <td class="td-150">
                                        <small><i class="fas fa-user"></i> {{$post->user->name}}</small>
                                    </td>
                                    <td>
                                        @if ($post->status==1)
                                            <p class="text-success">Publish</p>
                                        @else
                                            <p class="text-danger">Draft</p>
                                        @endif
                                    </td>
                                    <td><a href="/admin/post/{{$post->id}}/edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a></td>
                                    <td>@include('admin.posts.delete')</td>
                                </tr>
                                <tr>
                                    @include('admin.posts.quick-edit')
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @endif
                <div class="card-footer">{{$posts->links()}}</div>
            </div>
        </div>

    </div>
</div>
@endsection
