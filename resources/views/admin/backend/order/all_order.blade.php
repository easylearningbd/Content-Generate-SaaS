@extends('admin.dashboard')
@section('admin') 
<div class="nk-content-inner">
<div class="nk-content-body">
    
    <div class="nk-block-head nk-page-head">
        <div class="nk-block-head-between flex-wrap gap g-2">
            <div class="nk-block-head-content">
                <h2 class="display-6">All Orders </h2>
                
            </div>
            <div class="nk-block-head-content">
                <ul class="nk-block-tools"> 
                </ul>
            </div>
        </div>
    </div><!-- .nk-page-head -->


<div class="d-flex align-items-center justify-content-between border-bottom border-light mt-5 mb-4 pb-2">
    <h5>All Orders </h5>
</div>
<div class="card">
    <table class="table table-middle mb-0">
        <thead class="table-light">
            <tr>
                <th class="tb-col">
                    <div class="fs-13px text-base">Sl</div>
                </th>
                <th class="tb-col tb-col-md">
                    <div class="fs-13px text-base">User</div>
                </th>
                <th class="tb-col tb-col-sm">
                    <div class="fs-13px text-base">Plan</div>
                </th>
                <th class="tb-col tb-col-sm">
                    <div class="fs-13px text-base">Date</div>
                </th>
                 <th class="tb-col tb-col-sm">
                    <div class="fs-13px text-base">Price</div>
                </th>
                <th class="tb-col tb-col-sm">
                    <div class="fs-13px text-base">Status</div>
                </th>
                 <th class="tb-col tb-col-sm">
                    <div class="fs-13px text-base">Action</div>
                </th>
                
            </tr>
        </thead>
        <tbody>
        @foreach ($allData as $key=> $item)  
        <tr>
            <td class="tb-col">
                <div class="caption-text"> {{ $key+1 }} <div class="d-sm-none dot bg-success"></div>
                </div>
            </td>
            <td class="tb-col tb-col-md">
                <div class="fs-6 text-light d-inline-flex flex-wrap gap gx-2"> {{ $item->user->name }} </div>
            </td>
            <td class="tb-col tb-col-sm">
                <div class="fs-6 text-light">{{ $item->plan->name }} </div>
            </td>
            <td class="tb-col tb-col-sm">
                <div class="badge text-bg-success-soft rounded-pill px-2 py-1 fs-6 lh-sm"> {{ \Carbon\Carbon::parse($item->payment_date)->format('Y-m-d')  }}</div>
            </td>

            <td class="tb-col tb-col-sm">
                <div class="badge text-bg-success-soft rounded-pill px-2 py-1 fs-6 lh-sm">${{ $item->total }}</div>
            </td>

            <td class="tb-col tb-col-sm">
                <div class="badge text-bg-success-soft rounded-pill px-2 py-1 fs-6 lh-sm">{{ $item->status }}</div>
            </td>

            <td class="tb-col tb-col-sm">
            @if ($item->status === 'Pending')
             <a href="{{ route('edit.plans',$item->id) }}" class="btn btn-success btn-sm">Update</a>  
             @else
             <span class="badge text-bg-secondary-soft px-2 py-1 fs-6 lh-sm">No Action Needed</span>
            @endif
       
          
            </td>
            
        </tr>
       @endforeach
          
        </tbody>
    </table>
</div>









    </div>
  </div> 

@endsection