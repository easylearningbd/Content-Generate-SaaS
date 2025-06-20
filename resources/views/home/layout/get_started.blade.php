<section class="section section-bottom-0 has-shape">
<div class="nk-shape bg-shape-blur-a mt-8 start-50 top-0 translate-middle-x"></div>

@php
    $heading = App\Models\Heading::find(1);
@endphp

<div class="container">
    <div class="section-head">
        <div class="row justify-content-center text-center">
            <div class="col-lg-9 col-xl-8 col-xxl-7">
                <h6 class="overline-title text-primary">Get started for free</h6> 

    <h2 class="title editable-title" contenteditable={{ auth()->check() && auth()->user()->role === 'admin' ? 'true' : 'false'  }} data-id="{{ $heading->id }}" > {{ $heading->title }}</h2>

    <p class="lead editable-description" contenteditable={{ auth()->check() && auth()->user()->role === 'admin' ? 'true' : 'false'  }} data-id="{{ $heading->id }}" >{{ $heading->description }}</p>
            
            
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