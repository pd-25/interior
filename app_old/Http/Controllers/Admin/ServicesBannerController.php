<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServicesBanner;
use App\Models\Categorie;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServicesBannerController extends Controller
{
    public function list($categorie_id=null){
        //dd($categorie_id);
        $categorys = Categorie::get();
        $servicebanners_query = ServicesBanner::with('serviceBanr');

        if (!empty($categorie_id)) {
            //Storing category id in session
            session(['serviceBanFilterId' => $categorie_id]);
            $servicebanners_query->where('categorie_id', '=', $categorie_id);
        }else{
            session(['serviceBanFilterId' => null]);
        }

        $servicebanners = $servicebanners_query->get();
        //dd($servicebanners);
        return view('admin.servicebanner.list',compact('categorys','servicebanners','categorie_id'));
    }

    public function add(){
        $categorys = Categorie::get();
        $serviceBanFilterId = session('serviceBanFilterId');
        return view('admin.servicebanner.add',compact('categorys','serviceBanFilterId'));
    }

    public function addpost(Request $request){
        $validatedData = $request->validate([
            'categorie_id' => ['required'],
        ]);

        //dd($request);

        if($request->file('servicebanner')){
            foreach($request->file('servicebanner') as $file)
            {
                $name       = $file->getClientOriginalName();
                $image_path = $file->store('servicebanner','public',$name);

                $servicebanner = new ServicesBanner();
                $servicebanner->categorie_id  = $request->input('categorie_id');
                $servicebanner->heading = $request->input('heading');
                $servicebanner->description = $request->input('description');
                $servicebanner->image_path = $image_path;
                $servicebanner->link = $request->input('link');
                $servicebanner->status = $request->input('status');
                $servicebanner->save();
            }
            return redirect()->back()->with('success', 'Service banner stored successfully!');
        }else{
            return redirect()->back()->with('error', 'Please select a banner to upload!');
        }


        // Additional logic or redirection after successful data storage
        
    }

    public function edit(Request $request,$id){
        $categorys = Categorie::get();
        $servicebanner = ServicesBanner::where('id',$id)->first();
        $serviceBanFilterId = session('serviceBanFilterId');
        return view('admin.servicebanner.edit',compact('servicebanner','categorys','serviceBanFilterId'));
    }

    public function saveServiceImage(Request $request,$id){
        $validatedData = $request->validate([
            'heading'       => ['required'],
            'categorie_id' => ['required'],
        ]);

        $old_image_path = $request->input('old_image_path');

        if($request->file('image_path')){
            $file       = $request->file('image_path');
            $name       = $file->getClientOriginalName();
            $image_path = $file->store('servicebanner','public',$name);
        }else{
            $image_path = $request->input('old_image_path');
        }

        $olImagePathtoStorage = public_path().'/storage/'.$old_image_path;

        //DB::enableQueryLog();
        $servicebanner = ServicesBanner::find($id);
        $servicebanner->categorie_id  = $request->input('categorie_id');
        $servicebanner->heading          = $request['heading'];
        $servicebanner->description = $request->input('description');
        $servicebanner->image_path          = $image_path;
        $servicebanner->link          = $request['link'];
        $servicebanner->status         = $request['status'];
        $servicebanner->save();

        if ($servicebanner->wasChanged()) {
            if($request->file('image_path') && !empty($old_image_path) && file_exists($olImagePathtoStorage)):
                //dd($olImagePathtoStorage);
                unlink($olImagePathtoStorage);
            endif;    
        }

        // Additional logic or redirection after successful data storage
        return redirect()->back()->with('success', 'Service banner was updated successfully!');
    }


    public function destroy($id){
        $servicebanner = ServicesBanner::find($id);
        $servicebanner->delete();
        return redirect()->back()->with('success', 'Service banner was Deleted successfully!');
    }
}
