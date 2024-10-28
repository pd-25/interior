<?php

namespace App\Exports;

use App\Models\Enquries;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EnquiryExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $fromdate;
    private $todate;
    private $formtype;
    
    public function __construct($form_type, $from_date, $to_date) 
    {
        $this->fromdate = $from_date;
        $this->todate = $to_date;
        $this->formtype = $form_type;
    }

    public function collection()
    {
        $fromDate = Carbon::parse($this->fromdate)->startOfDay();
        $toDate = Carbon::parse($this->todate)->endOfDay();
        if($this->formtype == 1){
            $booking = Enquries::where('type_query', null)->whereBetween('created_at', [$fromDate, $toDate])
                                ->orderBy('id', 'desc')
                                ->get();
            $finalArray = [];
            foreach ($booking as $key=>$value) {
                $tempArray = [
                    'id' => $key+1, 
                    'fullName' => $value->fullName,
                    'email' => $value->email,
                    'phoneNo' => $value->phoneNo,
                    'address' => $value->address,
                    'city' => $value->city,
                    'state' => $value->state,
                    'pin_code' => $value->pin_code,
                    'page_ref' => $value->page_ref,
                    'created_at' => date('d-m-Y h:i A', strtotime($value->created_at)),
                ];
                $finalArray[] = $tempArray;
            }
        }else{
            $booking = Enquries::where('type_query','!=', null)->whereBetween('created_at', [$fromDate, $toDate])
                                ->orderBy('id', 'desc')
                                ->get();
                                $finalArray = [];
            foreach ($booking as $key=>$value) {
                $tempArray = [
                    'id' => $key+1, 
                    'fullName' => $value->fullName,
                    'email' => $value->email,
                    'phoneNo' => $value->phoneNo,
                    'type_query' => $value->type_query,
                    'message' => $value->message,
                    'city' => $value->city,
                    'state' => $value->state,
                    'pin_code' => $value->pin_code,
                    'created_at' => date('d-m-Y h:i A', strtotime($value->created_at)),
                ];
                $finalArray[] = $tempArray;
            }
        }
        return collect($finalArray);
    }

    public function headings(): array
    {
        if($this->formtype == 1){
            return ["SL No", "Full Name", "Email", "Phone No", "Address", "City", "State",'Pin Code', 'Page Referance','Created At'];
        }else{
            return ["SL No", "Full Name", "Email", "Phone No", "Query Type", "Message", "City", "State",'Pin Code', 'Created At'];
        }
    }
}