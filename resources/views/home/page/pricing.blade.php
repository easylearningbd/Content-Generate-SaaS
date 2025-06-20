 @extends('home.page.main_master')
 @section('page')

<section class="section section-bottom-0 has-shape has-mask">
<div class="nk-shape bg-shape-blur-m mt-8 start-50 top-0 translate-middle-x"></div>
<div class="nk-mask bg-pattern-dot bg-blend-around mt-n5 mb-10p mh-50vh"></div>
<div class="container">
    <div class="section-head">
        <div class="row justify-content-center text-center">
            <div class="col-lg-10 col-xl-9 col-xxl-8">
                <h6 class="overline-title text-primary">Plans &amp; Pricing</h6>
                <h2 class="title h1">Plans that best suit your business requirements</h2>
            </div>
        </div>
    </div><!-- .section-head -->
    <div class="section-content">
        <div class="row g-gs justify-content-center">
            
            
      @php
      $plan = App\Models\Plan::orderBy('id','asc')->get();
      $silverPlan = $plan->where('name','Silver')->first();
  @endphp          

@foreach ($plan as $planItem) 

<div class="col-lg-4 col-md-6">
    <div class="pricing {{ $planItem->name === 'Silver' ? 'pricing-featured bg-primary' : 'pricing' }}  ">
        <div class="pricing-body p-5">
            <div class="text-center">
                <h5 class="mb-3">{{ $planItem->name }}</h5>
                <h3 class="h2 mb-4">${{ $planItem->price }} <span class="caption-text text-muted"> / month</span></h3>
                <a href="{{ route('register') }}" class="btn {{ $planItem->name === 'Silver' ? 'btn-primary btn-block' : 'btn-primary btn-soft btn-block' }} ">Start free trial today</a>
            </div>
            <ul class="list gy-3 pt-4 ps-2">
                <li><em class="icon ni ni-check text-success"></em> <span><strong>{{ $planItem->monthly_word_limit }}</strong> Monthly Word Limit</span></li>
                <li><em class="icon ni ni-check text-success"></em> <span><strong>{{ $planItem->templates }}+</strong> Templates</span></li>
                <li><em class="icon ni ni-check text-success"></em> <span>6+ Languages</span></li>
                <li><em class="icon ni ni-check text-success"></em> <span>Advance Editor Tool</span></li>
                <li><em class="icon ni ni-check text-success"></em> <span>Regular Technical Support</span></li>
                <li><em class="icon ni ni-check text-success"></em> <span>Unlimited Logins</span></li>
                <li><em class="icon ni ni-check text-success"></em> <span>Newest Features</span></li>
            </ul>
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
            <div class="col-xl-8">
                <h6 class="overline-title text-primary">FAQ'S</h6>
                <h2 class="title">Frequently Asked Questions</h2>
            </div>
        </div>
    </div><!-- .section-head -->
    @php
        $questions = App\Models\Questions::orderBy('id','asc')->get();
    @endphp
    
    
    <div class="section-content">
        <div class="row g-gs justify-content-center">
            <div class="col-xl-9 col-xxl-8">
                <div class="accordion accordion-flush accordion-plus-minus accordion-icon-accent" id="faq-1">
                    
        @foreach ($questions as $index => $question) 
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#faq-1-{{ $index + 1 }}"> {{ $question->title }} </button>
        </h2>
        <div id="faq-1-{{ $index + 1 }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : ''}} " data-bs-parent="#faq-1">
            <div class="accordion-body"> {{ $question->description }}</div>
        </div>
    </div><!-- .accordion-item -->
     @endforeach     

                   
                </div><!-- .accordion -->
            </div><!-- .col -->
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