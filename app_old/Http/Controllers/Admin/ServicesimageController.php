<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servicesimage;
use App\Models\Categorie;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServicesimageController extends Controller
{
    public function list($categorie_id=null){
        //dd($categorie_id);
        $categorys = Categorie::get();
        $servicesimages_query = Servicesimage::with('serviceTeel');

        if (!empty($categorie_id)) {
            //Storing category id in session
            session(['serviceImgFilterId' => $categorie_id]);
            $servicesimages_query->where('categorie_id', '=', $categorie_id);
        }else{
            session(['serviceImgFilterId' => null]);
        }

        $servicesimages = $servicesimages_query->get();
        //dd($servicesimages);
        return view('admin.servicesimage.list',compact('categorys','servicesimages','categorie_id'));
    }

    public function add(){
        $categorys = Categorie::get();
        $serviceImgFilterId = session('serviceImgFilterId');
        return view('admin.servicesimage.add',compact('categorys','serviceImgFilterId'));
    }

    public function addpost(Request $request){
        $validatedData = $request->validate([
            'categorie_id' => ['required'],
        ]);

        if($request->file('serviceimage')){
            foreach($request->file('serviceimage') as $file)
            {
                $name       = $file->getClientOriginalName();
                $image_path = $file->store('servicesimage','public',$name);

                $serviceimage = new Servicesimage();
                $serviceimage->categorie_id  = $request->input('categorie_id');
                $serviceimage->services_name = $request->input('services_name');
                $serviceimage->slug          = Str::slug($request->input('services_name'));
                $serviceimage->image_path    = $image_path;
                $serviceimage->status        = $request->input('status');
                $serviceimage->save();
            }
        }


        // Additional logic or redirection after successful data storage
        return redirect()->back()->with('success', 'Service image stored successfully!');
    }

    public function edit(Request $request,$id){
        $categorys = Categorie::get();
        $servicesimage = Servicesimage::where('id',$id)->first();
        $serviceImgFilterId = session('serviceImgFilterId');
        return view('admin.servicesimage.edit',compact('servicesimage','categorys','serviceImgFilterId'));
    }

    public function saveServiceImage(Request $request,$id){
        $validatedData = $request->validate([
            'services_name'       => ['required'],
            'categorie_id' => ['required'],
        ]);

        $old_image_path = $request->input('old_image_path');

        if($request->file('image_path')){
            $file       = $request->file('image_path');
            $name       = $file->getClientOriginalName();
            $image_path = $file->store('servicesimage','public',$name);
        }else{
            $image_path = $request->input('old_image_path');
        }

        $olImagePathtoStorage = public_path().'/storage/'.$old_image_path;

        //DB::enableQueryLog();
        $serviceimage = Servicesimage::find($id);
        $serviceimage->categorie_id  = $request->input('categorie_id');
        $serviceimage->services_name          = $request['services_name'];
        $serviceimage->slug = Str::slug($request->input('services_name'));
        $serviceimage->image_path          = $image_path;
        $serviceimage->status         = $request['status'];
        $serviceimage->save();

        if ($serviceimage->wasChanged()) {
            if($request->file('image_path') && !empty($old_image_path) && file_exists($olImagePathtoStorage)):
                //dd($olImagePathtoStorage);
                unlink($olImagePathtoStorage);
            endif;    
        }

        // Additional logic or redirection after successful data storage
        return redirect()->back()->with('success', 'Service image was updated successfully!');
    }


    public function destroy($id){
        $serviceimage = Servicesimage::find($id);
        $serviceimage->delete();
        return redirect()->back()->with('success', 'Service image was Deleted successfully!');
    }
}
