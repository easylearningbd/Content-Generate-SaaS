<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\GeneratedImage; 
use OpenAI\Laravel\Facades\OpenAI;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

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
        $response = OpenAI::images()->create([
            'model' => 'dall-e-3',
            'prompt' => $prompt,
            'n' => 1,
            'size' => '1024x1024',
        ]);

        $imageUrl = $response->data[0]->url;

        // Step 2: Download the image 
        $imageContents = file_get_contents($imageUrl);
        $fileName = 'generated_' . time() . '_' . Str::random(6) . '.png';
        $destinationPath = public_path('upload/generated_image');

        /// Step 3: Ensure the directory exists
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        // Step 4: Save image to public folder
        file_put_contents($destinationPath . '/' . $fileName, $imageContents);

        $generatedImage = GeneratedImage::create([
            'user_id' => Auth::id(),
            'prompt' => $prompt,
            'image_path' => 'upload/generated_image/' . $fileName,
        ]);

        return response()->json([
            'status' => 'success',
            'image_local_path' => asset('upload/generated_image/'.$fileName),
            'message' => 'Image generated and saved successfully',
        ]);     

    }
    // End Method

    public function AllGenerateImage(){
        // $id = Auth::user()->id;
        $genimage = GeneratedImage::orderBy('id','desc')->get();
        return view('admin.backend.generate.all_image',compact('genimage'));
    }
    // End Method


    public function UserGenerateImage(){

        return view('client.backend.generate.generate_image');

    }
    // End Method

     public function UserAllGenerateImage(){
        $id = Auth::user()->id;
        $genimage = GeneratedImage::where('user_id',$id)->orderBy('id','desc')->get();
        return view('client.backend.generate.all_image',compact('genimage'));
    }
    // End Method


}
