@extends('frontend.base')

@section('content')
    <section class="inner">
        <div class="container">
            <div class="row">
             @if($news)
                @foreach($news as $news)

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="inner-img">
                        <a href="{{ route('news_details',$news->id) }}">
                            <figure style="background-image: url({{ asset('uploads/news/'.$news->image) }})"></figure>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="inner-details">
                        <h2><a href="{{ route('news_details',$news->id) }}">{{ $news->title }}</a></h2>
                        <p>{{ $news->location }}– {{ $news->summary }}</p>
                    </div>
                </div>
                @endforeach
            @endif

             


            </div>
        </div>
    </section>
@endsection
