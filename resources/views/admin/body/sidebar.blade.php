<div class="nk-sidebar nk-sidebar-fixed" id="sidebar">
<div class="nk-compact-toggle">
<button class="btn btn-xs btn-outline-light btn-icon compact-toggle text-light bg-white rounded-3">
    <em class="icon off ni ni-chevron-left"></em>
    <em class="icon on ni ni-chevron-right"></em>
</button>
</div>
<div class="nk-sidebar-element nk-sidebar-head">
<div class="nk-sidebar-brand">
    <a href="index.html" class="logo-link">
        <div class="logo-wrap">
            <img class="logo-img logo-light" src="{{ asset('backend/images/logo.png') }}" srcset="{{ asset('backend/images/logo2x.png 2x') }}" alt="">
            <img class="logo-img logo-dark" src="{{ asset('backend/images/logo-dark.png') }}" srcset="{{ asset('backend/images/logo-dark2x.png 2x') }}" alt="">
            <img class="logo-img logo-icon" src="{{ asset('backend/images/logo-icon.png') }}" srcset="{{ asset('backend/images/logo-icon2x.png 2x') }}" alt="">
        </div>
    </a>
</div><!-- end nk-sidebar-brand -->
</div><!-- end nk-sidebar-element -->
<div class="nk-sidebar-element nk-sidebar-body">
<div class="nk-sidebar-content h-100" data-simplebar>
    <div class="nk-sidebar-menu">
        <ul class="nk-menu">
            <li class="nk-menu-item">
                <a href="index.html" class="nk-menu-link">
                    <span class="nk-menu-icon">
                        <em class="icon ni ni-dashboard-fill"></em>
                    </span>
                    <span class="nk-menu-text">Dashboard</span>
                </a>
            </li>
            <li class="nk-menu-item has-sub">
                <a href="#" class="nk-menu-link nk-menu-toggle">
                    <span class="nk-menu-icon">
                        <em class="icon ni ni-folder-list"></em>
                    </span>
                    <span class="nk-menu-text">Account</span>
                </a>
                <ul class="nk-menu-sub">
                    <li class="nk-menu-item">
                        <a href="{{ route('admin.profile') }}" class="nk-menu-link">
                            <span class="nk-menu-text">Profile</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('admin.change.password') }}" class="nk-menu-link">
                            <span class="nk-menu-text">Change Password</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nk-menu-item has-sub">
                <a href="#" class="nk-menu-link nk-menu-toggle">
                    <span class="nk-menu-icon">
                        <em class="icon ni ni-folder-list"></em>
                    </span>
                    <span class="nk-menu-text">Plans</span>
                </a>
                <ul class="nk-menu-sub">
                    <li class="nk-menu-item">
                        <a href="{{ route('all.plans') }}" class="nk-menu-link">
                            <span class="nk-menu-text">All Plans</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('add.plans') }}" class="nk-menu-link">
                            <span class="nk-menu-text">Add Plans</span>
                        </a>
                    </li>
                </ul>
            </li>
           
          
            
            <li class="nk-menu-item">
                <a href="{{ route('admin.template') }}" class="nk-menu-link">
                    <span class="nk-menu-icon">
                        <em class="icon ni ni-user"></em>
                    </span>
                    <span class="nk-menu-text">Template</span>
                </a>
            </li>

            <li class="nk-menu-item">
                <a href="{{ route('admin.document') }}" class="nk-menu-link">
                    <span class="nk-menu-icon">
                        <em class="icon ni ni-user"></em>
                    </span>
                    <span class="nk-menu-text">Document</span>
                </a>
            </li>

             <li class="nk-menu-item">
                <a href="{{ route('all.orders') }}" class="nk-menu-link">
                    <span class="nk-menu-icon">
                        <em class="icon ni ni-user"></em>
                    </span>
                    <span class="nk-menu-text">Orders</span>
                </a>
            </li>


            <li class="nk-menu-item">
                <a href="{{ route('admin.logout') }}" class="nk-menu-link">
                    <span class="nk-menu-icon">
                        <em class="icon ni ni-wallet"></em>
                    </span>
                    <span class="nk-menu-text">Logout</span>
                </a>
            </li>
          
            
            
             
        </ul>
    </div><!-- .nk-sidebar-menu -->
</div><!-- .nk-sidebar-content -->
</div><!-- .nk-sidebar-element -->
<div class="nk-sidebar-element nk-sidebar-footer">
<div class="nk-sidebar-footer-extended pt-3">
    <div class="border border-light rounded-3">
        {{-- <div class="px-3 py-2 bg-white border-bottom border-light rounded-top-3">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <h6 class="lead-text">Free Plan</h6>
                <a class="link link-primary" href="pricing-plans.html">
                    <em class="ni ni-spark-fill icon text-warning"></em>
                    <span>Upgrade</span>
                </a>
            </div>
            <div class="progress progress-md">
                <div class="progress-bar" data-progress="25%"></div>
            </div>
            <h6 class="lead-text mt-2">1,360 <span class="text-light">words left</span></h6>
        </div> --}}

    @php
        $id = Auth::user()->id;
        $profileData = App\Models\User::find($id);
    @endphp   
        <a class="d-flex px-3 py-2 bg-primary bg-opacity-10 rounded-bottom-3" href="profile.html">
            <div class="media-group">
                <div class="media media-sm media-middle media-circle text-bg-primary">
                    <img src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" />
                </div>
                <div class="media-text">
                    <h6 class="fs-6 mb-0"> {{ $profileData->name }}</h6>
                    <span class="text-light fs-7">{{ $profileData->email }}</span>
                </div>
                <em class="icon ni ni-chevron-right ms-auto ps-1"></em>
            </div>
        </a>
    </div>
                    </div>
                </div><!-- .nk-sidebar-element -->
            </div><!-- .nk-sidebar -->