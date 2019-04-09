@extends('layouts.events')

@section('events-content')
    @if(count($events)>0)
        @foreach($events as $event)
            <!-- Start single blog -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="single-blog">
                    <div class="single-blog-img">
                        <a href="{{route('event.show',$event->slug)}}">
                            <img src="{{$event->image}}" alt="{{$event->title}}" class="w-100" style="max-height: 400px;">
                        </a>
                    </div>
                    <div class="blog-meta">
                                        <span class="comments-type">
                                            <i class="fas fa-comment-alt"></i>
                                            <a href="{{route('event.show',$event->slug)}}#disqus_thread">Join the discussion</a>
                                        </span>
                        <span class="date-type">
                                                <i class="fa fa-calendar"></i>{{\Illuminate\Support\Carbon::create($event->datetime)->diffForHumans()}}
                                            </span>
                        <span class="comments-type">
                                            <i class="fas fa-location-arrow"></i>
                                            <a href="{{route('event.show',$event->slug)}}#disqus_thread">{{$event->location}}</a>
                                        </span>
                        <span class="date-type">
                    </div>
                    <div class="blog-text">
                        <h4>
                            <a href="{{route('event.show',$event->slug)}}">{{$event->title}}</a>
                        </h4>
                        <p>
                            {{$event->description}}
                        </p>
                    </div>
                    <span>
                                            <a href="{{route('event.show',$event->slug)}}" class="ready-btn">Read more</a>
                                        </span>
                </div>
            </div>
            <!-- End single blog -->
        @endforeach
    @else
        <h2>No Upcoming Events</h2>
    @endif
    <div class="blog-pagination">
        {{$events->links()}}
    </div>
@endsection

@section('scripts')
    <script id="dsq-count-scr" src="//ifmoa.disqus.com/count.js" async></script>
@endsection