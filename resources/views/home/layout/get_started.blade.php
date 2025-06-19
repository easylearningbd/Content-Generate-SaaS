<section class="section section-bottom-0 has-shape">
<div class="nk-shape bg-shape-blur-a mt-8 start-50 top-0 translate-middle-x"></div>
<div class="container">
    <div class="section-head">
        <div class="row justify-content-center text-center">
            <div class="col-lg-9 col-xl-8 col-xxl-7">
                <h6 class="overline-title text-primary">Get started for free</h6>
                <h2 class="title">AI Generate content in seconds</h2>
                <p class="lead">Give our AI a few descriptions and we'll automatically create blog articles, product descriptions and more for you within just few second.</p>
            </div>
        </div>
    </div><!-- .section-head -->

@php
    $templates = App\Models\Template::latest()->limit(6)->get();
@endphp

    <div class="section-content">
        <div class="row text-center g-gs">

@foreach ($templates as $item) 

<div class="col-md-6 col-xl-4">
    <div class="card rounded-4 border-0 shadow-tiny h-100">
        <div class="card-body">
            <div class="feature">
                <div class="feature-media">
                    <div class="media media-middle media-xl text-bg-primary-soft rounded-4">
                        <em class="{{ $item->icon }}"></em>
                    </div>
                </div>
                <div class="feature-text">
                    <h4 class="title">{{ $item->title }}</h4>
                    <p>{{ $item->description }} </p>
                </div>
            </div>
        </div>
    </div>
</div><!-- .col -->
@endforeach

             
        </div><!-- .row -->
    </div><!-- .section-content -->
</div><!-- .container -->
</section><!-- .section -->