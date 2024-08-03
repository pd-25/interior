<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Partner;

class UserController extends Controller
{
    function partnerlist()
    {
        $user = Partner::orderBy('id', 'desc')->get();
        return view('admin.user.partnerlist', compact('user'));
    }

    function customerlist(Request $req)
    {

        $user = User::where('type', 'user')->get();
        return view('admin.user.customerlist', compact('user'));
    }

    function viewCustomer(Request $req)
    {
        $user = User::where('id', $req->id)->first();
        return response()->json($user);
    }

    function updateStatus(Request $req)
    {
        if (intval($req->status) !== 0)
            User::where('id', $req->id)
                ->update([
                    'status' => 0
                ]);
        else
            User::where('id', $req->id)
                ->update([
                    'status' => 1
                ]);

        return response()->json(['message' => 'User updated successfully']);
    }

    public function partnerdetails ($id)
    {
        $user = User::with('partner')->find($id);
        return view('admin.user.partner_edit', compact('user'));

    }

    public function partnerupdate (Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->full_name;
        $user->email = $request->email;
        $user->mobile_no = $request->mobile_no;

        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->pin = $request->pin;
        $user->dob = $request->dob;
        $user->occupation = $request->occupation;
        $user->save();
        
        $partner = Partner::where('users_id', $id)->first();
        $partner->firm_name = $request->firm_name;
        $partner->firm_pan = $request->firm_pan;
        $partner->firm_gst = $request->firm_gst;

        $partner->Official_Company_Address = $request->official_company_address;
        $partner->how_many_years = $request->how_many_years;

        $partner->city = $request->city;
        $partner->major_category = implode(',',$request->major_category);
        $partner->minor_category = $request->minor_category;
        $partner->partnerportfolio = $request->partnerportfolio;
        $partner->save();
        return back()->with('success', 'update successfully');
    }


    public function partnerDelete($id)
    {
        $user = User::find($id);
        $partner = Partner::where('users_id', $id)->first();
        $partner->delete();
        $user->delete();
        return back()->with('success', 'Deleted successfully');
    }
}
