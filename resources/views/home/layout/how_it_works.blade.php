<section class="section has-mask">
<div class="nk-mask bg-pattern-dot bg-blend-around mt-10p mb-3"></div>
<div class="container">
    <div class="section-head">
        <div class="row justify-content-center text-center">
            <div class="col-lg-9 col-xl-8 col-xxl-7">
                <h6 class="overline-title text-primary">How it works</h6>
      @php
    $heading = App\Models\Heading::find(2);
    @endphp   

   <h2 class="title editable-title" contenteditable={{ auth()->check() && auth()->user()->role === 'admin' ? 'true' : 'false'  }} data-id="{{ $heading->id }}" > {{ $heading->title }}</h2>

    <p class="lead editable-description" contenteditable={{ auth()->check() && auth()->user()->role === 'admin' ? 'true' : 'false'  }} data-id="{{ $heading->id }}" >{{ $heading->description }}</p>

            </div>
        </div>
    </div><!-- .section-head -->
    <div class="section-content">
        <div class="row g-gs">
            <div class="col-lg-4">
                <div class="feature feature-inline">
                    <div class="feature-text me-auto">
                        <h4 class="title">Select writing template</h4>
                        <p>Simply choose a template from available list to write content for blog posts, landing page, website content etc. </p>
                    </div>
                    <div class="feature-decoration flex-shrink-0 ms-4">
                        <img src="{{ asset('frontend/images/number/1.png') }}" alt="">
                    </div>
                </div>
            </div><!-- .col -->
            <div class="col-lg-4">
                <div class="feature feature-inline">
                    <div class="feature-text me-auto">
                        <h4 class="title">Describe your topic</h4>
                        <p>Provide our AI content writer with few sentences on what you want to write, and it will start writing for you. </p>
                    </div>
                    <div class="feature-decoration flex-shrink-0 ms-4">
                        <img src="{{ asset('frontend/images/number/2.png') }}" alt="">
                    </div>
                </div>
            </div><!-- .col -->
            <div class="col-lg-4">
                <div class="feature feature-inline">
                    <div class="feature-text me-auto">
                        <h4 class="title">Generate quality content</h4>
                        <p>Our powerful AI tools will generate content in few second, then you can export it to wherever you need.</p>
                    </div>
                    <div class="feature-decoration flex-shrink-0 ms-4">
                        <img src="{{ asset('frontend/images/number/3.png') }}" alt="">
                    </div>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .section-content -->
    <div class="section-actions text-center">
        <ul class="btn-list btn-list-inline gx-gs gy-3">
            <li><a href="#" class="btn btn-primary btn-lg"><span>Start free trial today</span></a></li>
            <li><a href="#" class="btn btn-primary btn-soft btn-lg"><em class="icon ni ni-play"></em><span>See action in video</span></a></li>
        </ul>
    </div><!-- .section-actions -->
    <div class="section-content">
        <div class="row gx-5 gy-6 align-items-center">
            <div class="col-lg-6 col-xl-6">
                <div class="block-gfx pe-xl-5 pe-lg-3">
                    <img class="w-100 rounded-4" src="{{ asset('frontend/images/gfx/feature/a.jpg') }}" alt="">
                </div>
            </div><!-- .col -->
            <div class="col-lg-6 col-xl-6">
                <div class="block-text">
                    <h2 class="title">AI Generate content in seconds</h2>
                    <p>Generate copy that converts for business bios, facebook ads, product descriptions, emails, landing pages, social ads, and more.</p>
                    <ul class="list gy-3">
                        <li><em class="icon ni ni-minus text-primary"></em><span>Create article that are complete in less than 15 seconds.</span></li>
                        <li><em class="icon ni ni-minus text-primary"></em><span>Save hundreds of hours with our AI article generator.</span></li>
                        <li><em class="icon ni ni-minus text-primary"></em><span>Improve your copy with the article rewriter.</span></li>
                    </ul>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .section-content -->
</div><!-- .container -->
</section><!-- .section -->

{{-- CSRF Token  --}}
  <meta name="csrf-token" content="{{ csrf_token() }}" >

  <script>
   document.addEventListener("DOMContentLoaded", function(){
     
     function saveChanges(element) {
       let appId = element.dataset.id;
       let field = element.classList.contains("editable-title") ? "title" : "description";
       let newValue = element.innerText.trim();

       fetch(`/update-started/${appId}`,{
         method: "POST",
         headers: {
           "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),"Content-Type": "application/json"
         },
         body: JSON.stringify({ [field]:newValue })
       })
       .then(response => response.json())
       .then(data => {
         if(data.success) {
           console.log(`${field} updated successfully`);
         }
       })
       .catch(error => console.error("Error:", error)); 
     }

     // Auto save on Enter Key
     document.addEventListener("keydown", function(e){
       if (e.key === "Enter") {
         e.preventDefault();
         saveChanges(e.target);
       }
     });

     // Auto save on losing foucs
     document.querySelectorAll(".editable-title, .editable-description").forEach(el => {
       el.addEventListener("blur", function() {
         saveChanges(el);
       });
     }); 
     
     /// IMAGE UPLOADED FUNCTION START
  
   
   });
  </script>