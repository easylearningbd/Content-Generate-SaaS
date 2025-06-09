@extends('admin.dashboard')
@section('admin')
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
                <h2 class="display-6"> Edit Document   </h2> 
            </div>
        </div>
    </div><!-- .nk-page-head -->

    <div class="card shadow-none">
        <div class="card-body">
            <div class="row">
     
 {{-- Right Sidebar  --}}
    <div class="col-md-12">
 <form action="" method="post" id="editDocumentForm" enctype="multipart/form-data">
    @csrf  
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

 
@endsection