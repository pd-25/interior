<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contactus;
class ContactusController extends Controller
{
    function index(){
        $contactus = Contactus::first();
        return view('admin.contactus.index',compact('contactus'));
    }

    function editpost(Request $request,$id){
        $validatedData = $request->validate([
            'location'      => ['required'],
        ]);

        //DB::enableQueryLog();
        $contactus = Contactus::find($id);
            $contactus->location        = $request->input('location');
            $contactus->email1          = $request->input('email1');
            $contactus->email2          = $request->input('email2');
            $contactus->phone1          = $request->input('phone1');
            $contactus->phone2          = $request->input('phone2');
            $contactus->location_map    = $request->input('location_map');
        $contactus->save();
        //dd(DB::getQueryLog());

        // Additional logic or redirection after successful data storage
        return redirect()->back()->with('success', 'Contactus updated successfully!');
    }
}
