<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contactus;
use App\Models\Aboutus;
use App\Models\Partner;
use App\Models\PartnerPortfolio;
use App\Models\Blog;
use App\Models\Categorie;
use App\Models\Enquries;
use Illuminate\Support\Facades\DB;
use Stevebauman\Location\Facades\Location;


class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
    public function partner_with_us()
    {
        return view('partnerwithus.index');
    }

    public function architecture()
    {
        return view('servicesmenu.architecture');
    }

    public function serviceDetails($slug)
    {
        $serviceDetails = Categorie::where('slug', '=', $slug)->with('servicebanner', 'serviceimage', 'servicecategory')->first();
        $serviceBanners = $serviceDetails->servicebanner()->get();

        if ($serviceDetails->show_child_images == "0") {
            $serviceSliders = $serviceDetails->serviceimage()->get();
        } else {
            $serviceSliders = [];
        }

        $serviceSliders = $serviceDetails->serviceimage()->get();
        $serviceCatSliders = $serviceDetails->servicecategory()->with('servicecategoryimage')->get();
        //dd($serviceCatSliders);
        return view('servicesmenu.service-details', compact('serviceDetails', 'serviceBanners', 'serviceCatSliders', 'serviceSliders'));
    }

    // public function hvac_consultation(){
    //     return view('servicesmenu.hvac-consultation');
    // }

    public function blogs()
    {
        return view('blogs.blog');
    }

    public function blog_details(Request $request, $id)
    {
        $id = decrypt($id);
        $blogs = Blog::where('id', $id)->first();
        return view('blogs.blog-details', compact('blogs'));
    }

    public function generateRandomUuid()
    {
        $dataToHash = uniqid(); // You can replace this with your actual data

        // Generate an MD5 hash
        $hash = md5($dataToHash);

        // Extract the first 8 characters to get a shorter representation
        $shortUuid = substr($hash, 0, 8);

        return $shortUuid;
    }

    public function partner_with_us_form_data(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'firm_name' => 'required',
            'mobile_no' => 'required|min:11|numeric',
            'email' => 'required|email|unique:users',
        ]);
        DB::beginTransaction();
        try {
            if (User::where('mobile_no', $request->mobile_no)->exists() || User::where('email', $request->email)->exists()) {
                return response()->json("userexist");
            } else {
                $user = new User();
                $user->name = $request->full_name;
                $user->email = $request->email;
                $user->mobile_no = $request->mobile_no;
                $user->type = 'partner';
                $user->save();
                
                $userid = $user->id;
                $partner_id = "Prtnr-" . $this->generateRandomUuid();
                $partner = new Partner();
                $partner->users_id = $userid;
                $partner->partner_id = $partner_id;
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
                // $partner_id = $partner_id;
                $response = [
                    'status' => 'success',
                    'partner_id' => $partner_id,
                ];
            }
            DB::commit();
            return response()->json($response);
        }catch (\Throwable $e) {
            DB::rollback();
            throw $e;
            return back()->with('errorMessage', 'Something went wrong');
        }
    }

    public function about_us()
    {
        $aboutus = Aboutus::first();
        return view('aboutus.index', compact('aboutus'));
    }

    public function contact_us()
    {
        $contact = Contactus::first();
        return view('contactus.index', compact('contact'));
    }

    public function storeEnquries(Request $request)
    {
        $request->validate([
            'fullName' => 'required|string',
            'phoneNo' => 'required|min:11|numeric',
            'email' => 'required|email:rfc,dns',
            'address' => 'required|string',
        ]);
        $enquiry = new Enquries;
        $ip = request()->ip();
        $enquiry->ip = $ip;
        $currentUser = Location::get($ip);
        // if($currentUser){
        //     $enquiry->city = $currentUser->cityName;
        //     $enquiry->state = $ $currentUser->regionName;
        //     $enquiry->latitude = $currentUser->latitude;
        //     $enquiry->longitude = $currentUser->longitude;
        // }
        $enquiry->fullName = $request->fullName;
        $enquiry->phoneNo = $request->phoneNo;
        $enquiry->email = $request->email;
        $enquiry->type_query = $request->type_query;
        $enquiry->status = 0;
        $enquiry->address = $request->address;
        if($enquiry->save())
        {
            return redirect()->back()->with('success', 'Thank you. We have received your enquiry. Someone from our team will contact you shortly.');
        }else{
            return redirect()->back()->with('error', 'We encountered an error! Please try again later. Thanks.');
        }
    }


    public function GetLocationWisePartner($location)
    {
        $location = explode("-",$location);
        $district = $location[0];
        $city = $location[1];
        $partners = Partner::with('user')->Where('city','like',"%{$district}%")->inRandomOrder()->limit(3)->get();
        if(sizeof($partners) > 0){
            return $partners;
        }else{
            $partners = Partner::with('user')->Where('city','like',"%{$city}%")->inRandomOrder()->limit(3)->get();
            if(sizeof($partners) > 0){
                return $partners;
            }else{
                $partners = Partner::with('user')->inRandomOrder()->limit(3)->get();
                return $partners;
            }
        }
    }

    public function home_services()
    {
        if (auth()->check()) {
            $user_logged_in = true;
        } else {
            $user_logged_in = false;
        }
        $partners = User::where('type', '=', 'partner')->with('partner')->get();
        return view('services.home', compact('partners', 'user_logged_in'));
    }

    public function office_services()
    {
        $partners = User::where('type', '=', 'partner')->with('partner')->get();
        return view('services.office', compact('partners'));
    }

    public function retail_services()
    {
        $partners = User::where('type', '=', 'partner')->with('partner')->get();
        return view('services.retail', compact('partners'));
    }

    public function booking(Request $request)
    {
        $request->validate([
            'services' => 'required',
            'budget' => 'required',
            'pincode' => 'required|numeric',
            'date' => 'required',
            'time' => 'required',
            // 'expert_id' => 'required',
        ]);
        
        $timestampPart = substr(time(), -4);
        $randomPart = mt_rand(1000, 9999);

        $userId = null;
        if($request->mobile_no && $request->name && $request->email && $request->pin)
        {
            $userDetails = User::where('mobile_no', $request->mobile_no)->first();
            if($userDetails){
                return response()->json([
                    'service_id' => " We have found that you are already registered. Please login for booking services"
                ]);
            }else{
                $user = new User;
                $user->name = $request->name;
                $user->mobile_no = $request->mobile_no;
                $user->email = $request->email;
                $user->pin = $request->pin;
                $user->save();
                $userId = $user->id;
            }
        }
        $booking = new Booking;
        $booking->budget = $request->budget;
        $booking->category = $request->category;
        $booking->date = date('Y-m-d', strtotime($request->date));
        $booking->time = $request->time;
        if($request->home_requirements){
            $booking->home_requirements = json_encode($request->home_requirements);
        }
        if($request->renovation){
            $booking->renovation = json_encode($request->renovation);
        }
        $booking->service = $request->services;
        $booking->pincode = $request->pincode;
        
        $booking->number_of_cabins = $request->number_of_cabins;
        $booking->number_of_worksations = $request->number_of_worksations;
        $booking->total_carpet_area = $request->total_carpet_area;

        $booking->number_of_cabins_renovation = $request->number_of_cabins_renovation;
        $booking->number_of_worksations_renovation = $request->number_of_worksations_renovation;
        $booking->total_carpet_area_renovation = $request->total_carpet_area_renovation;

        $booking->total_area = $request->total_area;
        $booking->total_area_renovation = $request->total_area_renovation;

        // $booking->expert_id = $request->expert_id;
        $booking->expert_id = 0;
        $city = explode("-",$request->city);
        $booking->district = $city[0];
        $booking->city = $city[1];
        $booking->block = $city[2];
        $booking->service_id = $timestampPart . $randomPart;
        $booking->user_id = $userId == null ? auth()->user()->id : $userId;
        $booking->save();
        return response()->json([
            'service_id' => $booking->service_id
        ]);
    }

}
