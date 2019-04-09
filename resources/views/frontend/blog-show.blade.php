@extends('layouts.blog')

@section('blog-content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- single-blog start -->
        <article class="blog-post-wrapper">
            <div class="post-thumbnail">
                <img src="{{$post->image}}" alt="{{$post->title}}" class="w-100" style="max-height: 400px;"/>
            </div>
            <div class="post-information">
                <h2>{{$post->title}}</h2>
                <div class="entry-meta">
                    <span class="author-meta"><i class="fa fa-user"></i> <a href="#">{{$post->user->name}}</a></span>
                    <span><i class="fa fa-clock-o"></i> {{$post->created_at->diffForHumans()}}</span>
                    <span class="tag-meta">
                        <i class="fa fa-folder-o"></i>
                        <a href="{{route('blog.category',$post->category->name)}}">{{strtolower($post->category->name)}}</a>
                    </span>
                    <span><i class="fa fa-comments-o"></i> <a href="{{route('blog.show',$post->slug)}}#disqus_thread">Join the discussion</a></span>
                </div>
                <div class="entry-content">
                    {!! $post->content !!}
                </div>
            </div>
        </article>
        <div class="clear"></div>
        <div class="single-post-comments">
            @include('includes.disqus')
        </div>
        <!-- single-blog end -->
    </div>
@endsection