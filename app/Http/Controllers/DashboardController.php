<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $booking = Booking::with('partner_details')->where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        return view('dashboard.index', compact('booking'));
     }

     public function partner_dashboard(Request $request)
     {
        $data['pending'] = Booking::where('expert_id', auth()->user()->id)->where('status', 0)->count();
        $data['Approved'] = Booking::where('expert_id', auth()->user()->id)->where('status', 1)->count();
        $data['Rejected'] = Booking::where('expert_id', auth()->user()->id)->where('status', 2)->count();
        $data['total'] = Booking::where('expert_id', auth()->user()->id)->count();
        $data['home'] = Booking::where('expert_id', auth()->user()->id)->where('category', 'home')->count();
        $data['office'] = Booking::where('expert_id', auth()->user()->id)->where('category', 'office')->count();
        $data['retail'] = Booking::where('expert_id', auth()->user()->id)->where('category', 'retail')->count();
        return view('partnerdashboard.index', $data);
     }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function partner_renovation_pending()
    {
        $bookings = Booking::with('user_details')->where('expert_id', auth()->user()->id)->where('status', 0)->orderBy('id', 'desc')->paginate(20);
        return view('partnerdashboard.pending_request', compact('bookings'));
    }

    public function partner_renovation_edit($id)
    {
        $id = decrypt($id);
        $data['bookings'] = Booking::with('user_details')->find($id);
        $data['partners'] = User::where('type', '=', 'partner')->with('partner')->get();
        return view('partnerdashboard.edit_request', $data);
    }

    public function updateRequestdetails(Request $request)
    {
        $booking =  Booking::find($request->id);
        $booking->status = $request->status;
        $booking->save();
        return back()->with('success', 'Successfully updated');
    }
    
    public function partner_renovation_completed()
    {
        $bookings = Booking::with('user_details')->where('expert_id', auth()->user()->id)->where('status','!=', 0)->orderBy('id', 'desc')->paginate(20);
        return view('partnerdashboard.completed_request', compact('bookings'));
    }
}
