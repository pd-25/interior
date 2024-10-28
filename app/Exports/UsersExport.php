<?php

namespace App\Exports;

use App\Models\Booking;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $fromdate;
    private $todate;
    private $DownloadType;
    private $category;
    
    public function __construct($from_date, $to_date, $excelDownloadType, $category) 
    {
        $this->fromdate = $from_date;
        $this->todate = $to_date;
        $this->DownloadType = $excelDownloadType;
        $this->category = $category;
    }

    public function collection()
    {
        if($this->DownloadType == 1)
        {
            $booking = Booking::with('user_details')->whereBetween('date', [ $this->fromdate, $this->todate])->where('category', $this->category )->orderBy('id','desc')->get();
        }else{
            $booking = Booking::with('user_details')->whereBetween('created_at', [ $this->fromdate, $this->todate])->where('category', $this->category )->orderBy('id','desc')->get();
        }
        $finalArray = array();
        if($this->category == 'home'){
            foreach ($booking as $key => $value) {
                if($value->status == 1){
                    $value->status = 'Approved';
                } if($value->status == 2){
                    $value->status = 'Rejected';
                }else{
                    $value->status = 'Pending';
                }
                $tempArray = array(
                    'id' => $key+1,
                    'user_details' => $value->user_details->name .', '. $value->user_details->email .', '.$value->user_details->mobile_no,
                    'category' => $value->category,
                    'home_requirements'=> $value->home_requirements,
                    'renovation'=> $value->renovation,
                    'service'=> $value->service,
                    'location' => $value->block . ', '.  $value->city . ', '. $value->district . ', '. $value->pincode,
                    'budget' => $value->budget,
                    'pincode' => $value->pincode,
                    'date' => date('d-m-Y', strtotime($value->date)),
                    'time' => date('h:i A', strtotime($value->time)),
                    'status' => $value->status,
                    'created_at' =>  date('d-m-Y h:i A', strtotime($value->created_at)),
              );
              array_push($finalArray, $tempArray);
            }
        }elseif($this->category == 'office'){
            foreach ($booking as $key => $value) {
                if($value->status == 1){
                    $value->status = 'Approved';
                } if($value->status == 2){
                    $value->status = 'Rejected';
                }else{
                    $value->status = 'Pending';
                }
                $tempArray = array(
                    'id' => $key+1,
                    'user_details' => $value->user_details->name .', '. $value->user_details->email .', '.$value->user_details->mobile_no,
                    'category' => $value->category,
                    'location' => $value->block . ', '.  $value->city . ', '. $value->district . ', '. $value->pincode,
                  
                    
                    'number_of_cabins'=>$value->number_of_cabins,
                    'number_of_worksations'=>$value->number_of_worksations,
                    'total_carpet_area'=>$value->total_carpet_area,
                    
                    'number_of_cabins_renovation'=>$value->number_of_cabins_renovation,
                    'number_of_worksations_renovation'=>$value->number_of_worksations_renovation,
                    'total_carpet_area_renovation'=>$value->total_carpet_area_renovation,
                    
                    'service'=> $value->service,
                    
                    // 'total_area'=>$value->total_area,
                    // 'total_area_renovation'=>$value->total_area_renovation,
                    
                    'budget' => $value->budget,
                    'pincode' => $value->pincode,

                    'date' => date('d-m-Y', strtotime($value->date)),
                    'time' => date('h:i A', strtotime($value->time)),
                    'status' => $value->status,
                    'created_at' =>  date('d-m-Y h:i A', strtotime($value->created_at)),
              );
              array_push($finalArray, $tempArray);
            }
        }elseif($this->category == 'retail'){
            foreach ($booking as $key => $value) {
                if($value->status == 1){
                    $value->status = 'Approved';
                } if($value->status == 2){
                    $value->status = 'Rejected';
                }else{
                    $value->status = 'Pending';
                }
                $tempArray = array(
                    'id' => $key+1,
                    'user_details' => $value->user_details->name .', '. $value->user_details->email .', '.$value->user_details->mobile_no,
                    'category' => $value->category,
                    'location' => $value->block . ', '.  $value->city . ', '. $value->district . ', '. $value->pincode,
                  
                    'total_area'=>$value->total_area,
                    'total_area_renovation'=>$value->total_area_renovation,
                    
                    'service'=> $value->service,
                    
                    'budget' => $value->budget,
                    'pincode' => $value->pincode,

                    'date' => date('d-m-Y', strtotime($value->date)),
                    'time' => date('h:i A', strtotime($value->time)),
                    'status' => $value->status,
                    'created_at' =>  date('d-m-Y h:i A', strtotime($value->created_at)),
              );
            }
        }
        return collect($finalArray);
        //return Booking::whereBetween('date', [ $this->fromdate, $this->todate])->get();
    }

    public function headings(): array
    {
        if($this->category == 'home'){
            return ["SL No", "user Details", "Category", "Home Requirements","Renovation", "Service",  "Location", "Budget", "Pincode", "Booking Date", "Time", "Status", "Created Date"];
        }elseif($this->category == 'office'){
            return ["SL No", "user Details", "Category", "Location",   "Number of Cabins", "Number of Worksations", "Total Carpet Area","Number of Cabins Renovation", "Number of Worksations Renovation", "Total Carpet Area Renovation", "Service", "Budget", "Pincode", "Booking Date", "Time", "Status", "Created Date"];
        }elseif($this->category == 'retail'){
            return ["SL No", "user Details", "Category", "Location",  "Total Area", "Total Area Renovation", "Budget", "Pincode",  "Booking Date", "Time", "Status", "Created Date"];
        }
    }

}