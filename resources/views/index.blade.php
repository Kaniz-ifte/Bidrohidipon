<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bidrohi Dipon | man with movie camera</title>
    <meta name="title" content="Bidrohi Dipon | man with  movie camera">
    <meta name="description" content="A young promising cinematographer from Bangladesh.">
    @php
    $row=Background('share-banner');
    @endphp
    @if($row!=null)
    <meta property="og:image" content="{{asset($row->banner)}}">
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
    $row=Background('favicon');
    @endphp
    @if($row!=null)
    <link rel="shortcut icon" type="image/x-icon" href="{{asset($row->banner)}}">
    @endif
    <link rel="stylesheet" href="assets/css/preloader.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Place favicon.ico in the root directory -->
    <!-- <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'> -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/default-skin/default-skin.css'>
    <!-- CSS here -->
    <style>
        .pswp--open {
            z-index: 999999999 !important;
        }

        .pswp__zoom-wrap {
            text-align: center;
        }

        .pswp__zoom-wrap:before {
            content: '';
            display: inline-block;
            height: 100%;
            vertical-align: middle;
        }

        .wrapper {
            line-height: 0;
            width: 100%;
            max-width: 900px;
            position: relative;
            display: inline-block;
            vertical-align: middle;
            margin: 0 auto;
            text-align: left;
            z-index: 1045;
        }

        .video-wrapper {
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 */
            padding-top: 25px;
            height: 0;
            width: 100%;
        }

        .video-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        /* social media CSS */
        <blade importurl(https://fonts.googleapis.com/css?family=Lato);
        @importurl(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css);

        body /> {
            font-family: 'Lato', sans-serif;
            color: #FFF;
            background: none;
            -webkit-font-smoothing: antialiased;
        }

        a {
            text-decoration: none;
            color: #fff;
        }

        p>a:hover {
            color: #d9d9d9;
            text-decoration: underline;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 1% 0 1% 0;
        }

        ._12 {
            font-size: 1.2em;
        }

        ._14 {
            font-size: 1.4em;
        }

        ul {
            padding: 0;
            list-style: none;
        }

        .footer-social-icons {
            width: 350px;
            display: block;
            margin: 0 auto;
        }

        .social-icon {
            color: rgb(196 143 80 / 1);
        }

        ul.social-icons {
            margin-top: 10px;
        }

        .social-icons li {
            vertical-align: top;
            display: inline;
            height: 100px;
        }

        .social-icons a {
            color: rgb(196 143 80 / 1);
            text-decoration: none;
        }

        .fa-facebook {
            padding: 10px 14px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: none;
        }

        .fa-facebook:hover {
            background-color: #665F57;
        }

        .fa-twitter {
            padding: 10px 12px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: none;
        }

        .fa-twitter:hover {
            background-color: #665F57;
        }

        .fa-rss {
            padding: 10px 14px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: none;
        }

        .fa-rss:hover {
            background-color: #665F57;
        }

        .fa-youtube {
            padding: 10px 14px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: none;
        }

        .fa-youtube:hover {
            background-color: #665F57;
        }

        .fa-linkedin {
            padding: 10px 14px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: none;
        }

        .fa-linkedin:hover {
            background-color: #665F57;
        }

        .fa-github {
            padding: 10px 14px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: none;
        }

        .fa-github:hover {
            background-color: #665F57;
        }

        #exampleModalLong{

             z-index:99999999999;
             background:#00000088;
        }

        #exampleModalLong .modal-dialog{

             max-width:80vw;
             max-height:80vh;
             height:80vh;
             width:auto;
             background:transparent
        }
        #exampleModalLong .modal-content{

             background:transparent
        }
        #exampleModalLong .modal-header{

             border-bottom:0px;
        }
        #exampleModalLong .close{

             max-width:80%;
             color:#ffffff;
             font-size:24px;
        }

    </style>
    <link rel="stylesheet" href="assets/css/style.css">
    <script>
        var myVar;

        function myFunction() {
            myVar = setTimeout(showPage, 200);
        }

        function showPage() {
            // console.log("done...");
            document.getElementById("preloader").style.display = "none";
        }
    </script>
    <!-- <link rel="stylesheet" href="/assets/css/style.css"> -->
    <!-- modernizr js -->
    <script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- jQuery -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!--<script src="assets/js/preloader.js"></script>-->
