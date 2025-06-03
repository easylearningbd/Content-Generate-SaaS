<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Plan;

class PlanController extends Controller
{
    public function AllPlans(){
        $plan = Plan::latest()->get();
        return view('admin.backend.plan.all_plan',compact('plan'));
    } 
    // End Method 



}
