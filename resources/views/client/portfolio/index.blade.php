@extends('layouts.master_home',['slides' => []])

@section('home_content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Portolio</h2>
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Portolio</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">

        <div class="container">

            <div class="row portfolio-container" data-aos="fade-up">

                @foreach($images as $image)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <img src="{{ asset($image->image) }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <a href="{{ asset($image->image) }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section><!-- End Portfolio Section -->
@endsection
