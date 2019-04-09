@extends('layouts.blog')

@section('blog-content')
    @if(count($posts)>0)
        @foreach($posts as $post)
            <!-- Start single blog -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="single-blog">
                    <div class="single-blog-img">
                        <a href="{{route('blog.show',$post->slug)}}">
                            <img src="{{$post->image}}" alt="{{$post->title}}" class="w-100" style="max-height: 400px;">
                        </a>
                    </div>
                    <div class="blog-meta">
                                        <span class="comments-type">
                                            <i class="fas fa-comment-alt"></i>
                                            <a href="{{route('blog.show',$post->slug)}}#disqus_thread">Join the discussion</a>
                                        </span>
                        <span class="date-type">
                                                <i class="fa fa-calendar"></i>{{$post->created_at->diffForHumans()}}
                                            </span>
                    </div>
                    <div class="blog-text">
                        <h4>
                            <a href="{{route('blog.show',$post->slug)}}">{{$post->title}}</a>
                        </h4>
                        <p>
                            {{$post->description}}
                        </p>
                    </div>
                    <span>
                                            <a href="{{route('blog.show',$post->slug)}}" class="ready-btn">Read more</a>
                                        </span>
                </div>
            </div>
            <!-- End single blog -->
        @endforeach
    @else
        <h2>No Posts Available</h2>
    @endif
    <div class="blog-pagination">
        {{$posts->links()}}
    </div>
@endsection

@section('scripts')
    <script id="dsq-count-scr" src="//ifmoa.disqus.com/count.js" async></script>
@endsection