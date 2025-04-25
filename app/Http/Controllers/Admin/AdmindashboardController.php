<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdmindashboardController extends Controller
{
    function dashboard()
    {
        // $data['bookings'] = Booking::all();
        // dd($data['bookings']);
        $bookings = Booking::groupBy('city')->selectRaw('count(*) as total, city')->orderBy('city')->get();
        $bookingService = Booking::all();
        $tempArray = array();
        foreach ($bookingService as $key => $value) {
            $value->service = json_decode($value->service);
            array_push($tempArray, $value);
        }
        // var_dump($tempArray);
        // exit;
        $groupedData = collect($tempArray)->groupBy('service')->map(function ($group) {
            return $group->groupBy(function ($item) {
                return count($item['service'] ?? []);
            });
        });

        // $serviceName = array();
        // $servicerequest = array();
        // foreach ($groupedData as $key => $valueLL) {
        //     foreach ($valueLL as $keyop => $valueop) {
        //        $servicerequest[$key.'/'.$keyop] = $valueop->count();
        //     }
        //     //array_push($servicerequest, $test);

        //     $key = strtoupper(str_replace("_", " ", $key));
        //     array_push($serviceName, $key);
        // }

        // $serviceCount = [];
        // foreach ($servicerequest as $key => $value) {
        //     list($service, $id) = explode('/', $key);
        //     if (!isset($serviceCount[$service])) {
        //         $serviceCount[$service] = 0;
        //     }
        //     $serviceCount[$service] += $value;
        // }

        // $data['serviceName'] = $serviceName;
        // $data['serviceCount'] = $serviceCount;
        $serviceRequests = DB::select("
                                        SELECT 
                                            MONTH(b.date) AS month,
                                            JSON_UNQUOTE(JSON_EXTRACT(b.service, CONCAT('$[', n.n, ']'))) AS service_name,
                                            COUNT(*) AS total_requests
                                        FROM bookings b
                                        JOIN (
                                            SELECT 0 AS n UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 
                                            UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9
                                        ) AS n
                                        ON JSON_VALID(b.service) AND JSON_LENGTH(b.service) > n.n
                                        WHERE YEAR(b.date) = YEAR(CURDATE())
                                        GROUP BY month, service_name
                                        ORDER BY month, total_requests DESC
                                    ");

        $grouped = [];

        foreach ($serviceRequests as $item) {
            $month = date("F", mktime(0, 0, 0, $item->month, 1));
            $grouped[$item->service_name][$month] = $item->total_requests;
        }

        // Fill 0s for missing months
        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        $finalData = [];
        foreach ($grouped as $service => $monthData) {
            $data = [];
            foreach ($months as $m) {
                $data[] = $monthData[$m] ?? 0;
            }
            $finalData[] = [
                'label' => ucfirst($service),
                'data' => $data,
                'borderWidth' => 2
            ];
        }

        $data['serviceRequestMonths'] = $months;
        $data['serviceRequestCounts'] = $finalData;
        $finalCitys = array();
        $TotalCounts = array();
        foreach ($bookings  as $key => $value) {
            array_push($finalCitys, $value->city);
            array_push($TotalCounts, $value->total);
        }
        $data['finalCitys'] = $finalCitys;
        $data['TotalCounts'] = $TotalCounts;
        //Patner list
        $userscount = DB::table('users')
            ->select(
                DB::raw('MONTH(created_at) AS month'),
                DB::raw('COUNT(*) as total')
            )
            ->where('type', 'partner')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $monthMap = [];
        foreach ($userscount as $entry) {
            $monthName = date("F", mktime(0, 0, 0, $entry->month, 1));
            $monthMap[$monthName] = $entry->total;
        }

        // Ensure all months are included
        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        $finalTotalMonth = $months;
        $TotaluserCounts = [];

        foreach ($months as $month) {
            $TotaluserCounts[] = $monthMap[$month] ?? 0;
        }

        $data['finalTotalMonth'] = $finalTotalMonth;
        $data['TotaluserCounts'] = $TotaluserCounts;
        // dd($data);
        return view('admin.dashboard.dashboard', compact('data'));
    }
}
