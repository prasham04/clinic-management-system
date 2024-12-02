@extends('front.inc.master')

@section('title')
  VCare - Home page
@endsection

@section('content')

<div class="container-fluid bg-blue text-white pt-3">
    <div class="container pb-5">
        <div class="row gap-2">
            <div class="col-sm order-sm-2">
                <img src="{{ 'images/settings/' . settings('hero_image') }}" class="img-fluid banner-img banner-img" alt="banner-image"
                    height="200">
            </div>
            <div class="col-sm order-sm-1">
                <h1 class="h1">{{ settings('hero_title') }}</h1>
                <p>{{ settings('hero_description') }}</p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    {{-- majors --}}
    <h2 class="h1 fw-bold text-center my-4">Majors</h2>
    <div class="d-flex flex-wrap gap-4 justify-content-center">

        @foreach ( $majors as $major )
        <div class="card p-2" style="width: 18rem;">
            <img src="{{ asset('images/majors/' . $major->image)  }}" class="card-img-top rounded-circle card-image-circle"
                alt="major">
            <div class="card-body d-flex flex-column gap-1 justify-content-center">
                <h4 class="card-title fw-bold text-center">{{ $major->title }}</h4>
                <a href="./doctors/index.html" class="btn btn-outline-primary card-button">Browse Doctors</a>
            </div>
        </div>           
        @endforeach
  
    </div>

    <h2 class="h1 fw-bold text-center my-4">doctors</h2>
    <section class="splide home__slider__doctors mb-5">
        <div class="splide__track ">
            <ul class="splide__list">

                @foreach ($doctors as $doctor)
                <li class="splide__slide">
                    <div class="card p-2" style="width: 18rem;">
                        <img src="{{ asset('images/doctors/' . $doctor->image)  }}" class="card-img-top rounded-circle card-image-circle"
                            alt="major">
                        <div class="card-body d-flex flex-column gap-1 justify-content-center">
                            <h4 class="card-title fw-bold text-center">{{ $doctor->name }}</h4>
                            <h6 class="card-title fw-bold text-center">{{ $doctor->major->title }}</h6>
                            <a href="{{ route('front.booking', $doctor) }}" class="btn btn-outline-primary card-button">Book an
                                appointment</a>
                        </div>
                    </div>
                </li>                    
                @endforeach
                
            </ul>
        </div>
    </section>
</div>
<div class="banner container d-block d-lg-grid d-md-block d-sm-block">
    <div class="info">
        <div class="info__details">
            <img src="{{ 'images/settings/' . settings('service_image_1') }}" alt="" width="50" height="50">
            <h4 class="title m-0">{{ settings('service_title_1') }}</h4>
            <p class="content">{{ settings('service_description_1') }}</p>
        </div>
    </div>
    <div class="info">
        <div class="info__details">
            <img src="{{ 'images/settings/' . settings('service_image_2') }}" alt="" width="50" height="50">
            <h4 class="title m-0">{{ settings('service_title_2') }}</h4>
            <p class="content">{{ settings('service_description_2') }}</p>
        </div>
    </div>
    <div class="info">
        <div class="info__details">
            <img src="{{ 'images/settings/' . settings('service_image_3') }}" alt="" width="50" height="50">
            <h4 class="title m-0">{{ settings('service_title_3') }}</h4>
            <p class="content">{{ settings('service_description_3') }}</p>
        </div>
    </div>
    <div class="info">
        <div class="info__details">
            <img src="{{ 'images/settings/' . settings('service_image_4') }}" alt="" width="50" height="50">
            <h4 class="title m-0">{{ settings('service_title_4') }}</h4>
            <p class="content">{{ settings('service_description_4') }}</p>
        </div>
    </div>

    <div class="bottom--left bottom--content bg-blue text-white">
        <h4 class="title">{{ settings('app_title') }}</h4>
        <p>{{ settings('app_description') }}</p>
        <div class="app-group">
            <div class="app"><img
                    src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/google-play-logo.svg"
                    alt="">Google Play</div>
            <div class="app"><img
                    src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/apple-logo.svg"
                    alt="">App Store</div>
        </div>
    </div>
    <div class="bottom--right bg-blue text-white">
        <img src="{{ 'images/settings/' . settings('app_image') }}" class="img-fluid banner-img">
    </div>
</div>

@endsection