<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class BlogController extends Controller
{
    public function list(){
        $blog = Blog::get();
        return view('admin.blog.list',compact('blog'));
    }

    public function add(){
        return view('admin.blog.add');
    }

    public function addpost(Request $request){
        $validatedData = $request->validate([
            'title'       => ['required'],
            'description' => ['required'],
        ]);

        if($request->file('blogimage')){
            $file       = $request->file('blogimage');
            $name       = $file->getClientOriginalName();
            $image_path = $file->store('blog','public',$name);
        }else{
            $image_path = '';
        }

        $blog = new Blog();
            $blog->title          = $request->input('title');
            $blog->description    = $request->input('description');
            $blog->image          = $image_path;
            $blog->status         = $request->input('status');
            $blog->blog_post_date = date('Y-m-d');
        $blog->save();

        // Additional logic or redirection after successful data storage
        return redirect()->back()->with('success', 'Blogs stored successfully!');
    }

    public function edit(Request $request,$id){
        $blogs = Blog::where('id',$id)->first();
        return view('admin.blog.edit',compact('blogs'));
    }

    public function editpost(Request $request,$id){
        $validatedData = $request->validate([
            'title'       => ['required'],
            'description' => ['required'],
        ]);

        $old_image_path = $request->input('old_image_path');

        if($request->file('blogimage')){
            $file       = $request->file('blogimage');
            $name       = $file->getClientOriginalName();
            $image_path = $file->store('blog','public',$name);
        }else{
            $image_path = $request->input('old_image_path');
        }

        $olImagePathtoStorage = public_path().'/storage/'.$old_image_path;

        //DB::enableQueryLog();
        $blog = Blog::find($id);
        $blog->title          = $request['title'];
        $blog->description    = $request['description'];
        $blog->image          = $image_path;
        $blog->status         = $request['status'];
        $blog->blog_post_date = date('Y-m-d');
        $blog->save();
        //dd(DB::getQueryLog());

        if ($blog->wasChanged()) {
            if($request->file('image_path') && !empty($old_image_path) && file_exists($olImagePathtoStorage)):
                //dd($olImagePathtoStorage);
                unlink($olImagePathtoStorage);
            endif;    
        }

        // Additional logic or redirection after successful data storage
        return redirect()->back()->with('success', 'Blogs updated successfully!');
    }

    public function destroy($id){
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->back()->with('success', 'Blogs Record Deleted successfully!');
    }
}
