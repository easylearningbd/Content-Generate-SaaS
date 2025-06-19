@extends('admin.dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="nk-content-inner">
<div class="nk-content-body">
    <div class="nk-block-head nk-page-head">
        <div class="nk-block-head-between">
            <div class="nk-block-head-content">
                <h2 class="display-6">Update Slider  </h2>
                 
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
     
     <form action="{{ route('store.plans') }}" method="post" enctype="multipart/form-data">
        @csrf   

     <div class="row g-3 gx-gs">
                    
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInputText1" class="form-label">Slider Title</label>
            <div class="form-control-wrap">
                <input type="text" name="title" class="form-control" value="{{ $slider->title }}"  >
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInputText1" class="form-label">Description </label>
            <div class="form-control-wrap">
                <input type="text" name="description" class="form-control" value="{{ $slider->description }}"   >
            </div>
        </div>
    </div>

     <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInputText1" class="form-label">Link </label>
            <div class="form-control-wrap">
                <input type="text" name="link" class="form-control" value="{{ $slider->link }}"  >
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInputText1" class="form-label">Slider Image </label>
            <div class="form-control-wrap">
                <input type="file" name="image" class="form-control"  >
            </div>
        </div>
    </div>

     <div class="col-md-6">
        <div class="form-group"> 
            <div class="form-control-wrap">
              <img  src="{{ asset($slider->image)   }}" class="rounded-circle avatar-xl img-thumbnail float-start" style="width: 100px; height:100px;">
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