<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Slider;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Heading;
use App\Models\Questions;

class HomeController extends Controller
{
    public function HomeSlider(){
        $slider = Slider::find(1);
        return view('admin.backend.slider.get_slider',compact('slider'));
    }
    //End Method 

    public function UpdateSlider(Request $request){

        $slider_id = $request->id;
        $slider = Slider::find($slider_id);

        if ($request->file('image')) {
           $image = $request->file('image');
           $manager = new ImageManager(new Driver());
           $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  
           $img = $manager->read($image);
           $img->resize(1696,729)->save(public_path('upload/slider/'.$name_gen));
           $save_url = 'upload/slider/'.$name_gen;

           if (file_exists(public_path($slider->image))) {
             @unlink(public_path($slider->image));
           }

           Slider::find($slider_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'image' => $save_url,
           ]);

     $notification = array(
        'message' => 'Slider Updated Successfully',
        'alert-type' => 'success'
     ); 
     return redirect()->back()->with($notification); 

     } else {

        Slider::find($slider_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link, 
           ]);

      $notification = array(
        'message' => 'Slider Updated Successfully',
        'alert-type' => 'success'
     ); 
     return redirect()->back()->with($notification); 

     }

    }
     //End Method 

    public function UpdateSliders(Request $request, $id){
        $slider = Slider::findOrFail($id);
        $slider->update($request->only(['title','description']));
        return response()->json(['success' => true, 'message' => 'Updated Successfully']); 
    }
    //End Method 

    public function UpdateSliderImage(Request $request, $id){
        $slider = Slider::findOrFail($id);

        if ($request->file('image')) {
           $image = $request->file('image');
           $manager = new ImageManager(new Driver());
           $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  
           $img = $manager->read($image);
           $img->resize(1696,729)->save(public_path('upload/slider/'.$name_gen));
           $save_url = 'upload/slider/'.$name_gen;

           if (file_exists(public_path($slider->image))) {
             @unlink(public_path($slider->image));
           }

           $slider->update([ 
            'image' => $save_url,
           ]);

           return response()->json([
            'success' => true,
            'image_url' => asset($save_url),
            'message' => 'Image updated successfully'
           ]); 

        }

        return response()->json(['success' =>  false, 'message' => 'Image upload Failed'],400);
    }
     //End Method 

   public function AllHeading(){
    $heading = Heading::latest()->get();
    return view('admin.backend.heading.all_heading',compact('heading'));
   }
   //End Method 

   public function AddHeading(){
    
    return view('admin.backend.heading.add_heading');
   }
   //End Method 

   public function StoreHeading(Request $request){
        Heading::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

    $notification = array(
        'message' => 'Heading Inserted Successfully',
        'alert-type' => 'success'
     ); 
     return redirect()->route('all.heading')->with($notification); 

   }
   //End Method 


 public function UpdateStarted(Request $request, $id){
        $heading = Heading::findOrFail($id);
        $heading->update($request->only(['title','description']));
        return response()->json(['success' => true, 'message' => 'Updated Successfully']); 
    }
    //End Method 


public function AllQuestions(){
    $question = Questions::latest()->get();
    return view('admin.backend.question.all_question',compact('question'));
   }
   //End Method 

   public function AddQuestions(){
   
    return view('admin.backend.question.add_question');
   }
   //End Method 

   public function StoreQuestions(Request $request){
        Questions::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

    $notification = array(
        'message' => 'Questions Inserted Successfully',
        'alert-type' => 'success'
     ); 
     return redirect()->route('all.questions')->with($notification); 

   }
   //End Method 

   public function EditQuestions($id){
    $question = Questions::find($id);
    return view('admin.backend.question.edit_question',compact('question'));
   }
   //End Method 

   public function UpdateQuestions(Request $request){

    $que_id = $request->id;

        Questions::find($que_id)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

    $notification = array(
        'message' => 'Questions Updated Successfully',
        'alert-type' => 'success'
     ); 
     return redirect()->route('all.questions')->with($notification); 

   }
   //End Method 

   public function DeleteQuestions($id){

    Questions::find($id)->delete();

    $notification = array(
        'message' => 'Questions Deleted Successfully',
        'alert-type' => 'success'
     ); 
     return redirect()->back()->with($notification); 

   }
   //End Method 
 
   public function UseCase(){
    return view('home.page.use_case');
   }
   //End Method 

   public function Features(){
    return view('home.page.features');
   }
   //End Method 

   public function Pricing(){
    return view('home.page.pricing');
   }
   //End Method 

    public function Contact(){
    return view('home.page.contact');
   }
   //End Method 


}