</head>

<body>
    <!--<div id="preloader">-->
    <!--<div id="status" style="background-image: url('assets/img/preloader.gif')">&nbsp;-->
    <!--</div>-->
    </div>
    <div id="pagepiling">
        <!--header-start-->
        <header>
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg navbar-light">
                                    <a class="navbar-brand logo" href="#home">
                                        <img src="assets/img/logo/logo.png" alt="logo">
                                    </a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="ti-align-justify"></span>
                                    </button>
                                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                                        <ul class="navbar-nav">
                                            <li class="nav-item"> <a class="nav-link" href="#home">Home</a>
                                            </li>
                                            <li class="nav-item"> <a class="nav-link" href="#about">About</a>
                                            </li>
                                            <li class="nav-item"> <a class="nav-link" href="#cinematography">Cinematography</a>
                                            </li>
                                            <li class="nav-item"> <a class="nav-link" href="#stills">Stills</a>
                                            </li>
                                            <li class="nav-item"> <a class="nav-link" href="#blog">Blog</a>
                                            </li>
                                            </li>
                                            <li class="nav-item"> <a class="nav-link" href="#mentions">Mentions</a>
                                            </li>
                                            <li class="nav-item"> <a class="nav-link" href="#contact">Contact</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--header-end-->
        <main>
            @php
            $background=null;
            $row=Background('home-section');
            if($row!=null){
            $background=$row->banner;
            }
            @endphp
            <section class="hero-area section home" style="background: url({{$background!=null ? asset($background):asset('assets/img/bg/5.jpg')}})">

                <div class="center">
                    @php
                    $background=null;
                    $row=Background('home-section-video');
                    if($row!=null){
                    $background=$row->banner;
                    }
                    @endphp
                    <video autoplay muted loop id="video1" width="auto">
                        <source src="{{$background!=null ? asset($background):asset('assets/img/bg/5.jpg')}}" type="video/mp4">
                        <!-- <source src="mov_bbb.ogg" type="video/ogg"> -->
                        <!-- Your browser does not support HTML video. -->
                    </video>
                    <div class="video-content" id="video_controls">
                        <div class="container">
                            <div class="section-title hero-title">
                                <!-- <h4>Home</h4> -->
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="hero-content">

                                        <a href="#" data-toggle="modal" data-target="#exampleModalLong" class="mb-0 d-flex" style="color:white"><i class="ti-control-play" style="font-size:20px;"></i><span class="divider"></span>Play Showreel</a>




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Hero Section End -->
            <!-- About Section Start -->
            @php
            $background=null;
            $row=Background('about-section');
            if($row!=null){
            $background=$row->banner;
            }
            @endphp
            <section class="about-area section pp-scrollable" style="background: url({{$background!=null ? asset($background):asset('assets/img/bg/5.jpg')}})">
                <div class="d-table w-100 h-100">
                    <div class="container">
                        <div class="section-title">
                            <h6>About Me</h6>
                        </div>
                        @foreach (Abouts() as $row)
                        @if($row->is_active==1)
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="about-info mb-sm-20">
                                        <h5>{{$row->intro}}</h5>
                                        <p class="about-text">
                                            @php
                                            echo $row->description;
                                            @endphp
                                        </p>
                                        <h3> <a href="{{$row->imdb_url}}"> <img src="assets/img/logo/imdb.png" alt="thumbnails"></a></h3>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <br>
                                    <br>
                                    <div class="about-thumbnail">
                                        <img src="{{asset($row->profile_image)}}" alt="thumbnails">
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                    </div>
                </div>
            </section>
            <!-- About Section End -->
            <!-- Cinematography Section Start -->
            @php
            $background=null;
            $row=Background('cinematography-section');
            if($row!=null){
            $background=$row->banner;
            }
            @endphp
            <section class="portfolio-area section pp-scrollable" style="background: url({{$background!=null ? asset($background):asset('assets/img/bg/5.jpg')}})">
                <div class="d-table w-100 h-100 section-padding">
                    <div class="container">
                        <div class="section-title">
                            <h6>Cinematography</h6>
                        </div>
                        <br>
                        <div class="row mb-5">
                            <div class="col-12 col-md-8 ">
                                {{-- <h1 class="cine-heading"> Latest Project</h1><br> --}}
                                <div class="portfolio-content mb-sm-20">
                                    <div class="portfolio-tabs mb-7">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item"> <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
                                            </li>
                                            @foreach (Categories() as $row)
                                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#{{StringToSlug($row->title)}}" role="tab" aria-selected="true">{{$row->title}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 align-self-center"></div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="all" role="tabpanel">
                                        <br><br>
                                        <div class="photoswipe-wrapper row">
                                            @foreach (Cinemas('') as $row)
                                            <div class="col-md-4">
                                                <div class="photoswipe-item">
                                                    <a @if ($row->is_restricted==1) onclick="RestrictedLink('{{$row->url}}')"
                                                    @endif href="#" data-type="video"
                                                    data-video='<div class="wrapper">
                                                        <div class="video-wrapper"><iframe class="pswp__video" src="https://www.youtube.com/embed/{{YoutubeUrltoId($row->url)}}" width="960" height="640" frameborder="0" webkitallowfullscreen
                                                              mozallowfullscreen allowfullscreen></iframe></div>
                                                    </div>'>
                                                    <div style="padding:12px;">
                                                        <img src="{{asset($row->banner)}}" alt="Banner" class="img-responsive">
                                                    </div>
                                                    <h6 class="text-center">{{$row->title}}</h6>
                                                    </a>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @foreach (Categories() as $row)
                                    <div class="tab-pane fade" id="{{StringToSlug($row->title)}}" role="tabpanel">
                                        <br><br>
                                        <div class="photoswipe-wrapper row">
                                            @foreach (Cinemas($row->id) as $row)
                                            <div class="col-md-4">
                                                <div class="photoswipe-item">
                                                    <a href="#" data-type="video"
                                                      data-video='<div class="wrapper"><div class="video-wrapper"><iframe class="pswp__video" src="https://www.youtube.com/embed/{{$row->url}}" width="960" height="640" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div></div>'>
                                                        <div style="padding:12px;">
                                                            <img src="{{asset($row->banner)}}" alt="Banner" class="img-responsive">
                                                        </div>
                                                        <h6 class="text-center">{{$row->title}}</h6>
                                                    </a>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Cinematography Section End -->
            <!-- Stills Section start -->
            @php
            $background=null;
            $row=Background('still-section');
            if($row!=null){
            $background=$row->banner;
            }
            @endphp
            <section class="portfolio-area section pp-scrollable" style="background: url({{$background!=null ? asset($background):asset('assets/img/bg/5.jpg')}})">
                <div class="d-table w-100 h-100 section-padding">
                    <div class="container">
                        <div class="section-title">
                            <h6>Stills</h6>
                        </div>
                        <br> <br> <br> <br>
                        <div class=" row">
                            @php
                            $count=0;
                            @endphp
                            @foreach (Stills() as $stills)
                            @if($stills->is_active==1)
                                @php
                                $count++;
                                @endphp
                                <div class="col-md-4 load-more-still-item">
                                    <div>
                                        <a href="{{asset($stills->url)}}" target="_blank">
                                            <div style="padding:12px;">
                                                <img src="{{asset($stills->banner)}}" alt="Image description" class="img-responsive">
                                            </div>
                                            <h6 class="text-center">{{$stills->title}}</h6>
                                        </a>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                        </div>
                        @if ($count>6)
                        <div class="row align-items-center">
                            <!-- <button class="load-button" type="button"><h6>Load More</h6></button> -->
                            <button type="button" class="load-button btn btn-dark" id="still-load-more" onclick="LoadMore('load-more-still-item',this.id)">Load More</button>
                        </div>
                        @endif
                    </div>
                </div>
            </section>
            <!-- Stills Section End -->
            <!-- Blog Section start -->
            @php
            $background=null;
            $row=Background('blog-section');
            if($row!=null){
            $background=$row->banner;
            }
            @endphp
            <section class="portfolio-area section pp-scrollable" style="background: url({{$background!=null ? asset($background):asset('assets/img/bg/5.jpg')}})">
                <div class="d-table w-100 h-100 section-padding">
                    <div class="container">
                        <div class="section-title">
                            <h6>Blog</h6>
                        </div>
                        <div class="row load-more-body">
                            @php
                            $count=0;
                            @endphp
                            @foreach (Blogs() as $blogs)
                            @if($blogs->is_active==1)
                                @php
                                $count++;
                                @endphp
                                <div class="col-12 col-md-4 mb-sm-20 load-more-item">
                                    <div class="card" style="width: 22rem;">
                                        <a href="{{asset($blogs->url)}}">
                                            <img class="card-img-top" src="{{asset($blogs->banner)}}" alt="Card image cap">
                                            <div class="card-body">
                                                <h3 class="card-title">{{$blogs->title}}</h3>
                                        </a>
                                        <p class="card-text">{{$blogs->description}}</p>
                                    </div>
                                    {{-- <div class="card-body">
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div> --}}
                                </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @if ($count>3)
                    <div class="row align-items-center">
                        <!-- <button class="load-button" type="button"><h6>Load More</h6></button> -->
                        <button type="button" class="load-button btn btn-dark" id="blog-load-more" onclick="LoadMore('load-more-item',this.id)">Load More</button>
                    </div>
                    @endif
                </div>
    </div>
    </section>
    <!-- Blog Section End -->
    <!-- Mentions Section start -->
    @php
    $background=null;
    $row=Background('mention-section');
    if($row!=null){
    $background=$row->banner;
    }
    @endphp
    <section class="portfolio-area section pp-scrollable" style="background: url({{$background!=null ? asset($background):asset('assets/img/bg/5.jpg')}})">
        <div class="d-table w-100 h-100 section-padding">
            <div class="container">
                <div class="section-title">
                    <h6>Mentions</h6>
                </div>
                <br><br><br><br>
                <div class="photoswipe-wrapper row">
                    @foreach (Mentions() as $mentions)
                    @if($mentions->is_active==1)
                        <div class="col-md-4">
                            <div class="photoswipe-item">
                                <a href="#" data-type="video"
                                  data-video='<div class="wrapper"><div class="video-wrapper"><iframe class="pswp__video" src="{{asset($mentions->url)}}" width="960" height="640" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div></div>'>
                                    <div style="padding:12px;">
                                        <img src="{{asset($mentions->banner)}}" alt="Image description" class="img-responsive">
                                    </div>
                                    <h6 class="text-center">{{$mentions->title}}</h6>
                                </a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Mentions Section End -->
    <!-- Contact Section start -->
    @php
    $background=null;
    $row=Background('contact-section');
    if($row!=null){
    $background=$row->banner;
    }
    @endphp
    <section class="contact-area section pp-scrollable" style="background: url({{$background!=null ? asset($background):asset('assets/img/bg/5.jpg')}})">
        <div class="d-table w-100 h-100">
            <div class="container">
                <div class="section-title">
                    <h6>Contacts</h6>
                </div>
                <div class="row align-items-center">
                    <div class="col-12 col-md-2">
                    </div>
                    <div class="col-12 col-md-4 mb-sm-20">
                        <div class="contact-title mb-4">
                            <h4 class="_14">Contact Info</h4>
                        </div>
                        <div class="contact-info mb-3">
                            <ul>
                                <li>
                                    <div class="media"> <i class="ti-headphone-alt"></i>
                                        <div class="media-body"> <small>Phone:</small>
                                            <h5 class="mt-2">
                                                @php
                                                $row=Setting('phone');
                                                @endphp
                                                @if($row!=null)
                                                <a href="tel: {{$row->value}}">
                                                    {{$row->value}}
                                                </a>
                                                @endif
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="media"> <i class="ti-email"></i>
                                        <div class="media-body"> <small>E-mail:</small>
                                            <h5 class="mt-2">
                                                @php
                                                $row=Setting('email');
                                                @endphp
                                                @if($row!=null)
                                                <a href="mailto: {{$row->value}}">
                                                    {{$row->value}}
                                                </a>
                                                @endif
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="media"> <i class="ti-location-pin"></i>
                                        <div class="media-body"> <small>Adress:</small>
                                            <h6 class="mt-2">
                                                @php
                                                $row=Setting('address');
                                                @endphp
                                                @if($row!=null)
                                                {{$row->value}}
                                                @endif
                                            </h6>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-1">
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="footer-social-icons">
                            <h4 class="_14">Follow us on</h4>
                            <div class="row">
                                <ul class="social-icons">
                                    @foreach (SocialMedia() as $row)
                                    @if($row->is_active==1)
                                        <li><a href="{{$row->url}}" class="social-icon"> <i class="{{$row->icon_class}}"></i></a></li>
                                        @endif
                                        @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      
    </section>
    <!-- Contact Section End -->
    </main>



