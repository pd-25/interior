<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use App\Models\SubBanner;
use Illuminate\Http\Request;

class HomeBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homeBanner = HomeBanner::all();
        return view('admin.home_banner.banner_index', compact('homeBanner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.home_banner.add_banner');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'media' => 'required',
        ]);

        $homeBanner = new HomeBanner;
        if ($request->hasFile('media')) {
            $image_path = date('Y-m-d-H_i_s').'_' .$request->file('media')->getClientOriginalName();
            $request->file('media')->storeAs('banner',$image_path,['disk' => 'public']);
            $homeBanner->media = 'banner/'.$image_path;
        }
        $homeBanner->short_description = $request->short_description;
        $homeBanner->status = $request->status;
        $homeBanner->save();
        return back()->with('success', 'Banner added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(HomeBanner $homeBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomeBanner $homeBanner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HomeBanner $homeBanner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeBanner $homeBanner, $id)
    {
        $homeBanner = HomeBanner::find($id);
        $homeBanner->delete();
        return back()->with('success', 'Successfully Deleted');
    }


    public function Subindex()
    {
        $SubBanner = SubBanner::all();
        return view('admin.sub_banner.list_banner', compact('SubBanner'));
    }

    public function Subcreate()
    {
        return view('admin.sub_banner.add_banner');
    }

    public function substore(Request $request)
    {
        $request->validate([
            'media' => 'required',
        ]);

        $SubBanner = new SubBanner;
        if ($request->hasFile('media')) {
            $image_path = date('Y-m-d-H_i_s').'_' .$request->file('media')->getClientOriginalName();
            $request->file('media')->storeAs('banner',$image_path,['disk' => 'public']);
            $SubBanner->media = 'banner/'.$image_path;
        }
        $SubBanner->short_description = $request->short_description;
        $SubBanner->status = $request->status;
        $SubBanner->save();
        return back()->with('success', 'Sub Banner added successfully');
    }

    public function subdestroy(SubBanner $SubBanner, $id)
    {
        $SubBanner = SubBanner::find($id);
        $SubBanner->delete();
        return back()->with('success', 'Successfully Deleted');
    }

}