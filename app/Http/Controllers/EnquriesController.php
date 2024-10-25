<?php

namespace App\Http\Controllers;

use App\Models\Enquries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Exports\EnquiryExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
class EnquriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enquiry = Enquries::orderBy('id', 'desc')->paginate(20);
        return view('admin.enquries.enquries', compact('enquiry'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Enquries $enquries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enquries $enquries, $id)
    {
        $enquiry = Enquries::find($id);
        return view('admin.enquries.edit_enquries', compact('enquiry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enquries $enquries)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Enquries $enquries, $id)
    {
        $enquiry = Enquries::find($id);
        if($enquiry->delete())
        {
            Session::flash('success', 'Enquiry delete Successfully!!');
            return redirect()->back();
        }else{
            Session::flash('error', 'Sorry! Something went wrong. Please try again.');
            return redirect()->back();
        }
    }

    public function statuschnage(Request $request, $id){
        $enquiry = Enquries::find($id);
        $enquiry->status = $request->status;
        if($enquiry->save())
        {
            return response()->json('success');
        }else{
            return response()->json('error');
        }
    }

    public function enquriesexport(Request $request) 
    {
        $from_date = request()->fromDate;
        $to_date = request()->toDate; 
        return Excel::download(new EnquiryExport($from_date, $to_date), 'Enquiry_list.xlsx');
    }
}