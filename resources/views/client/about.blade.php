@extends('layouts.master_home',['slides' => []])

@section('home_content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>About</h2>
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>About</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <div class="row content">
                <div class="col-lg-6 aos-init aos-animate" data-aos="fade-right">
                    <h2>{{ $about->title }}</h2>
                    <h3>{{ $about->short_desc }}</h3>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 aos-init aos-animate" data-aos="fade-left">
                    <p class="font-italic">
                        {{ $about->long_desc }}
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->
@endsection
