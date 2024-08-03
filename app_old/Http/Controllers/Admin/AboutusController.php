<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aboutus;
class AboutusController extends Controller
{
    function index(){
        $aboutus = Aboutus::first();
        return view('admin.aboutus.index',compact('aboutus'));
    }

    function editpost(Request $request,$id){

        if($request->file('aboutusimage')){
            $file       = $request->file('aboutusimage');
            $name       = $file->getClientOriginalName();
            $image_path = $file->store('aboutus','public',$name);
        }else{
            $image_path = $request->input('old_image_path');
        }

        //DB::enableQueryLog();
        $aboutus = Aboutus::find($id);
            $aboutus->description                 = $request->input('description');
            $aboutus->image                       = $image_path;
            $aboutus->title_one                   = $request->input('title_one');
            $aboutus->title_one_description       = $request->input('title_one_description');
            $aboutus->title_two                   = $request->input('title_two');
            $aboutus->title_two_description       = $request->input('title_two_description');
            $aboutus->title_three                 = $request->input('title_three');
            $aboutus->title_three_description     = $request->input('title_three_description');
            $aboutus->title_one_faq               = $request->input('title_one_faq');
            $aboutus->faq_item_one_description    = $request->input('faq_item_one_description');
            $aboutus->title_two_faq               = $request->input('title_two_faq');
            $aboutus->faq_item_two_description    = $request->input('faq_item_two_description');
            $aboutus->title_three_faq             = $request->input('title_three_faq');
            $aboutus->faq_item_three_description  = $request->input('faq_item_three_description');
        $aboutus->save();
        //dd(DB::getQueryLog());

        // Additional logic or redirection after successful data storage
        return redirect()->back()->with('success', 'Aboutus updated successfully!');
    }
}
