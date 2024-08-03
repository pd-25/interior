<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServicesCategory;
use App\Models\Categorie;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceCategoryController extends Controller
{
    public function list($categorie_id = null){
        $categorys = Categorie::get();
        $serviceCategory_query = ServicesCategory::with('serviceData');

        if (!empty($categorie_id)) {
            //Storing category id in session
            session(['serviceCatFilterId' => $categorie_id]);
            $serviceCategory_query->where('categorie_id', '=', $categorie_id);
        }else{
            session(['serviceCatFilterId' => null]);
        }

        $serviceCategory = $serviceCategory_query->get();
        return view('admin.servicecategory.list',compact('categorys','serviceCategory','categorie_id'));
    }

    public function add(){
        $categorys = Categorie::get();
        $serviceCatFilterId = session('serviceCatFilterId');
        return view('admin.servicecategory.add',compact('categorys','serviceCatFilterId'));
    }

    public function addpost(Request $request){
        $validatedData = $request->validate([
            'name'       => ['required'],
            'categorie_id' => ['required'],
        ]);
        //dd($request);

        if($request->file('icon')){
            $file       = $request->file('icon');
            $name       = $file->getClientOriginalName();
            $image_path = $file->store('servicecategory','public',$name);
        }else{
            $image_path = null;
        }

        $servicecategory = new ServicesCategory();
        $servicecategory->categorie_id = $request->input('categorie_id');
        $servicecategory->name = $request->input('name');
        $servicecategory->slug = Str::slug($request->input('name'));
        $servicecategory->icon = $image_path;
        $servicecategory->status = $request->input('status');
        $servicecategory->save();

        // Additional logic or redirection after successful data storage
        return redirect()->back()->with('success', 'Service category stored successfully!');
    }

    public function edit(Request $request,$id){
        $categorys = Categorie::get();
        $serviceCategory = ServicesCategory::where('id',$id)->first();
        $serviceCatFilterId = session('serviceCatFilterId');
        return view('admin.servicecategory.edit',compact('serviceCategory','categorys','serviceCatFilterId'));
    }

    public function saveServiceCategory(Request $request,$id){
        $validatedData = $request->validate([
            'name'       => ['required'],
            'categorie_id' => ['required'],
        ]);
        
        $old_image_path = $request->input('old_image_path');

        if($request->file('icon')){
            $file       = $request->file('icon');
            $name       = $file->getClientOriginalName();
            $image_path = $file->store('servicecategory','public',$name);
        }else{
            $image_path = $old_image_path;
        }
        
        $olImagePathtoStorage = public_path().'/storage/'.$old_image_path;

        //DB::enableQueryLog();
        $servicecategory = ServicesCategory::find($id);
        $servicecategory->categorie_id  = $request->input('categorie_id');
        $servicecategory->name          = $request['name'];
        $servicecategory->slug = Str::slug($request->input('name'));
        $servicecategory->icon          = $image_path;
        $servicecategory->status         = $request['status'];
        $servicecategory->save();

        if ($servicecategory->wasChanged()) {
            if($request->file('icon') && !empty($old_image_path) && file_exists($olImagePathtoStorage)):
                //dd($olImagePathtoStorage);
                unlink($olImagePathtoStorage);
            endif;    
        }

        // Additional logic or redirection after successful data storage
        return redirect()->back()->with('success', 'Service category was updated successfully!');
    }


    public function destroy($id){
        $servicecategory = ServicesCategory::find($id);
        $ImagePathtoStorage = public_path().'/storage/'.$servicecategory->icon;
        $servicecategory->delete();
        unlink($ImagePathtoStorage);
        return redirect()->back()->with('success', 'Service category was Deleted successfully!');
    }
}
