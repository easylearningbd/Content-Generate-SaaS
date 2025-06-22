@extends('admin.dashboard')
@section('admin') 

<div class="nk-content-inner">
<div class="nk-content-body">
    <div class="nk-block-head nk-page-head">
        <div class="nk-block-head-between">
            <div class="nk-block-head-content">
                <h2 class="display-6">Generate Imaeg Page   </h2>
                 
            </div>
        </div>
    </div><!-- .nk-page-head -->

 <form id="image-form">
    <div class="col-md-12">
        <div class="form-group">
            <label for="prompt" class="form-label">Generate Image </label>
            <div class="form-control-wrap">
        <textarea class="form-control" name="prompt" id="prompt" placeholder="Enter your image idea" ></textarea>
            </div> 
        </div> 
    </div>

    <div class="col-lg-12 mt-3">
        <button type="submit" class="btn btn-primary" id="generateBtn">Generate & Save </button> 
    </div> 

    <div id="loader" class="mt-3" style="display: none">
        <p class="text-info">Generating image, Please Wait....</p>
    </div> 

 </form>

 <div id="image-result" class="mt-3"></div> 


</div>
</div> 


<script>
    document.getElementById("image-form").addEventListener("submit", async function (e) {
        e.preventDefault();
    
    const prompt = document.getElementById("prompt").value;
    const loader = document.getElementById("loader");
    const imageResult = document.getElementById("image-result");
    const generateBtn = document.getElementById("generateBtn");

    loader.style.display = "block";
    imageResult.innerHTML = "";
    generateBtn.disabled = true;

    


        
    })
</script>

@endsection