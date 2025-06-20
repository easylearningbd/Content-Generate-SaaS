 @extends('home.page.main_master')
 @section('page')

  <section class="section section-bottom-0 has-shape has-mask">
    <div class="nk-shape bg-shape-blur-m mt-8 start-50 top-0 translate-middle-x"></div>
    <div class="nk-mask bg-pattern-dot bg-blend-around mt-n5 mb-10p mh-50vh"></div>
    <div class="container">
        <div class="section-head">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <h6 class="overline-title text-primary">Feature</h6>
                    <h2 class="title h1">Generate AI-powered content in 1 click.</h2>
                </div>
            </div>
        </div><!-- .section-head -->
       
    @php
    $templates = App\Models\Template::latest()->limit(6)->get();
   @endphp    

        <div class="section-content">
            <div class="row g-gs">
                
                
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
<section class="section section-bottom-0">
    <div class="container">
        <div class="section-head">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <h6 class="overline-title text-primary">How it works</h6>
                    <h2 class="title">Few steps to write content </h2>
                </div>
            </div>
        </div><!-- .section-head -->
        <div class="section-content">
            <div class="row g-gs justify-content-center flex-md-row-reverse align-items-center">
                <div class="col-xl-4 col-lg-5 col-md-6">
                    <div class="rounded-4 bg-info bg-opacity-50 p-5 pe-0">
                        <div class="block-gfx me-n4">
                            <img class="w-100 rounded-3 shadow-sm" src="{{ asset('frontend/images/gfx/process/a.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6">
                    <div class="block-text">
                        <div class="media media-middle text-bg-primary-soft rounded-pill fw-medium fs-5 mb-3">01</div>
                        <h3 class="title">Select a Template</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                </div>
            </div><!-- .row -->
        </div><!-- .section-content -->
        <div class="sction-sap text-center py-3 d-none d-md-block">
            <svg class="h-3rem h-sm-5rem h-lg-7rem" viewBox="0 0 444 112" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M442.989 1C443.49 18.4197 426.571 53.2592 354.892 53.2591C265.293 53.2591 126.139 53.2591 80.0875 53.2591C34.0366 53.2591 7.00663 85.784 0.999979 111" stroke="currentColor" stroke-dasharray="7 7" />
            </svg>
        </div><!-- .sction-sap -->
        <div class="h-3rem d-md-none"></div>
        <div class="section-content">
            <div class="row g-gs justify-content-center align-items-center">
                <div class="col-xl-4 col-lg-5 col-md-6">
                    <div class="rounded-4 bg-primary bg-opacity-40 p-5 ps-0">
                        <div class="block-gfx ms-n4">
                            <img class="w-100 rounded-3 shadow-sm" src="{{ asset('frontend/images/gfx/process/b.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6">
                    <div class="block-text px-xxl-5">
                        <div class="media media-middle text-bg-primary-soft rounded-pill fw-medium fs-5 mb-3">02</div>
                        <h3 class="title">Fill in Your Product Details</h3>
                        <p>Explain with as many details as possible to the AI what you would like to write about.</p>
                        <ul class="list gy-2">
                            <li><em class="icon ni ni-dot"></em><span>At vero eos et accusamus et iusto</span></li>
                            <li><em class="icon ni ni-dot"></em><span>At vero eos et accusamus et iusto</span></li>
                        </ul>
                    </div>
                </div>
            </div><!-- .row -->
        </div><!-- .section-content -->
        <div class="sction-sap text-center py-3 d-none d-md-block">
            <svg class="h-3rem h-sm-5rem h-lg-7rem" viewBox="0 0 444 114" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.01068 1C0.510125 18.7364 17.4289 54.2093 89.1082 54.2093C178.707 54.2093 317.861 54.2093 363.912 54.2093C409.963 54.2093 436.993 87.3256 443 113" stroke="currentColor" stroke-dasharray="7 7" />
            </svg>
        </div><!-- .sction-sap -->
        <div class="h-3rem d-md-none"></div>
        <div class="section-content">
            <div class="row g-gs justify-content-center flex-md-row-reverse align-items-center">
                <div class="col-xl-4 col-lg-5 col-md-6">
                    <div class="rounded-4 bg-pink bg-opacity-30 p-5 pe-0">
                        <div class="block-gfx me-n4">
                            <img class="w-100 rounded-3 shadow-sm" src="{{ asset('frontend/images/gfx/process/c.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6">
                    <div class="block-text">
                        <div class="media media-middle text-bg-primary-soft rounded-pill fw-medium fs-5 mb-3">03</div>
                        <h3 class="title">Generate AI Content</h3>
                        <p>Our highly trained AI understands your details and generate unique and human-like content in seconds.</p>
                    </div>
                </div>
            </div><!-- .row -->
        </div><!-- .section-content -->
    </div><!-- .container -->
</section><!-- .section -->
<section class="section section-bottom-0">
    <div class="container">
        <div class="section-wrap bg-primary bg-opacity-10 rounded-4">
            <div class="section-content bg-pattern-dot-sm p-4 p-sm-6">
                <div class="row justify-content-center text-center">
                    <div class="col-xl-8 col-xxl-9">
                        <div class="block-text">
                            <h6 class="overline-title text-primary">Boost your writing productivity</h6>
                            <h2 class="title">End writer’s block today</h2>
                            <p class="lead mt-3">It’s like having access to a team of copywriting experts writing powerful copy for you in 1-click.</p>
                            <ul class="btn-list btn-list-inline">
                                <li><a href="#" class="btn btn-lg btn-primary"><span>Start writing for free</span><em class="icon ni ni-arrow-long-right"></em></a></li>
                            </ul>
                            <ul class="list list-row gy-0 gx-3">
                                <li><em class="icon ni ni-check-circle-fill text-success"></em><span>No credit card required</span></li>
                                <li><em class="icon ni ni-check-circle-fill text-success"></em><span>Cancel anytime</span></li>
                                <li><em class="icon ni ni-check-circle-fill text-success"></em><span>10+ tools to expolore</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- .section-content -->
        </div><!-- .section-wrap -->
    </div><!-- .container -->
</section><!-- .section -->



  @endsection