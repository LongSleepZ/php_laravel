@extends('layouts.master')
@section('title',$postType)
@section('content')
<header class="intro-header" style="background-image: url('{{ asset('img/home-bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="page-heading">
                    <h1>{{ $postType }}</h1>
                    <hr class="small">
                    <span class="subheading"></span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            @foreach($posts as $post)
            <div class="post-preview">
                <a href="{{route('posts.show',$post->id)}}">
                    <h2 class="post-title">{{$post->title}}
                    </h2></a>
                <h3 class="post-subtitle">

                </h3>
                <p class="post-meta">由 <a href="#">Start Bootstrap</a> 發表於 {{ $post->created_at->toDateString() }}</p>
            </div>
            <hr>
            @endforeach

            <!-- Pager -->
            <nav class="text-center">
                {!!  $posts->render() !!}
            </nav>
        </div>
    </div>
</div>
@endsection
