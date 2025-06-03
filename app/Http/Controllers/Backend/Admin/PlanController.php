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

    public function AddPlans(){
         return view('admin.backend.plan.add_plan');
    }
    // End Method 

    public function StorePlans(Request $request){
       
        Plan::create([
            'name' => $request->name,
            'monthly_word_limit' => $request->monthly_word_limit,
            'price' => $request->price,
            'templates' => $request->templates,
        ]);

        $notification = array(
        'message' => 'Plans Added Successfully',
        'alert-type' => 'success'
     );

     return redirect()->route('all.plans')->with($notification);

    }
    // End Method 



}
