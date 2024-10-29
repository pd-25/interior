<?php

namespace App\Exports;

use App\Models\Partner;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PartnerExport implements FromCollection, WithHeadings
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
            $booking = Partner::whereBetween('created_at', [$this->fromdate, $this->todate])
                                ->orderBy('id', 'desc')
                                ->get();
                                $finalArray = [];
                                foreach ($booking as $key=>$value) {
                                    $tempArray = [
                                        'id' => $key+1, 
                                        'name' => $value->user->name,
                                        'email' => $value->user->email,
                                        'mobile_no' => $value->user->mobile_no,
                                        'firm_name' => $value->firm_name,
                                        'partner_id' => $value->partner_id,
                                        'firm_pan' => $value->firm_pan,
                                        'firm_gst' => $value->firm_gst,
                                        'city' => $value->city,
                                        'Official_Company_Address' => $value->Official_Company_Address,
                                        'how_many_years' => $value->how_many_years,
                                        'major_category' => $value->major_category,
                                        'minor_category' => $value->minor_category,
                                        'partnerportfolio' => $value->partnerportfolio,
                                        'created_at' => date('d-m-Y h:i A', strtotime($value->created_at)),
                                    ];
                $finalArray[] = $tempArray;
            }

            return collect($finalArray);
        }

    public function headings(): array
    {
        return ["SL No", "Full Name", "Email", "Phone No", "Firm Name", "Partner Code", "PAN", "GST", "City", "Address",'How Many Years', 'Major Category', 'Minor Category', 'Partner Portfolio', 'Created At'];
    }
}