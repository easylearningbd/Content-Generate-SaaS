@extends('admin.dashboard')
@section('admin') 




<div class="nk-content-inner">
<div class="nk-content-body">
    <div class="nk-block-head nk-page-head">
        <div class="nk-block-head-between">
            <div class="nk-block-head-content">
                <h2 class="display-6">All Generate Imaeg Page   </h2>
                 
            </div>
        </div>
    </div><!-- .nk-page-head -->


<div class="card shadown-none">
<div class="card-body">
    <div class="row row-cols-1 row-cols-md-2 g-4">
       
        @foreach ($genimage as $img) 
        <div class="col">
            <div class="card">
                <img src="{{ asset($img->image_path) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Prompt Code</h5>
                    <p class="card-text">{{ $img->prompt }}</p>
                </div>
            </div>
        </div><!-- .col -->
         @endforeach


         
    </div><!-- .row -->
</div><!-- .card-body -->
</div>


 
</div>
</div> 

 

@endsection