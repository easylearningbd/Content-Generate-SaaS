@extends('client.client_dashboard')
@section('client') 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style>
    .nk-editor {
        border: 1px solid #dee2e6;
        border-radius: 4px;
    }
</style>

<div class="nk-content-inner">
<div class="nk-content-body">
    
    <div class="nk-block-head nk-page-head">
        <div class="nk-block-head-between">
            <div class="nk-block-head-content">
                <h2 class="display-6"> {{ $template->title  }}   </h2>
                 <p> {{ $template->description  }}</p>
            </div>
        </div>
    </div><!-- .nk-page-head -->

    <div class="card shadow-none">
        <div class="card-body">
            <div class="row">
                {{-- Left Sidebar  --}}
            <div class="col-md-4">
                <div class="mb-3">
                    <p><strong>Your Blanace Is {{ $user->current_word_usage - $user->words_used }} Words Left </strong></p> 
                </div>

 <form id="generateForm" action="{{ route('user.content.generate',$template->id) }}" method="post" enctype="multipart/form-data">
     @csrf  

    <div class="form-group">
        <label for="language" class="form-label">Language  </label>
            <div class="form-control-wrap">
     <select name="language" class="form-select" id="language" > 
        <option value="English (USA)">English (USA)</option>
        <option value="Bangla (Bangladesh)">Bangla (Bangladesh)</option>
        <option value="Hindi (India)">Hindi (India)</option>
        <option value="French (France)">French (France)</option>
        <option value="Turkish (Turkey)">Turkish (Turkey)</option> 
    </select>
            </div>
    </div>  
    
    @foreach ($template->inputFields as $field)
    <div class="form-group mt-3">
        <label for="{{ $field->title }}">{{ $field->title }}</label>
       
        @if ($field->type === 'text')
        <input type="text" name="{{ str_replace(' ', '_',$field->title) }}" id="{{ $field->title }}" class="form-control" required>
        
        @elseif ($field->type === 'textarea')

        <textarea name="{{ str_replace(' ', '_',$field->title) }}" id="{{ $field->title }}"  rows="5" class="form-control" required></textarea> 
        @endif
        <small>{{ $field->description }}</small>

    </div>
        
    @endforeach

    <div class="form-group mt-3">
        <label for="ai_model" class="form-label">AI Model  </label>
            <div class="form-control-wrap">
     <select name="ai_model" class="form-select" id="ai_model" > 
        <option value="gpt-4">OpenAI | GPT 4</option>
        <option value="gpt-3.5-turbo">OpenAI | GPT-3.5-turbo</option> 
    </select>
            </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="form-group">
            <label for="result_length" class="form-label">Extimated Result Length </label>
            <div class="form-control-wrap">
                <input type="number" name="result_length" class="form-control" id="result_length" value="200" min="50" max="1000" required >
            </div>
        </div> 
        </div> 
    </div>
    
<button type="submit" class="btn btn-primary mt-3 ">Generate</button> 
     

 </form>
   </div>
     {{-- End Left Sidebar  --}}


 {{-- Right Sidebar  --}}
    <div class="col-md-8">
<div class="nk-editor">
<div class="nk-editor-header">
    <div class="nk-editor-title">
        <h4 class="me-3 mb-0 line-clamp-1">{{ $template->title  }}</h4>
        <ul class="d-inline-flex align-item-center">
             
            <li>
                <button class="btn btn-sm btn-icon btn-zoom">
                    <em class="icon ni ni-star"></em>
                </button>
            </li>
           
        </ul>
    </div>
    <div class="nk-editor-tools d-none d-xl-flex">
        <ul class="d-inline-flex gap gx-3 gx-lg-4 pe-4 pe-lg-5">
            <li>
 <span class="sub-text text-nowrap">Words <span class="text-dark" id="word-count">0</span></span>
            </li>
            <li>
                <span class="sub-text text-nowrap">Characters <span class="text-dark" id="char-count" >0</span></span>
            </li>
        </ul>
        <ul class="d-inline-flex gap gx-3">
            <li>
                <div class="dropdown">
                    <button class="btn btn-md btn-light rounded-pill" type="button" data-bs-toggle="dropdown">
                        <span>Export</span>
                        <em class="icon ni ni-chevron-down"></em>
                    </button> 
    <ul class="dropdown-menu">
        <li>
      <a href="#" class="dropdown-item" id="copy-text"> Copy Text </a>
        </li>
        <li>
       <a href="#" class="dropdown-item"> Text File </a>
        </li>
    </ul>          
        </div>
            </li>
            <li>
                <button class="btn btn-md btn-primary rounded-pill" type="button"> Save </button>
            </li>
        </ul>
    </div>
