@extends('admin.dashboard')
@section('admin') 

<div class="nk-content-inner">
<div class="nk-content-body">
<div class="nk-block-head nk-page-head">
    <div class="nk-block-head-between">
        <div class="nk-block-head-content">
            <h2 class="display-6">Welcome Shawn!</h2>
        </div>
    </div>
</div><!-- .nk-page-head -->
<div class="nk-block">
    <div class="row g-gs">
        <div class="col-sm-6 col-xxl-3">
            <div class="card card-full bg-purple bg-opacity-10 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <div class="fs-6 text-light mb-0">Words Available</div>
                        <a href="history.html" class="link link-purple">See History</a>
                    </div>
                    <h5 class="fs-1">452 <small class="fs-3">words</small></h5>
                    <div class="fs-7 text-light mt-1"><span class="text-dark">1548</span>/2000 free words generated</div>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-sm-6 col-xxl-3">
            <div class="card card-full bg-blue bg-opacity-10 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <div class="fs-6 text-light mb-0">Drafts Available</div>
                        <a href="document-drafts.html" class="link link-blue">See All</a>
                    </div>
                    <h5 class="fs-1">3 <small class="fs-3">Drafts</small></h5>
                    <div class="fs-7 text-light mt-1"><span class="text-dark">7</span>/10 free drafts created</div>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-sm-6 col-xxl-3">
            <div class="card card-full bg-indigo bg-opacity-10 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <div class="fs-6 text-light mb-0">Documents Available</div>
                        <a href="document-saved.html" class="link link-indigo">See All</a>
                    </div>
                    <h5 class="fs-1">6 <small class="fs-3">Documents</small></h5>
                    <div class="fs-7 text-light mt-1"><span class="text-dark">4</span>/10 free documents created</div>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-sm-6 col-xxl-3">
            <div class="card card-full bg-cyan bg-opacity-10 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <div class="fs-6 text-light mb-0">Tools Available</div>
                        <a href="templates.html" class="link link-cyan">All Tools</a>
                    </div>
                    <h5 class="fs-1">12 <small class="fs-3">Tools</small></h5>
                    <div class="fs-7 text-light mt-1"><span class="text-dark">4</span>/16 free tools used to generate content</div>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
    </div><!-- .row -->
</div><!-- .nk-block -->
<div class="nk-block-head">
    <div class="nk-block-head-between">
        <div class="nk-block-head-content">
            <h2 class="display-6">Popular Templates</h2>
        </div>
        <div class="nk-block-head-content">
            <a href="templates.html" class="link">Explore All</a>
        </div>
    </div>
</div><!-- .nk-block-head -->
<div class="nk-block">
    <div class="row g-gs">
        <div class="col-sm-6 col-xxl-3">
            <div class="card card-full">
                <div class="card-body">
                    <div class="media media-rg media-middle media-circle text-primary bg-primary bg-opacity-20 mb-3">
                        <em class="icon ni ni-bulb-fill"></em>
                    </div>
                    <h5 class="fs-4 fw-medium">Blog Ideas</h5>
                    <p class="small text-light">Produce trendy blog ideas for your business that engages.</p>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-sm-6 col-xxl-3">
            <div class="card card-full">
                <div class="card-body">
                    <div class="position-absolute end-0 top-0 me-4 mt-4">
                        <div class="badge text-bg-dark rounded-pill text-uppercase">New</div>
                    </div>
                    <div class="media media-rg media-middle media-circle text-blue bg-blue bg-opacity-20 mb-3">
                        <em class="icon ni ni-spark-fill"></em>
                    </div>
                    <h5 class="fs-4 fw-medium">Social Media Posts</h5>
                    <p class="small text-light">Creative and engaging social media post for your brand.</p>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-sm-6 col-xxl-3">
            <div class="card card-full">
                <div class="card-body">
                    <div class="media media-rg media-middle media-circle text-red bg-red bg-opacity-20 mb-3">
                        <em class="icon ni ni-youtube-fill"></em>
                    </div>
                    <h5 class="fs-4 fw-medium">YouTube Tags Generator</h5>
                    <p class="small text-light">Generate SEO optimized tags/keywords for your YouTube video.</p>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-sm-6 col-xxl-3">
            <div class="card card-full">
                <div class="card-body">
                    <div class="media media-rg media-middle media-circle text-purple bg-purple bg-opacity-20 mb-3">
                        <em class="icon ni ni-laptop"></em>
                    </div>
                    <h5 class="fs-4 fw-medium">Website Headlines/Copy</h5>
                    <p class="small text-light">Generate professional copy for your website that converts users.</p>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
    </div><!-- .row -->
</div><!-- .nk-block -->
<div class="nk-block-head">
    <div class="nk-block-head-between">
        <div class="nk-block-head-content">
            <h2 class="display-6">Recent Documents</h2>
        </div>
        <div class="nk-block-head-content">
            <a href="document-saved.html" class="link"><span>See All</span> <em class="icon ni ni-chevron-right"></em></a>
        </div>
    </div>
