@php
    $id = Auth::user()->id;
    $profileData = App\Models\User::with('plan','billingHistories.plan')->find($id);

    $planPrices = $profileData->plan->price ?? 0;

    $planPrice = $profileData->plan->price ?? ($planPrices[$profileData->plan->name] ?? 0);

    /// Calulate next due date
    $lastBilling = $profileData->billingHistories->sortByDesc('payment_date')->first();
    $nextDueDate = $lastBilling ? \Carbon\Carbon::parse($lastBilling->payment_date)->addMonth()->format('M d, Y')
    : now()->addMonth->format('M d, Y');

    /// Default payment method 
    $paymentMethod = $profileData->payment_method ?? 'Bank Transfer';
    $paymentIcon = $profileData->payment_icon ?? 'upload/paypal.png';

@endphp


<div class="tab-pane fade" id="payment-billing-tab-pane">
<div class="d-flex flex-wrap align-items-center justify-content-between border-bottom border-light mt-5 mb-4 pb-1">
    <h5 class="mb-0">Your Subscription</h5>
    <ul class="d-flex gap gx-4">
        <li>
            <a class="link link-danger fw-normal" data-bs-toggle="modal" href="#cancelSubscriptionModal">Cancel Subscription</a>
        </li>
        <li>
            <a class="link link-primary fw-normal" data-bs-toggle="modal" href="#changePlanModal">Change Plan</a>
        </li>
    </ul>
</div>
<div class="alert alert-warning alert-dismissible fade show mb-4 rounded-6" role="alert">
    <p class="small mb-0">Save big up to 75% on your upgrade to our <strong><a class="alert-link" href="#">Enterprise plan</a></strong> and enjoy premium features at a fraction of the cost!</p>
    <div class="d-inline-flex position-absolute end-0 top-50 translate-middle-y me-2">
        <button type="button" class="btn btn-xs btn-icon btn-warning rounded-pill" data-bs-dismiss="alert">
            <em class="icon ni ni-cross"></em>
        </button>
    </div>
</div>
<div class="row g-gs">
    <div class="col-xl-3 col-sm-6">
        <div class="card shadow-none">
            <div class="card-body">
                <div class="text-light mb-2">Plan</div>
                <h3 class="fw-normal">Professional Plan</h3>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card shadow-none">
            <div class="card-body">
                <div class="text-light mb-2">Recurring Payment</div>
                <h3 class="fw-normal">$23/Month</h3>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card shadow-none">
            <div class="card-body">
                <div class="text-light mb-2">Next Due Date</div>
                <h3 class="fw-normal">Mar 15, 2023</h3>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card shadow-none">
            <div class="card-body">
                <div class="text-light mb-2">Payment Method</div>
                <div class="d-flex align-items-center">
                    <img src="images//icons/paypal.png" alt="" class="icon" />
                    <h3 class="fw-normal ms-2">PayPal</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex align-items-center justify-content-between border-bottom border-light mt-5 mb-4 pb-2">
    <h5>Billing History</h5>
</div>
<div class="card">
    <table class="table table-middle mb-0">
        <thead class="table-light">
            <tr>
                <th class="tb-col">
                    <div class="fs-13px text-base">Subscription</div>
                </th>
                <th class="tb-col tb-col-md">
                    <div class="fs-13px text-base">Payment Date</div>
                </th>
                <th class="tb-col tb-col-sm">
                    <div class="fs-13px text-base">Total</div>
                </th>
                <th class="tb-col tb-col-sm">
                    <div class="fs-13px text-base">Status</div>
                </th>
                <th class="tb-col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tb-col">
                    <div class="caption-text">Starter - 12 Months <div class="d-sm-none dot bg-success"></div>
                    </div>
                </td>
                <td class="tb-col tb-col-md">
                    <div class="fs-6 text-light d-inline-flex flex-wrap gap gx-2"><span>Feb 15,2023 </span> <span>02:31 PM</span></div>
                </td>
                <td class="tb-col tb-col-sm">
                    <div class="fs-6 text-light">$23.00</div>
                </td>
                <td class="tb-col tb-col-sm">
                    <div class="badge text-bg-success-soft rounded-pill px-2 py-1 fs-6 lh-sm">Paid</div>
                </td>
                <td class="tb-col tb-col-end">
                    <a href="#" class="link">Get Invoice</a>
                </td>
            </tr>
            <tr>
                <td class="tb-col">
                    <div class="caption-text">Starter - 12 Months <div class="d-sm-none dot bg-warning"></div>
                    </div>
                </td>
                <td class="tb-col tb-col-md">
                    <div class="fs-6 text-light d-inline-flex flex-wrap gap gx-2"><span>Feb 15,2023 </span> <span>02:31 PM</span></div>
                </td>
                <td class="tb-col tb-col-sm">
                    <div class="fs-6 text-light">$23.00</div>
                </td>
                <td class="tb-col tb-col-sm">
                    <div class="badge text-bg-warning-soft rounded-pill px-2 py-1 fs-6 lh-sm">Faild</div>
                </td>
                <td class="tb-col tb-col-end">
                    <a href="#" class="link">Get Invoice</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div><!-- .tab-pane -->