<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Template; 
use OpenAI\Laravel\Facades\OpenAI;
use App\Models\User;

class GenerateController extends Controller
{
    public function GenerateImage(){

        return view('admin.backend.generate.generate_image');

    }
    // End Method


}
