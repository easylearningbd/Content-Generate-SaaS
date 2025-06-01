<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
   public function AdminLogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    //End Method 





}
