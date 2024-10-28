<?php

namespace App\Exports;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomerExport implements FromCollection, WithHeadings
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
        // $fromDate = Carbon::parse($this->fromdate)->startOfDay();
        // $toDate = Carbon::parse($this->todate)->endOfDay();
            $booking = User::where('type', 'user')->whereBetween('created_at', [$this->fromdate, $this->todate])
                                ->orderBy('id', 'desc')
                                ->get();
                                $finalArray = [];
                                foreach ($booking as $key=>$value) {
                                    $tempArray = [
                                        'id' => $key+1, 
                                        'name' => $value->name,
                                        'email' => $value->email,
                                        'mobile_no' => $value->mobile_no,
                                        'occupation' => $value->occupation,
                                        'city' => $value->city,
                                        'state' => $value->state,
                                        'country' => $value->country,
                                        'created_at' => date('d-m-Y h:i A', strtotime($value->created_at)),
                                    ];
                $finalArray[] = $tempArray;
            }

            return collect($finalArray);
        }

    public function headings(): array
    {
        return ["SL No", "Full Name", "Email", "Phone No", "Occupation", "City", "State",'Country', 'Created At'];
    }
}