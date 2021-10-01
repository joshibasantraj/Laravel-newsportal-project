<body>
    <header class="main-head">

        <div class="container">
            <div class="logo">
                <img src="{{ asset('assets/frontend/images/logo.png') }}">
            </div>
        </div>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="{{ route('my-home') }}" class="nav-link active"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                       @if(isset($category))
                        @foreach($category as $cat)
                            <li class="nav-item"><a href="{{ route('rel_news',$cat->id) }}" class="nav-link {{ ( isset($cat_id) && ($cat->id == $cat_id))?'active':'' }}">{{ $cat->title }}</a></li>
                        @endforeach
                       @endif
                      
                    </ul>
                </div>
            </div>
        </nav>

    </header>