<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg"  role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe class="pswp__video" src="https://youtube.com/embed/{{Setting('home-video-url')!=null ? YoutubeUrltoId(Setting('home-video-url')->value) : '#' }}" frameborder="0" allowfullscreen></iframe>
      </div>

    </div>
  </div>
</div>



    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <!-- Background of PhotoSwipe.
                       It's a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>
        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">
            <!-- Container that holds slides.
                          PhotoSwipe keeps only 3 of them in the DOM to save memory.
                          Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <!--  Controls are self-explanatory. Order can be changed. -->
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--share" title="Share"></button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader--active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- JS here -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe-ui-default.min.js'></script>
    <script src="assets/js/jquery.pagepiling.min.js"></script>
    <script src="assets/js/scene.min.js"></script>
    <!-- <script async defer src="../connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script> -->
    <script src="assets/js/main.js"></script>
    <script>

        function RestrictedLink(url) {
            window.open(
                url, "_blank"
            )
        }
        // var myVideo = document.getElementById("video1");
        var video_controls = document.getElementById("video_controls");
        SetPlayIcon();
        $(window).on('resize', function() {
            SetPlayIcon();
        });

        function SetPlayIcon() {
            // console.log("window-innerWidth : " + window.innerWidth);
            // console.log("screen-width : " + screen.width);
            var device_width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
            var video_width = $("#video1").width();
            $("#video1").css({
                "height": "auto",
                "width": video_width + "px"
            });
            var left_value = (device_width / 2) - (video_width / 2) + 30;
            // console.log("myVideo-Width : " + video_width);
            // console.log("Play icon : " + left_value);
            video_controls.style.left = left_value + "px";
        }

        function LoadMore(class_name, load_button_id) {
            $('.' + class_name).toggleClass('active');
            var button_text = $('#' + load_button_id).text();
            if (button_text == "Load More") {
                $('#' + load_button_id).text('Load Less');
            } else {
                $('#' + load_button_id).text('Load More');
            }
        }
    </script>
</body>

</html>
