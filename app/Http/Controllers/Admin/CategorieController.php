<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Cache;

class CategorieController extends Controller
{
    public function list(){
        $categorys = Categorie::all();
        return view('admin.categories.list',compact('categorys'));
    }

    public function add(){
        return view('admin.categories.add');
    }

    public function getCategories()
    {
        // Check if the categories are already in the cache
        return Cache::tags('categories')->remember('all', $minutes=60, function () {
            // If not in cache, fetch from the database
            return Categorie::where('status','=','1')->get();
        });
    }

    public function clearCategoriesCache()
    {
        // Clear the cache for the 'categories' tag
        Cache::tags('categories')->flush();
    }

    public function addpost(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|unique:categories',
            'description' => ['required'],
            'status' => ['required'],
        ]);

        $old_image_path = $request->input('old_image_path');

        $image_path = '';
        if($request->file('icon')){
            $file       = $request->file('icon');
            $name       = $file->getClientOriginalName();
            $image_path = $file->store('services','public',$name);
        }

        $olImagePathtoStorage = public_path().'/storage/'.$old_image_path;

        $categorie = new Categorie();
        $categorie->name = $request->input('name');
        $categorie->slug = Str::slug($request->input('name'));
        $categorie->icon = $image_path;
        $categorie->description = $request->input('description');
        $categorie->status = $request->input('status');
        $categorie->show_child_images         = $request['show_child_images'];
        $categorie->save();

        if ($categorie->wasChanged()) {
            if($request->file('image_path') && !empty($old_image_path) && file_exists($olImagePathtoStorage)):
                //dd($olImagePathtoStorage);
                unlink($olImagePathtoStorage);
            endif;    
        }

        // Clear the categories cache
        // $this->clearCategoriesCache();

        //Setting up cache
        // $this->getCategories();

        // Additional logic or redirection after successful data storage
        return redirect()->back()->with('success', 'Services stored successfully!');
    }

    public function edit(Request $request,$id){
        $category = Categorie::where('id',$id)->first();
        return view('admin.categories.edit',compact('category'));
    }

    public function editCategory(Request $request,$id){
        $validatedData = $request->validate([
            'name' => ['required','string',Rule::unique('categories')->ignore($id)],
            'description' => ['required'],
        ]);

        $old_image_path = $request->input('old_image_path');

        if($request->file('icon')){
            $file       = $request->file('icon');
            $name       = $file->getClientOriginalName();
            $image_path = $file->store('services','public',$name);
        }else{
            $image_path = $request->input('old_image_path');
        }

        $olImagePathtoStorage = public_path().'/storage/'.$old_image_path;

        //DB::enableQueryLog();
        $category = Categorie::find($id);
        $category->name          = $request['name'];
        $category->slug = Str::slug($request->input('name'));
        $category->description    = $request['description'];
        $category->icon          = $image_path;
        $category->status         = $request['status'];
        $category->show_child_images         = $request['show_child_images'];
        $category->save();

        if ($category->wasChanged()) {
            if($request->file('icon') && !empty($old_image_path) && file_exists($olImagePathtoStorage)):
                //dd($olImagePathtoStorage);
                unlink($olImagePathtoStorage);
            endif;    
        }

        // Clear the categories cache
        // $this->clearCategoriesCache();

        //Setting up cache
        // $this->getCategories();

        // Additional logic or redirection after successful data storage
        return redirect()->back()->with('success', 'Category was updated successfully!');
    }

    public function destroy($id){
        $category = Categorie::find($id);
        $ImagePathtoStorage = public_path().'/storage/'.$category->icon;
        $category->delete();
        unlink($ImagePathtoStorage);
        return redirect()->back()->with('success', 'Category was Deleted successfully!');
    }


}
