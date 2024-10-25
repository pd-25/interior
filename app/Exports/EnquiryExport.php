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
    
    public function __construct($from_date, $to_date) 
    {
        $this->fromdate = $from_date;
        $this->todate = $to_date;
    }

    public function collection()
    {
        $fromDate = Carbon::parse($this->fromdate)->startOfDay();
        $toDate = Carbon::parse($this->todate)->endOfDay();
        
        $booking = Enquries::whereBetween('created_at', [$fromDate, $toDate])
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
                'type_query' => $value->type_query,
                'page_ref' => $value->page_ref,
                'created_at' => date('d-m-Y h:i A', strtotime($value->created_at)),
            ];
            $finalArray[] = $tempArray;
        }
        return collect($finalArray);
    }

    public function headings(): array
    {
        return ["SL No", "Full Name", "Email", "Phone No", "Address", "Type Query", "Page Referance", 'Created At'];
    }
}