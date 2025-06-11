<?php

namespace App\Http\Controllers\Backend\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\BillingHistory;
use App\Models\Plan;
use Barryvdh\DomPDF\Facade\Pdf;

class CheckoutController extends Controller
{
    public function UserCheckout(){
        $user = Auth::user();
        $userPlan = $user->plan;
        $allPlans = Plan::where('price', '>', 0)->get(); // Exclude free plan
        return view('client.backend.checkout.user_checkout',compact('allPlans','userPlan'));
    }
    // End Method 

    public function UserProcessCheckout(Request $request){

        $request->validate([
            'plan_id' => 'required|exists:plans,id',
            'bank_name' => 'required|string',
        ]);

        $user = Auth::user();
        $newPlan = Plan::find($request->plan_id);

        BillingHistory::create([
            'user_id' => $user->id,
            'plan_id' => $newPlan->id,
            'payment_date' => now(),
            'total' => $newPlan->price,
            'bank_name' => $request->bank_name,
            'account_holder' => $request->account_holder,
            'account_number' => $request->account_number, 
        ]);

        /// Update user plan
        $user->plan_id = $newPlan->id;
        $user->current_word_usage = $newPlan->monthly_word_limit;
        $user->save();

        $notification = array(
        'message' => 'Plan Upgreate request submitted',
        'alert-type' => 'success'
       );

     return redirect()->route('payment.success')->with($notification);

    }
     // End Method 

     public function PaymentSuccess(){
        return view('client.backend.checkout.payment_success');
     }
     // End Method 

     public function InvoiceGenerate($id){
        $billing = BillingHistory::with('user','plan')->findOrFail($id);
        $pdf = Pdf::loadView('client.backend.checkout.invoice',compact('billing'));
        return $pdf->download('invoice-' . $billing->id . '.pdf'); //invoice3.pdf
     }
      // End Method 







} 
