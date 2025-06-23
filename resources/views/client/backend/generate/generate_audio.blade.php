@extends('client.client_dashboard')
@section('client') 

<div class="nk-content-inner">
<div class="nk-content-body">
    <div class="nk-block-head nk-page-head">
        <div class="nk-block-head-between">
            <div class="nk-block-head-content">
                <h2 class="display-6">Generate Audio Page   </h2>
                 
            </div>
        </div>
    </div><!-- .nk-page-head -->

 <form id="tts-form">
    <div class="col-md-12">
        <div class="form-group">
            <label for="text" class="form-label">Generate Audio </label>
            <div class="form-control-wrap">
        <textarea class="form-control" name="text" id="text" placeholder="Enter your Audio idea" ></textarea>
            </div> 
        </div> 
    </div>

    <div class="col-lg-12 mt-3">
        <button type="submit" class="btn btn-primary" id="ttsBtn">Generate Audio & Save </button> 
    </div> 

    <div id="audio-loader" class="mt-3" style="display: none">
        <p class="text-info">Generating Audio, Please Wait....</p>
    </div> 

 </form>

 <div id="audio-result" class="mt-3"></div> 


</div>
</div> 


<script>
    document.getElementById("tts-form").addEventListener("submit", async function (e) {
        e.preventDefault();
    
    const text = document.getElementById("text").value;
    const loader = document.getElementById("audio-loader");
    const result = document.getElementById("audio-result");
    const generateBtn = document.getElementById("ttsBtn");

    loader.style.display = "block";
    result.innerHTML = "";
    generateBtn.disabled = true;

    try {
        const res = await fetch("/generate-audio",{
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({text})
        });
        
        const data = await res.json();

        loader.style.display = "none";
        generateBtn.disabled = false;

        if (data.status === "success") {
            result.innerHTML = `
            <p>${data.message}</p>
            <audio controls>
            <source src="${data.audio_url}" type="audio/mpeg" >
            </audio>
            <a href="${data.audio_url}" download class="btn btn-sm btn-success mt-2"> Download MP3 </a>
           
            `;            
        } else {
            alert("Something went wrong");
        }
        
    } catch (error) {
        alert("Failed to Generate Audio ");
    }  
        
    });
</script>

@endsection