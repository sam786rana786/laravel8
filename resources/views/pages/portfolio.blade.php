@extends('layouts.master')
@section('home_content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Portfolio</h2>
            <ol>
                <li><a href="index.html">Home</a></li>
                <li>Portfolio</li>
            </ol>
        </div>
    </div>
</section><!-- End Breadcrumbs -->
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="row" data-aos="fade-up">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                </ul>
            </div>
        </div>
        <div class="row portfolio-container" data-aos="fade-up">
            @foreach ($multipics as $img)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="{{ $img->image }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>App 1</h4>
                    <p>App</p>
                    <a href="{{ $img->image }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                        title="App 1"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" class="details-link" title="More Details"><i
                            class="bx bx-link"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section><!-- End Portfolio Section -->
@endsection
