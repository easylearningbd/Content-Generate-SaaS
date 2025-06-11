<?php

namespace App\Http\Controllers\Backend\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\BillingHistory;
use App\Models\Plan;

class CheckoutController extends Controller
{
    public function UserCheckout(){
        $user = Auth::user();
        $userPlan = $user->plan;
        $allPlans = Plan::where('price', '>', 0)->get(); // Exclude free plan
        return view('client.backend.checkout.user_checkout',compact('allPlans','userPlan'));
    }
    // End Method 







} 
