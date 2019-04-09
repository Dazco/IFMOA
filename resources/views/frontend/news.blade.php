@extends('layouts.news')

@section('news-content')
    @if(count($news)>0)
        @foreach($news as $news_single)
            <!-- Start single blog -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="single-blog">
                    <div class="single-blog-img">
                        <a href="{{route('news.show',$news_single->slug)}}">
                            <img src="{{$news_single->image}}" alt="{{$news_single->title}}" class="w-100" style="max-height: 400px;">
                        </a>
                    </div>
                    <div class="blog-meta">
                                        <span class="comments-type">
                                            <i class="fas fa-comment-alt"></i>
                                            <a href="{{route('news.show',$news_single->slug)}}#disqus_thread">Join the discussion</a>
                                        </span>
                        <span class="date-type">
                                                <i class="fa fa-calendar"></i>{{$news_single->created_at->diffForHumans()}}
                                            </span>
                    </div>
                    <div class="blog-text">
                        <h4>
                            <a href="{{route('news.show',$news_single->slug)}}">{{$news_single->title}}</a>
                        </h4>
                        <p>
                            {{$news_single->description}}
                        </p>
                    </div>
                    <span>
                                            <a href="{{route('news.show',$news_single->slug)}}" class="ready-btn">Read more</a>
                                        </span>
                </div>
            </div>
            <!-- End single blog -->
        @endforeach
    @else
        <h2>No Recent News</h2>
    @endif
    <div class="blog-pagination">
        {{$news->links()}}
    </div>
@endsection

@section('scripts')
    <script id="dsq-count-scr" src="//ifmoa.disqus.com/count.js" async></script>
@endsection