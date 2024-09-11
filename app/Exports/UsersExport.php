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
            'budget' => $value->budget,
            'location' => $value->block . ', '.  $value->city . ', '. $value->district . ', '. $value->pincode,
            'date' => date('d m Y', strtotime($value->date)),
            'status' => $value->status,
            'created_at' => date('d m Y', strtotime($value->created_at)),
          );
          array_push($finalArray, $tempArray);
        }
        return collect($finalArray);
        
        //return Booking::whereBetween('date', [ $this->fromdate, $this->todate])->get();
    }

    public function headings(): array
    {
        return ["SL No", "user Details", "Category", "Budget", "Location", "Booking Date","Status", "Created Date"];
    }
}