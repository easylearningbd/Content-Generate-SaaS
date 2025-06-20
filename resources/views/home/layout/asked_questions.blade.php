<section class="section section-bottom-0">
<div class="container">
    <div class="section-head">
        <div class="row justify-content-center text-center">
            <div class="col-xl-8">
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