@extends('admin.dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style>
    .nk-editor {
        border: 1px solid #dee2e6;
        border-radius: 4px;
    }
</style>

<!-- Include Quill CSS -->
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">

<div class="nk-content-inner">
<div class="nk-content-body">
    
    <div class="nk-block-head nk-page-head">
        <div class="nk-block-head-between">
            <div class="nk-block-head-content">
                <h2 class="display-6"> Edit Document   </h2> 
            </div>
        </div>
    </div><!-- .nk-page-head -->

    <div class="card shadow-none">
        <div class="card-body">
            <div class="row">
     
 {{-- Right Sidebar  --}}
    <div class="col-md-12">
 <form action="{{ route('admin.update.document',$document->id) }}" method="post" id="editDocumentForm" enctype="multipart/form-data">
    @csrf  

    <input type="hidden" name="output" id="editor-output">

<div class="nk-editor"> 
<div class="nk-editor-header">
    <div class="nk-editor-title">
        <h4 class="me-3 mb-0 line-clamp-1">
            {{ json_decode($document->input,true)['Article_Title'] }}
        </h4> 
    </div>

    <div class="nk-editor-tools d-none d-xl-flex">
        <ul class="d-inline-flex gap gx-3">
            <li>
                <button type="submit" class="btn btn-md btn-primary rounded-pill">Save Changes</button>
            </li> 
        </ul> 
    </div> 
</div>
<div class="nk-editor-main"> 
    <div class="nk-editor-body">
        <div class="wide-md h-100"> 
            <div id="editor-v1">
                 <!-- Quill editor will be render in here  -->
            </div>
                 <!-- .js-editor -->
        </div>
    </div><!-- .nk-editor-body -->
</div><!-- .nk-editor-main -->
</div>
 
 </form>      
    </div>
  {{-- End Right Sidebar  --}} 
            </div> 
        </div> 
    </div> 
</div>
</div> 

<!-- Include Quill JS -->
<script src="https://cdn.quilljs.com/1.3.7/quill.js"></script>

<script>
    // Initialize Quill editor with error handling
    let quill;
    try {
        quill = new Quill('#editor-v1', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'direction': 'rtl' }],
                    [{ 'size': ['small', false, 'large', 'huge'] }],
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    [{ 'color': [] }, { 'background': [] }],
                    ['link', 'image', 'video'],
                    ['clean']
                ]
            }
        });
        console.log('Quill initialized successfully');
    } catch (error) {
        console.error('Quill initialization failed:', error);
    }

    // Set initial content and handle events
    document.addEventListener('DOMContentLoaded', function() {
        if (!quill) {
            console.error('Quill not initialized');
            return;
        }

        const initialContent = `{!! $document->output !!}`; // Raw HTML
        console.log('Initial Content:', initialContent);
        if (initialContent) {
            quill.root.innerHTML = initialContent; // Set raw HTML
        } else {
            console.warn('No initial content found');
        }

        // Sync editor content with hidden input on change
        quill.on('text-change', function(delta, oldDelta, source) {
            const content = quill.root.innerHTML.trim();
            const outputField = document.getElementById('editor-output');
            if (outputField) {
                outputField.value = content;
                console.log('Synced Output:', content);
            } else {
                console.error('Output Field not found');
            }
        });

        // Sync content before form submission
        const form = document.getElementById('editDocumentForm');
        if (form) {
            form.addEventListener('submit', function(e) {
                const content = quill.root.innerHTML.trim();
                const outputField = document.getElementById('editor-output');
                if (outputField) {
                    outputField.value = content;
                    console.log('Form Submission - Output Value:', content);
                } else {
                    console.error('Output Field not found on submit');
                }
            });
        } else {
            console.error('Form not found');
        }
    });
</script>
 
@endsection