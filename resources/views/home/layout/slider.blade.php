@php
    $slider = App\Models\Slider::find(1);
@endphp

<div class="nk-hero pt-xl-5">
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-lg-11 col-xl-9 col-xxl-8">
            <div class="nk-hero-content py-5 py-lg-6">
                <h1 class="title mb-3 mb-lg-4"> {{ $slider->title }}</h1>
                <p class="lead px-md-8 px-lg-6 mb-4 mb-lg-5">{{ $slider->description }}</p>
                <ul class="btn-list btn-list-inline">
                    <li><a href="{{ $slider->link }}" class="btn btn-secondary btn-lg"><span>Start writing for free</span></a></li>
                </ul>
                <p class="sub-text mt-2">No credit card required</p>
            </div>
            <div class="nk-hero-gfx">
                <img class="w-100 rounded-top-4" src="{{ asset($slider->image) }}" alt="">
            </div>
        </div>
    </div>
</div>
</div><!-- .nk-hero -->