</div>
<div class="nk-editor-main">
     
    <div class="nk-editor-body">
        <div class="wide-md h-100">
            <div class="js-editor nk-editor-style-clean nk-editor-full" data-menubar="false" >
                <div id="editor-v1">  </div>
                </div> <!-- .js-editor -->
        </div>
    </div><!-- .nk-editor-body -->
</div><!-- .nk-editor-main -->
</div>


         
    </div>
  {{-- End Right Sidebar  --}}

            </div> 
        </div> 
    </div>

 

</div>
</div> 

<script>
// Handle form submission with AJAX
document.getElementById('generateForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent default form submission

    const form = this;
    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log('Response Data:', data); // Debug
        if (data.success) {
            const editor = document.getElementById('editor-v1');
            if (editor) {
                const formattedContent = formatContent(data.output, formData);
                editor.innerHTML = formattedContent; // Set formatted HTML
                updateCounts(); // Update word and character count
            } else {
                console.error('Editor element not found');
            }
        } else {
            alert(data.message || 'Failed to generate content.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while generating content.');
    });
});

// Function to update word and character count
function updateCounts() {
    const editor = document.getElementById('editor-v1');
    if (editor) {
        const content = editor.textContent || editor.innerText;
        const words = content.trim() === '' ? 0 : content.trim().split(/\s+/).length;
        const characters = content.length;
        document.getElementById('word-count').textContent = words;
        document.getElementById('char-count').textContent = characters;
    }
}  

// Function to format content professionally
function formatContent(output, formData) {
    let title = 'Generated Content';
    for (let [key, value] of formData.entries()) {
        if (key === 'Article_Title' || key === 'Topic') {
            title = value;
            break;
        }
    }

    const lines = output.split('\n').filter(line => line.trim() !== '');

    let html = `<h2>${title}</h2>`; 

    const contentLines = lines.slice(3);
    for (let i = 0; i < contentLines.length; i++) {
        html += `<p>${contentLines[i]}</p>`;
        if ((i + 1) % 3 === 0 && i + 1 < contentLines.length) {
            html += '<hr>';
        }
    }

    return html;
}
 

// Function to create and trigger a file download
function downloadFile(content, fileName, mimeType) {
    const blob = new Blob([content], { type: mimeType });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = fileName;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
}

// Handle export dropdown options
document.querySelectorAll('.dropdown-menu .dropdown-item').forEach(item => {
    item.addEventListener('click', function(e) {
        e.preventDefault();
        const editor = document.getElementById('editor-v1');
        if (!editor) {
            alert('Editor content not found.');
            return;
        }

        const action = this.id || this.textContent.trim();
        const templateTitle = document.querySelector('.nk-editor-title h4').textContent.trim() || 'Generated_Content';
        const timestamp = new Date().toISOString().slice(0, 10).replace(/-/g, '');
        const fileNameBase = `${templateTitle}_${timestamp}`;

        if (action === 'copy-text') {
            // Copy Text (already implemented)
            const content = editor.textContent || editor.innerText;
            navigator.clipboard.writeText(content).then(() => {
                toastr.success('Text copied to clipboard!');
            }).catch(err => {
                alert('Failed to copy text: ' + err);
            });
        } else if (action === 'Text File') {
            // Export as Text File
            const content = editor.textContent || editor.innerText;
            downloadFile(content, `${fileNameBase}.txt`, 'text/plain');
            toastr.success('Text file downloaded successfully!');
        }  
    });
});
 
</script>

@endsection