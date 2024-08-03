<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
class TestimonialsController extends Controller
{
    function list(){
        $testimonial = Testimonial::get();
        return view('admin.testimonials.list',compact('testimonial'));
    }

    function add(){
        return view('admin.testimonials.add');
    }

    function addpost(Request $request){
        $validatedData = $request->validate([
            'name'              => ['required'],
            'designation'       => ['required'],
            'description'       => ['required'],
            'rating'            => ['required']
        ]);

        $old_image_path = $request->input('old_image_path');

        if($request->file('user_image')){
            $file       = $request->file('user_image');
            $name       = $file->getClientOriginalName();
            $image_path = $file->store('testimonial','public',$name);
        }else{
            $image_path = $request->input('old_image_path');
        }

        $olImagePathtoStorage = public_path().'/storage/'.$old_image_path;

        $testimonial = new Testimonial();
        $testimonial->name                      = $request->input('name');
        $testimonial->designation               = $request->input('designation');
        $testimonial->description               = $request->input('description');
        $testimonial->user_image                = $image_path;
        $testimonial->rating                    = $request->input('rating');
        $testimonial->status                    = $request->input('status');
        $testimonial->save();

        if ($testimonial->wasChanged()) {
            if($request->file('image_path') && !empty($old_image_path) && file_exists($olImagePathtoStorage)):
                //dd($olImagePathtoStorage);
                unlink($olImagePathtoStorage);
            endif;    
        }

        // Additional logic or redirection after successful data storage
        return redirect()->back()->with('success', 'Testimonial stored successfully!');
    }

    function edit(Request $request,$id){
        $testimonial = Testimonial::where('id',$id)->first();
        return view('admin.testimonials.edit',compact('testimonial'));
    }

    function editpost(Request $request,$id){
        $validatedData = $request->validate([
            'name'              => ['required'],
            'designation'       => ['required'],
            'description'       => ['required'],
            'rating'            => ['required']
        ]);

        if($request->file('user_image')){
            $file       = $request->file('user_image');
            $name       = $file->getClientOriginalName();
            $image_path = $file->store('testimonial','public',$name);
        }else{
            $image_path = $request->input('old_image_path');
        }
        //DB::enableQueryLog();
        $testimonial = Testimonial::find($id);
            $testimonial->name                      = $request->input('name');
            $testimonial->designation               = $request->input('designation');
            $testimonial->description               = $request->input('description');
            $testimonial->user_image                = $image_path;
            $testimonial->rating                    = $request->input('rating');
            $testimonial->status                    = $request->input('status');
        $testimonial->save();
        //dd(DB::getQueryLog());

        // Additional logic or redirection after successful data storage
        return redirect()->back()->with('success', 'Testimonial updated successfully!');
    }

    function destroy($id){
        $testimonial = Testimonial::find($id);
        $testimonial->delete();
        return redirect()->back()->with('success', 'Testimonial Record Deleted successfully!');
    }
}
