 @extends('home.page.main_master')
 @section('page')

 <section class="section section-bottom-0 has-shape has-mask">
<div class="nk-shape bg-shape-blur-m mt-8 start-50 top-0 translate-middle-x"></div>
<div class="nk-mask bg-pattern-dot bg-blend-around mt-n5 mb-10p mh-50vh"></div>
<div class="container">
    <div class="section-head">
        <div class="row justify-content-center text-center">
            <div class="col-xl-8">
                <h6 class="overline-title text-primary">Use cases</h6>
                <h1 class="title">Write high-converting emails in <br class="d-none d-md-block"> <s>hours</s> <span class="text-primary">minutes</span></h1>
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