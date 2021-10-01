@extends('frontend.base')
@section('content')
    <section class="news-inner">
        <div class="container">
            <div class="full-news">
                <h2>{{ $news_details->title }}</h2>
                <figure style="background-image: url({{ asset('uploads/news/'.$news_details->image) }})"></figure>
                <p>{{ $news_details->summary }}</p>
                <p>{{ @$news_details->description }}</p>   
            </div>
            <div class="comment">
                <h4>Comment</h4>
                <textarea></textarea>
                <input type="button" value="Comment">
            </div>
            <div class="news-wrapper">
                <div class="section-title more">
                    <h2>थप समाचार</h2>
                </div>
                <div class="more-list"></div>
                    <div class="row">
                       @if($related_news)
                        @foreach($related_news as $news)
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="more-news">
                                <a href="{{ route('news_details',$news->id) }}">
                                    <figure style="background-image: url({{ asset('uploads/news/'.$news->image) }})"></figure>
                                </a>
                                <h2><a href="{{ route('news_details',$news->id) }}">{{ $news->title }}</a></h2>
                            </div>
                        </div>
                        @endforeach
                        @endif
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

   