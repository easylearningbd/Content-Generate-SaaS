<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Slider;

class HomeController extends Controller
{
    public function HomeSlider(){
        $slider = Slider::find(1);
        return view('admin.backend.slider.get_slider',compact('slider'));
    }
    //End Method 






}
