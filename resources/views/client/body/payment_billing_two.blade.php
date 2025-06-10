@php
    use App\Models\Plan;
    use App\Models\User;
    
    $id = Auth::user()->id;
    $user = User::with('plan')->find($id);
    $userPlan = $user->plan;
    $allPlans = Plan::all();

    $wordsUsed = $user->words_used ?? 0;
    $wordLimit = $userPlan ? $userPlan->monthly_word_limit : 1000;
    $wordLeft = max(0, $wordLimit - $wordsUsed);
    $percentageUsed = $wordLimit > 0 ? min(100, ($wordsUsed / $wordLimit) * 100) : 0;

@endphp



<div class="tab-pane fade" id="payment-billing-2-tab-pane">
<div class="d-flex align-items-center justify-content-between border-bottom border-light mt-5 pb-1">
    <h5>Subscription</h5>
</div>
<div class="pt-4">
    <h3 class="fw-normal">{{ $userPlan ? $userPlan->name . ' Plan' : 'Basic Plan' }} 
        
        @if ($userPlan && $userPlan->price == 0)
            <span class="badge border border-light text-light rounded-pill ms-1">Free</span>
        @endif
        </h3>


    <div class="sub-text">{{ $wordsUsed }} words generation with access to {{ $userPlan ? $userPlan->templates : 0 }} templates.</div>
    <div class="progress progress-md bg-primary bg-opacity-10 mt-3">
        <div class="progress-bar bg-primary" data-progress="{{ round($percentageUsed, 2) }}%" style="width:{{ round($percentageUsed, 2) }}% "></div>
    </div>
    <div class="d-flex flex-wrap align-items-center mt-2">
        <div class="caption-text">{{ $wordsUsed }} <span class="text-light">of {{ $wordLimit }} words used.</span></div>
        <div class="sub-text text-dark">To increase your limit, check our <a href="#">Pricing &amp; Plans</a>.</div>
    </div>
</div>
<div class="d-flex align-items-center justify-content-between border-bottom border-light mt-5 pb-1">
    <h5>Our Available Plans</h5>
    <a class="link link-primary fw-normal" href="#">See All</a>
</div>
<div class="pt-4">
    <h3 class="fw-normal">Pricing Plans</h3>
    <div class="sub-text">Generate unlimited copy 10X faster with our cost effective plan to write blog posts, social media ads and many more.</div>
    <div class="pricing-toggle-wrap mt-4 mb-4">
        <button class="pricing-toggle-button active" data-target="monthly">Monthly</button>
        <button class="pricing-toggle-button" data-target="yearly">Yearly (Save 25%)</button>
    </div><!-- .pricing-toggle -->
</div>
<div class="row g-gs">
   
   @foreach ($allPlans as $plan) 
    <div class="col-md-6">
        <div class="pricing rounded pricing-featured bg-gradient-custom gradient-start-primary-light gradient-middle-primary-light gradient-end-blue-light gradient-angle-90">
            <div class="pricing-content">
                <h5 class="fw-normal text-dark">{{ $plan->name }}</h5>
                <h2 class="mb-3 d-inline-block text-gradient-custom gradient-start-primary-light gradient-middle-primary-light gradient-end-blue-light gradient-angle-90">{{ $plan->monthly_word_limit }} Words</h2>
                <div class="pricing-price-wrap">
                    <div class="pricing-price pricing-toggle-content monthly active">
                        <h3 class="display-1 mb-3 fw-semibold">${{ $plan->price }} <span class="caption-text text-light fw-normal"> / month</span></h3>
                    </div>
                    <div class="pricing-price pricing-toggle-content yearly">
                        <h3 class="display-1 mb-3 fw-semibold">${{ number_format($plan->price * 12 * 0.75, 2) }} <span class="caption-text text-light fw-normal"> / year</span></h3>
                    </div>
                </div>
    <div class="mb-2">
        <div class="pricing-toggle-content monthly active">
            <button class="btn {{ $plan->price > 0 ? 'btn-gradient' : 'btn-outline-light'}}  w-100">Upgrade Now</button>
        </div>
        <div class="pricing-toggle-content yearly">
            <button class="btn {{ $plan->price > 0 ? 'btn-gradient' : 'btn-outline-light'}}  w-100">Upgrade Now</button>
        </div>
        <div class="d-flex align-items-center justify-content-center text-center text-dark fs-12px lh-lg fst-italic mt-1">
            <svg width="13" height="13" viewBox="0 0 13 13" class="text-danger" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.5 2.375V10.625" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M2.9281 4.4375L10.0719 8.5625" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M2.9281 8.5625L10.0719 4.4375" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span class="ms-1">Cancel Anytime</span>
        </div>
    </div>
                <ul class="pricing-features">
                    <li><em class="icon text-primary ni ni-check-circle-fill"></em><span>{{ $plan->monthly_word_limit }} words generation</span></li>
                    <li><em class="icon text-primary ni ni-check-circle-fill"></em><span>Access to {{ $plan->templates }} templates  </span></li>
                    <li><em class="icon text-primary ni ni-check-circle-fill"></em><span>Select Multiple Language </span></li>
                    <li><em class="icon text-primary ni ni-check-circle-fill"></em><span>Multiple GPT Model Version </span></li>
                    <li><em class="icon text-primary ni ni-check-circle-fill"></em><span>Wordpress plugin integration</span></li>
                </ul>
            </div>
        </div>
    </div><!-- .col -->
 @endforeach

     
</div><!-- .row -->
</div><!-- .tab-pane -->