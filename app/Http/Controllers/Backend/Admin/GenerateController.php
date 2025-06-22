<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\GeneratedImage; 
use OpenAI\Laravel\Facades\OpenAI;
use App\Models\User;

class GenerateController extends Controller
{
    public function GenerateImage(){

        return view('admin.backend.generate.generate_image');

    }
    // End Method

    public function GenerateAndSaveImage(Request $request){

        $request->validate([
            'prompt' => 'required|string',
        ]);

        $prompt = $request->input('prompt');

        /// Step 1: Generate image using OpenAI
        $response = OpenAI::image()->create([
            'model' => 'dall-e-3',
            'prompt' => $prompt,
            'n' => 1,
            'size' => '1024x1024',
        ]);

        $imageUrl = $request->data[0]->url;

        // Step 2: Download the image 
        

    }
    // End Method


}
