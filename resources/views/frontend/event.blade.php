@extends('layouts.events')

@section('events-content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- single-blog start -->
        <article class="blog-post-wrapper">
            <div class="post-thumbnail">
                <img src="{{$event->image}}" alt="{{$event->title}}" class="w-100" style="max-height: 400px;"/>
            </div>
            <div class="post-information">
                <h2>{{$event->title}}</h2>
                <div class="entry-meta">
                    <span class="author-meta"><i class="fa fa-user"></i> <a href="#">{{$event->user->name}}</a></span>
                    <span><i class="fa fa-clock-o"></i> {{$event->start_date}}</span>
                    <span><i class="fa fa-location-arrow"></i> {{$event->location}}</span>
                    <span class="tag-meta">
                        <i class="fa fa-folder-o"></i>
                        <a href="{{route('events.category',$event->category->name)}}">{{strtolower($event->category->name)}}</a>
                    </span>
                    <span><i class="fa fa-comments-o"></i> <a href="{{route('blog.show',$event->slug)}}#disqus_thread">Join the discussion</a></span>
                </div>
                <div class="entry-content">
                    {!! $event->content !!}
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