</div><!-- .nk-block-head -->
<div class="nk-block">
    <div class="card">
        <table class="table table-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="tb-col tb-col-check">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="">
                        </div>
                    </th>
                    <th class="tb-col">
                        <h6 class="overline-title">Name</h6>
                    </th>
                    <th class="tb-col tb-col-sm">
                        <h6 class="overline-title">Type</h6>
                    </th>
                    <th class="tb-col tb-col-md">
                        <h6 class="overline-title">Last Modified</h6>
                    </th>
                    <th class="tb-col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="tb-col tb-col-check">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="">
                        </div>
                    </td>
                    <td class="tb-col">
                        <div class="caption-text">The Impact of Artificial Intelligence on the Future of Work</div>
                    </td>
                    <td class="tb-col tb-col-sm">
                        <div class="badge text-bg-dark-soft rounded-pill px-2 py-1 fs-6 lh-sm">Document</div>
                    </td>
                    <td class="tb-col tb-col-md">
                        <div class="fs-6 text-light d-inline-flex flex-wrap gap gx-2"><span>Feb 15,2023 </span> <span>02:31 PM</span></div>
                    </td>
                    <td class="tb-col tb-col-end">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-icon btn-zoom me-n1" type="button" data-bs-toggle="dropdown">
                                <em class="icon ni ni-more-h"></em>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="dropdown-content">
                                    <ul class="link-list link-list-hover-bg-primary link-list-md">
                                        <li>
                                            <a href="#l"><em class="icon ni ni-eye"></em><span>View Document</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><em class="icon ni ni-edit"></em><span>Rename</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><em class="icon ni ni-trash"></em><span>Move to Trash</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="tb-col tb-col-check">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="">
                        </div>
                    </td>
                    <td class="tb-col">
                        <div class="caption-text">How to Boost Your Online Presence with Social Media Marketing</div>
                    </td>
                    <td class="tb-col tb-col-sm">
                        <div class="badge text-bg-blue-soft rounded-pill px-2 py-1 fs-6 lh-sm">Social Media</div>
                    </td>
                    <td class="tb-col tb-col-md">
                        <div class="fs-6 text-light d-inline-flex flex-wrap gap gx-2"><span>Feb 15,2023 </span> <span>02:31 PM</span></div>
                    </td>
                    <td class="tb-col tb-col-end">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-icon btn-zoom me-n1" type="button" data-bs-toggle="dropdown">
                                <em class="icon ni ni-more-h"></em>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="dropdown-content">
                                    <ul class="link-list link-list-hover-bg-primary link-list-md">
                                        <li>
                                            <a href="#l"><em class="icon ni ni-eye"></em><span>View Document</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><em class="icon ni ni-edit"></em><span>Rename</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><em class="icon ni ni-trash"></em><span>Move to Trash</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="tb-col tb-col-check">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="">
                        </div>
                    </td>
                    <td class="tb-col">
                        <div class="caption-text">Top 10 Tips for Effective Time Management in the Workplace</div>
                    </td>
                    <td class="tb-col tb-col-sm">
                        <div class="badge text-bg-primary-soft rounded-pill px-2 py-1 fs-6 lh-sm">Blog Content</div>
                    </td>
                    <td class="tb-col tb-col-md">
                        <div class="fs-6 text-light d-inline-flex flex-wrap gap gx-2"><span>Feb 15,2023 </span> <span>02:31 PM</span></div>
                    </td>
                    <td class="tb-col tb-col-end">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-icon btn-zoom me-n1" type="button" data-bs-toggle="dropdown">
                                <em class="icon ni ni-more-h"></em>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="dropdown-content">
                                    <ul class="link-list link-list-hover-bg-primary link-list-md">
                                        <li>
                                            <a href="#l"><em class="icon ni ni-eye"></em><span>View Document</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><em class="icon ni ni-edit"></em><span>Rename</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><em class="icon ni ni-trash"></em><span>Move to Trash</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="tb-col tb-col-check">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="">
                        </div>
                    </td>
                    <td class="tb-col">
                        <div class="caption-text">Transforming Healthcare with Big Data: Exploring the Opportunities</div>
                    </td>
                    <td class="tb-col tb-col-sm">
                        <div class="badge text-bg-purple-soft rounded-pill px-2 py-1 fs-6 lh-sm">Website Copy &amp; SEO</div>
                    </td>
                    <td class="tb-col tb-col-md">
                        <div class="fs-6 text-light d-inline-flex flex-wrap gap gx-2"><span>Feb 15,2023 </span> <span>02:31 PM</span></div>
                    </td>
                    <td class="tb-col tb-col-end">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-icon btn-zoom me-n1" type="button" data-bs-toggle="dropdown">
                                <em class="icon ni ni-more-h"></em>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="dropdown-content">
                                    <ul class="link-list link-list-hover-bg-primary link-list-md">
                                        <li>
                                            <a href="#l"><em class="icon ni ni-eye"></em><span>View Document</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><em class="icon ni ni-edit"></em><span>Rename</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><em class="icon ni ni-trash"></em><span>Move to Trash</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                        
@endsection