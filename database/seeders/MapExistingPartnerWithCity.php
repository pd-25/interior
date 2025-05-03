<?php

namespace Database\Seeders;

use App\Models\PartentServiceCity;
use App\Models\Partner;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class MapExistingPartnerWithCity extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*1. Get all partners
        2. Get all cities
        
        */
        $partners = Partner::orderBy('id', 'ASC')->where('created_at', '>=', Carbon::now()->subYears(5))
        ->where('created_at', '<=', Carbon::now())->get();

        foreach ($partners as $partner) {
            // dd($partner->city);
            $city = PartentServiceCity::with('subCities')->where('city_name', $partner->city)->first();
            // dd($city);
            if ($city) {
                $partner->city = $city->id;
                $partner->sub_city_id = $city->subCities->where('sub_city_name', 'All areas')->first()->id ?? null;
                $partner->save();
                Log::info('Partner updated with city: ' . $partner->id);
            }
        }
    }
}
