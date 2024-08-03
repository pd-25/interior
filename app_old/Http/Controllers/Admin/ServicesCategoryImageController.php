<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServicesCategory;
use App\Models\ServicesCategoryImage;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServicesCategoryImageController extends Controller
{
    public function index($categorie_id){
        $servicecatiamges = ServicesCategoryImage::with('servicecategory')->where('categorie_id',$categorie_id)->get();
        $serviceCatFilterId = session('serviceCatFilterId');
        return view('admin.servicecatiamges.list',compact('servicecatiamges','categorie_id','serviceCatFilterId'));
    }

    public function create($categorie_id){
        $categorys = ServicesCategory::get();
        return view('admin.servicecatiamges.add',compact('categorys','categorie_id'));
    }

    public function store(Request $request, $categorie_id){
        $validatedData = $request->validate([
            'name' => ['required'],
        ]);

        //dd($request);

        if($request->file('servicecatimage')){
            foreach($request->file('servicecatimage') as $file)
            {
                $name       = $file->getClientOriginalName();
                $image_path = $file->store('servicecatiamges','public',$name);

                $servicecatimage = new ServicesCategoryImage();
                $servicecatimage->categorie_id  = $categorie_id;
                $servicecatimage->name = $request->input('name');
                $servicecatimage->slug          = Str::slug($request->input('name'));
                $servicecatimage->image_path    = $image_path;
                $servicecatimage->status        = $request->input('status');
                $servicecatimage->save();
            }

            return redirect()->route('ServiceCatimagelist',['category'=>$categorie_id])->with('success', 'Category image stored successfully!');
        }else{
            return redirect()->back()->with('error', 'Please select images to upload first');
        }

        
    }

    public function edit($categorie_id,$id){
        $categorys = ServicesCategory::get();
        $servicecatiamge = ServicesCategoryImage::where('id',$id)->first();
        return view('admin.servicecatiamges.edit',compact('servicecatiamge','categorys','categorie_id'));
    }

    public function update(Request $request,$categorie_id,$id){
        $validatedData = $request->validate([
            'name'       => ['required'],
        ]);

        $old_image_path = $request->input('old_image_path');

        if($request->file('image_path')){
            $file       = $request->file('image_path');
            $name       = $file->getClientOriginalName();
            $image_path = $file->store('servicecatiamges','public',$name);
        }else{
            $image_path = $old_image_path;
        }
        
        $olImagePathtoStorage = public_path().'/storage/'.$old_image_path;
        
        //DB::enableQueryLog();
        $servicecatimage = ServicesCategoryImage::find($id);
        $servicecatimage->name          = $request['name'];
        $servicecatimage->slug = Str::slug($request->input('name'));
        $servicecatimage->image_path          = $image_path;
        $servicecatimage->status         = $request['status'];
        $servicecatimage->save();

        if ($servicecatimage->wasChanged()) {
            if($request->file('image_path') && !empty($old_image_path) && file_exists($olImagePathtoStorage)):
                //dd($olImagePathtoStorage);
                unlink($olImagePathtoStorage);
            endif;    
        }

        // Additional logic or redirection after successful data storage
        return redirect()->route('ServiceCatimagelist',['category'=>$categorie_id])->with('success', 'Category image updated successfully!');
    }


    public function destroy($categorie_id,$id){
        $servicecatimage = ServicesCategoryImage::find($id);
        $ImagePathtoStorage = public_path().'/storage/'.$servicecatimage->image_path;
        $servicecatimage->delete();
        unlink($ImagePathtoStorage);
        return redirect()->route('ServiceCatimagelist',['category'=>$categorie_id])->with('success', 'Category image deleted successfully!');
    }
}
