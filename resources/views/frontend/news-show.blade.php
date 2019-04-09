@extends('layouts.news')

@section('news-content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- single-blog start -->
        <article class="blog-post-wrapper">
            <div class="post-thumbnail">
                <img src="{{$news_single->image}}" alt="{{$news_single->title}}" class="w-100" style="max-height: 400px;"/>
            </div>
            <div class="post-information">
                <h2>{{$news_single->title}}</h2>
                <div class="entry-meta">
                    <span class="author-meta"><i class="fa fa-user"></i> <a href="#">{{$news_single->user->name}}</a></span>
                    <span><i class="fa fa-clock-o"></i> {{$news_single->created_at->diffForHumans()}}</span>
                    <span class="tag-meta">
                        <i class="fa fa-folder-o"></i>
                        <a href="{{route('news.category',$news_single->category->name)}}">{{strtolower($news_single->category->name)}}</a>
                    </span>
                    <span><i class="fa fa-comments-o"></i> <a href="{{route('news.show',$news_single->slug)}}#disqus_thread">Join the discussion</a></span>
                </div>
                <div class="entry-content">
                    {!! $news_single->content !!}
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