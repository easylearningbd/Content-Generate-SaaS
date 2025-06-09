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
                <h2 class="display-6"> asdaaa   </h2> 
            </div>
        </div>
    </div><!-- .nk-page-head -->

    <div class="card shadow-none">
        <div class="card-body">
            <div class="row">
     
 {{-- Right Sidebar  --}}
    <div class="col-md-12">


<div class="nk-editor"> 
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

 
@endsection