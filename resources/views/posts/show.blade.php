@extends('layouts.master')
@section('title',$post->title)
@section('content')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{ asset('img/post-bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>{{ $post->title }}</h1>
                    <h2 class="subheading">{{ $post->sub_title }}</h2>
                    <span class="meta">由 <a href="{{ route('posts.user',$post->user->id) }}">{{ $post->user->name }}</a> 發表於 {{ $post->created_at->toDateString() }}</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                
                @include('layouts.partials.notification')
                
                @if(Auth::check() && $post->user->id == Auth::user()->id)
                <div class="text-right" style="margin-bottom: 50px;">
                    <a href="{{ route('posts.edit',$post->id)}}" class="btn btn-primary">編輯</a>
                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete', 'style' => 'display: inline;']) !!}
                    {!! Form::submit('刪除', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </div>
                @endif

                <div style="margin-bottom: 30px;">
                    {!! $post->content !!}
                </div>

                <!-- Comments Form -->
                <!-- <div class="well">
                    <h4>留下您的意見：</h4>
                    {!! Form::open(['route'=>['posts.comment',$post->id], 'method' => 'post', 'role' => 'form']) !!}
                    <div class="form-group">
                        {!! Form::label('name', '姓名：') !!}
                        {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'required']) !!}

                        {!! Form::label('email', 'Email：') !!}
                        {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'required']) !!}

                        {!! Form::label('content', '內文：') !!}
                        {!! Form::textarea('content', null, ['rows' => 3, 'id' => 'content', 'class' => 'form-control', 'required']) !!}
                    </div>
                    {!! Form::submit('送出',['class'=>'btn btn-primary']) !!}
                    {!! Form::close()!!}
                </div>-->
                
                <!-- Comments Form (ajax)-->
                <div id="commentDiv" class="well">
                    <input type="hidden" id="post_id" value='{{$post->id}}'>
                    <meta name="_token" content="{!! csrf_token() !!}" />
                    <h4>留下您的意見：</h4>
                    <div class="form-group">
                        <label>姓名：</label>
                        <input type="text"  id='name' class = 'form-control'　required></input>

                        <label>Email：</label>
                        <input type="text"  id ='email' class='form-control' required></input>

                        <label>內文：</label>
                        <textarea id ='content' rows=3  class='form-control' required></textarea>
                    </div>
                    <button id='addComment' class='btn btn-primary'>送出</button>
                </div>
                
                <hr>

                <!-- Posted Comments -->
                <div id='comment-list'>
                @foreach($post->comments as $comment)
                <div class="media">
                    <div class="media-body">
                        <h4 class="media-heading">{{ $comment->name }} ({{ $comment->email }})
                            <small>{{ $comment->created_at->toDateString() }}</small>
                        </h4>
                        {!! $comment->content !!}
                    </div>
                </div>
                @endforeach
                </div>

            </div>
        </div>
    </div>
</article>
@endsection

@section('extraJs')
 <!-- Scripts ajax-->
<script src="{{ asset('js/posts/show-ajax.js') }}"></script>
@endsection