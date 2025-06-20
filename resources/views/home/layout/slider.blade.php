@php
    $slider = App\Models\Slider::find(1);
@endphp
 
<div class="nk-hero pt-xl-5">
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-lg-11 col-xl-9 col-xxl-8">
            <div class="nk-hero-content py-5 py-lg-6">
               
                <h1 class="title mb-3 mb-lg-4 editable-title" contenteditable={{ auth()->check() && auth()->user()->role === 'admin' ? 'true' : 'false'  }} data-id="{{ $slider->id }}" > {{ $slider->title }}</h1>

                <p class="lead px-md-8 px-lg-6 mb-4 mb-lg-5 editable-description" contenteditable={{ auth()->check() && auth()->user()->role === 'admin' ? 'true' : 'false'  }} data-id="{{ $slider->id }}" >{{ $slider->description }}</p>

                <ul class="btn-list btn-list-inline">
                    <li><a href="{{ $slider->link }}" class="btn btn-secondary btn-lg"><span>Start writing for free</span></a></li>
                </ul>
                <p class="sub-text mt-2">No credit card required</p>
            </div>
            <div class="nk-hero-gfx">
                <img class="w-100 rounded-top-4" id="appImage" src="{{ asset($slider->image) }}" alt="" style="cursor: pointer">
                @if (auth()->check())
                    <input type="file" id="uploadImage" style="display: none">
                @endif
            </div>
        </div>
    </div>
</div>
</div><!-- .nk-hero -->


 {{-- CSRF Token  --}}
  <meta name="csrf-token" content="{{ csrf_token() }}" >

  <script>
   document.addEventListener("DOMContentLoaded", function(){
     
     function saveChanges(element) {
       let appId = element.dataset.id;
       let field = element.classList.contains("editable-title") ? "title" : "description";
       let newValue = element.innerText.trim();

       fetch(`/update-slider/${appId}`,{
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
     let imageElement = document.getElementById("appImage");
     let uploadInput = document.getElementById("uploadImage");

     imageElement.addEventListener("click", function(){
      @if (auth()->check())
      uploadInput.click();        
      @endif
     });

     uploadInput.addEventListener("change", function(){
      let file = this.files[0];
      if (!file) return;

      let formData = new FormData();
      formData.append("image",file);
      formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute("content"));

      fetch("/update-slider-image/1",{
        method: "POST",
        body: formData
      })
      .then(response => response.json())
      .then(data => {
          if(data.success) {
            imageElement.src = data.image_url;
            console.log(`Image updated successfully`);
          }
        })
        .catch(error => console.error("Error:", error)); 

     }); 
   
   });
  </script>