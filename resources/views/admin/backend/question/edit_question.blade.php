@extends('admin.dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="nk-content-inner">
<div class="nk-content-body">
    <div class="nk-block-head nk-page-head">
        <div class="nk-block-head-between">
            <div class="nk-block-head-content">
                <h2 class="display-6">Edit Question  </h2>
                 
            </div>
        </div>
    </div><!-- .nk-page-head -->
    <div class="nk-block">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-head-content">
               
            </div>
        </div><!-- .nk-block-head -->
        <div class="card shadown-none">
            <div class="card-body">
     
     <form action="{{ route('update.questions') }}" method="post" enctype="multipart/form-data">
        @csrf 
        
    <input type="hidden" name="id" value="{{ $question->id }}">

     <div class="row g-3 gx-gs">
                    
    <div class="col-md-8">
        <div class="form-group">
            <label for="exampleFormControlInputText1" class="form-label">Question Title </label>
            <div class="form-control-wrap">
                <input type="text" name="title" class="form-control" value="{{ $question->title }}"  >
            </div>
        </div>
    </div>


    <div class="col-md-8">
        <div class="form-group">
            <label for="exampleFormControlInputText1" class="form-label">Question Description</label>
            <div class="form-control-wrap">
                <input type="text" name="description" class="form-control" value="{{ $question->description }}" >
            </div>
        </div>
    </div>
 
               
    <div class="col-lg-12 col-xl-12">
<button type="submit" class="btn btn-secondary">Save Changes</button> 
    </div>
            
                    
    </div>
    </form> 



            </div><!-- .card-body -->
        </div><!-- .card -->
    </div><!-- .nk-block -->
     


</div>
</div>


 


@endsection