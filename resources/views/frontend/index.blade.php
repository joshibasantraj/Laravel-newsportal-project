@extends('frontend.base')

@section('content')

    <section class="big-news">
        <div class="container">
            <div class="news-details">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="big-news-img">
                            <a href="#">
                                <figure style="background-image: url('{{ asset('assets/frontend/images/court.jpg') }}');"></figure>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-12">
                        <div class="big-news-detail news-title">
                            <h2><a href="#">निषेधित क्षेत्रविरुद्ध सर्वाेच्चमा मुद्दा दायर</a></h2>
                            <p>
                                <span>काठमाडौं– </span>
                                <span>सम्बाददाता</span>
                            </p>
                            <p>
                                सरकारले घोषणा गरेको निषेधित क्षेत्र खारेजीको माग गर्दै सर्वाेच्च अदालतमा मुद्दा दायर भएको छ। शुक्रबार वरिष्ठ अधिवक्ता दिनेश त्रिपाठीले माइतीघर मण्डला लगायतका  ठाउँमा प्रदर्शन गर्न नपाइने निर्णय खारेजीको माग गर्दै सर्वाेच्चमा रिट दायर गरेका हुन्। उनको मुद्दामा शुक्रबार सुनवाई हुनेछ। गृह प्रशासन सुधार योजना अन्तर्गत काठमाडौं जिल्ला प्रशासनले कार्यालयले माइतीघर मण्डलालाई निषेधित क्षेत्र घोषणा गर्दै ७ स्थानलाई प्रदर्शनस्थल तोकेको छ। गृहको निर्देशनअनुसार ७७ वटै जिल्लामा स्थानीय प्रशासनले निश्चित प्रदर्शन स्थल तोकेको छ। 
                            </p>
                            <span>२०७५-१०-०३, शनिबार</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(isset($category))
    @foreach($category as $cat)
            <section class="politics">
                <div class="container">
                    <div class="section-title">
                        <h2><a href="#">{{ $cat->title }}</a></h2>
                        <p><a href="#">सबै हर्नुहोस् <i class="fa fa-bars" aria-hidden="true"></i></a></p>
                    </div>
                    @if(isset($cat->news_info))
                        <div class="news-wrapper">
                            <div class="row">
                                <div class="col-lg-5 col-md-6 col-sm-12">
                                    <div class="politics-img-news news-title">
                                        <figure style="background-image: url('{{ asset('uploads/news/'.$cat->news_info[0]->image) }}');"></figure>
                                        <h2><a href="#">{{ $cat->news_info[0]->title }}</a></h2>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-6 col-sm-12">
                                    <div class="politics-news-list">
                                        <div class="listing">
                                            <div class="row">
                                              
                                               
                                               @foreach($cat->news_info as $news)
                                                <div class="col-md-4">
                                                    <a href="#"><figure style="background-image: url('{{ asset('uploads/news/'.$news->image) }}');"></figure></a>
                                                </div>
                                                <div class="col-md-8">
                                                    <h3><a href="#">{{ $news->title }}</a></h3>
                                                    <p>
                                                      {{ $news->summary }} 
                                                    </p>
                                                </div>
                                               @endforeach
                                               

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </section>
    @endforeach
    @endif
   
  

    <section class="video">
        <div class="container">
            <div class="section-title">
                <h2><a href="#">भिडियो</a></h2>
                <p><a href="#">सबै हर्नुहोस् <i class="fa fa-bars" aria-hidden="true"></i></a></p>
            </div>
            <div class="news-wrapper">
                <div class="row">
                    @if(isset($videos))
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="big-video">
                                {!! $videos[0]->video_link !!}
                                <h3><a href="#">{{ $videos[0]->title }}</a></h3>
                            </div>
                        </div>
                     
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="small-video">
                                <div class="row">
                                    @foreach($videos as $video)

                                    <div class="col-md-5">
                                          {!! $video->video_link !!}
                                    </div>
                                    <div class="col-md-7">
                                            <h3><a href="#">{{ $video->title }}</a></h3>
                                    </div>

                                    @endforeach
                                  
                                </div>
                            </div>
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </section>
   

    <section class="gallery">
            <div class="container">
                <div class="section-title">
                    <h2><a href="#">फोटो फिचर</a></h2>
                    <p><a href="#">सबै हर्नुहोस् <i class="fa fa-bars" aria-hidden="true"></i></a></p>
                </div>
                <div class="news-wrapper">
                    <div class="row">
                      @if(isset($galleries))
                      @foreach($galleries as $gallery)
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="gallery-fig">
                                <img src="{{ asset('uploads/gallery/'.$gallery->image) }}" style="max-height: 100%;">
                                <div class="gallery-hover">
                                    <a href="{{ asset('uploads/gallery/'.$gallery->image) }}" data-lightbox="gallery"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                       @endif
                    </div>
                </div>
             </div>
    </section>

  @endsection