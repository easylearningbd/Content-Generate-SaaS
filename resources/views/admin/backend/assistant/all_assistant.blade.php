@extends('admin.dashboard')
@section('admin') 

<div class="nk-content-inner">
<div class="nk-content-body">
    <div class="nk-block-head nk-page-head">
        <div class="nk-block-head-between flex-wrap gap g-2">
            <div class="nk-block-head-content">
                <h2 class="display-6">Assistant Library</h2>
            </div>
            <div class="nk-block-head-content">
                <div class="d-flex gap gx-4">
                    <div class="">
    <ul class="d-flex gap gx-2">
            <li>
            <a href="{{ route('add.assistants') }}" class="btn btn-primary">Add Assistant </a>
        </li>
        <li>
            <a href="templates-list.html" class="btn btn-md btn-icon btn-outline-light"><em class="icon ni ni-view-list-wd"></em></a>
        </li>
        <li>
            <a href="templates.html" class="btn btn-md btn-icon btn-primary btn-soft"><em class="icon ni ni-grid-fill"></em></a>
        </li>
    </ul>
                    </div>
                    <div class="">
                        <div class="form-control-wrap">
                            <div class="form-control-icon start md text-light">
                                <em class="icon ni ni-search"></em>
                            </div>
                            <input type="text" class="form-control form-control-md" placeholder="Search Template">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .nk-page-head -->
    <div class="nk-block">
        
        <div class="row g-gs filter-container" data-animation="true">
           
    @foreach ($assistant as $item)  
    <div class="col-sm-6 col-xxl-3 filter-item blog-content" data-category="blog-content">
        <div class="card card-full shadow-none">
            <div class="card-body">
                <a href="{{ route('chat-assistants.chat',$item->id) }}">
                <div class="  text-primary  bg-opacity-20 mb-3">
                     <img src="{{ (!empty($item->avatar)) ? url('upload/avatar/'.$item->avatar) : url('upload/no_image.jpg') }}" class="rounded-circle avatar-xl " style="width: 120px; height:100px;">
                </div> 

                <h5 class="fs-4 fw-medium">{{ $item->name }}</h5>
                <p class="small text-light line-clamp-2">{{ $item->role_description }}</p>
                </a>

            </div>
        </div><!-- .card -->
    </div><!-- .col -->
  @endforeach      
 

            
        </div><!-- .row -->
    </div><!-- .nk-block -->
</div>
</div>









@endsection