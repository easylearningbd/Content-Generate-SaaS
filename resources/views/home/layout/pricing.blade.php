<section class="section section-bottom-0 section-top-0">
<div class="container">
    <div class="section-head">
        <div class="row justify-content-center text-center">
            <div class="col-lg-9 col-xl-7 col-xxl-6">
                <h6 class="overline-title text-primary">Pricing</h6>
 @php
    $heading = App\Models\Heading::find(3);
@endphp
   
   <h2 class="title editable-title" contenteditable={{ auth()->check() && auth()->user()->role === 'admin' ? 'true' : 'false'  }} data-id="{{ $heading->id }}" > {{ $heading->title }}</h2>

    <p class="lead px-lg-10 px-xxl-9 editable-description" contenteditable={{ auth()->check() && auth()->user()->role === 'admin' ? 'true' : 'false'  }} data-id="{{ $heading->id }}" >{{ $heading->description }}</p>

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