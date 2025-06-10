@extends('client.client_dashboard')
@section('client') 
<div class="nk-content-inner">
<div class="nk-content-body">
    <div class="nk-block-head nk-page-head">
        <div class="nk-block-head-between">
            <div class="nk-block-head-content">
                <h2 class="display-6">Personal Account</h2>
            </div>
        </div>
    </div><!-- .nk-page-head -->
    <div class="nk-block">
        <ul class="nav nav-tabs mb-3 nav-tabs-s1">
            <li class="nav-item">
                <button class="nav-link active" type="button" data-bs-toggle="tab" data-bs-target="#profile-tab-pane">Profile</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" type="button" data-bs-toggle="tab" data-bs-target="#payment-billing-tab-pane">Payment &amp; Billing</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" type="button" data-bs-toggle="tab" data-bs-target="#payment-billing-2-tab-pane">Payment &amp; Billing v2</button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="profile-tab-pane">
                <div class="d-flex align-items-center justify-content-between border-bottom border-light mt-5 pb-1">
                    <h5>Personal Details</h5>
                    <a class="link link-primary fw-normal" href="#">Edit Profile</a>
                </div>
                <table class="table table-flush table-middle mb-0">
                    <tbody>
                        <tr>
                            <td class="tb-col">
                                <span class="fs-15px text-light">Full Name</span>
                            </td>
                            <td class="tb-col">
                                <span class="fs-15px text-base">Shawn Mahbub</span>
                            </td>
                            <td class="tb-col tb-col-end tb-col-sm"></td>
                        </tr>
                        <tr>
                            <td class="tb-col">
                                <span class="fs-15px text-light">Email</span>
                            </td>
                            <td class="tb-col">
                                <span class="fs-15px text-base">shawn@websbd.com</span>
                            </td>
                            <td class="tb-col tb-col-end tb-col-sm"></td>
                        </tr>
                        <tr>
                            <td class="tb-col">
                                <span class="fs-15px text-light">Phone</span>
                            </td>
                            <td class="tb-col">
                                <span class="fs-15px text-base">+88015152088942</span>
                            </td>
                            <td class="tb-col tb-col-end tb-col-sm"></td>
                        </tr>
                        <tr>
                            <td class="tb-col">
                                <span class="fs-15px text-light">Country</span>
                            </td>
                            <td class="tb-col">
                                <span class="fs-15px text-base">Bangladesh</span>
                            </td>
                            <td class="tb-col tb-col-end tb-col-sm"></td>
                        </tr>
                        <tr>
                            <td class="tb-col">
                                <span class="fs-15px text-light">Password</span>
                            </td>
                            <td class="tb-col">
                                <span class="fs-15px text-base"><a class="link link-primary fw-normal" href="#">Change Password</a></span>
                            </td>
                            <td class="tb-col tb-col-end tb-col-sm">
                                <span class="fs-13px text-light">Last changed at Feb 10, 2023</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex align-items-center justify-content-between border-bottom border-light mt-4 pb-1">
                    <h5>Preferences</h5>
                </div>
                <table class="table table-flush">
                    <tbody>
                        <tr>
                            <td class="py-3">
                                <span class="fs-15px text-light">Timezone</span>
                            </td>
                            <td class="py-3">
                                <span class="fs-15px text-base">GMT +06:00</span>
                            </td>
                            <td class="py-3 text-end"><a class="link link-primary fw-normal" href="#">Edit</a></td>
                        </tr>
                        <tr>
                            <td class="py-3">
                                <span class="fs-15px text-light">Date Format</span>
                            </td>
                            <td class="py-3">
                                <span class="fs-15px text-base">DD/MM/YYYY</span>
                            </td>
                            <td class="py-3 text-end"><a class="link link-primary fw-normal" href="#">Edit</a></td>
                        </tr>
                        <tr>
                            <td class="py-3">
                                <span class="fs-15px text-light">Language</span>
                            </td>
                            <td class="py-3">
                                <span class="fs-15px text-base">English US</span>
                            </td>
                            <td class="py-3 text-end"><a class="link link-primary fw-normal" href="#">Edit</a></td>
                        </tr>
                    </tbody>
                </table>
            </div><!-- .tab-pane -->
    @include('client.body.payment_billing')  
    @include('client.body.payment_billing_two')
            
        </div><!-- .tab-content -->
    </div><!-- .nk-block -->
</div>
</div>







@endsection