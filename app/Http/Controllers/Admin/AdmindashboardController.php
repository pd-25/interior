<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class AdmindashboardController extends Controller
{
    function dashboard(){
        // $data['bookings'] = Booking::all();
        // dd($data['bookings']);
        $bookings = Booking::groupBy('city')->selectRaw('count(*) as total, city')->orderBy('city')->get();
        $bookingService = Booking::all();
        $tempArray= array(); 
        foreach ($bookingService as $key => $value) {
            $value->service = json_decode($value->service);
            array_push($tempArray, $value);
        }
        // var_dump($tempArray);
        // exit;
        $groupedData = collect($tempArray)->groupBy('service')->map(function ($group) {
            return $group->groupBy(function ($item) {
                return count($item['service']);
            });
        });
        
        $serviceName = array();
        $servicerequest = array();
        foreach ($groupedData as $key => $valueLL) {
            foreach ($valueLL as $keyop => $valueop) {
               $servicerequest[$key.'/'.$keyop] = $valueop->count();
            }
            //array_push($servicerequest, $test);
            
            $key = strtoupper(str_replace("_", " ", $key));
            array_push($serviceName, $key);
        }
        
        $serviceCount = [];
        foreach ($servicerequest as $key => $value) {
            list($service, $id) = explode('/', $key);
            if (!isset($serviceCount[$service])) {
                $serviceCount[$service] = 0;
            }
            $serviceCount[$service] += $value;
        }
        
        $data['serviceName'] = $serviceName;
        $data['serviceCount'] = $serviceCount;
        
        $finalCitys = array();
        $TotalCounts = array();
        foreach ($bookings  as $key => $value) {
           array_push($finalCitys, $value->city);
           array_push($TotalCounts, $value->total);
        }
        $data['finalCitys'] = $finalCitys ;
        $data['TotalCounts'] =$TotalCounts;

        return view('admin.dashboard.dashboard', compact('data'));
    }
}