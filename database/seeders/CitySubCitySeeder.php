<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PartentServiceCity;
use App\Models\SubCities;

class CitySubCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cities data
        $cities = [
            'New Delhi' => [
                'South delhi',
                'North delhi',
                'West delhi',
                'East delhi',
                'Central Delhi',
                'All areas',
            ],
            'Gurugram' => [
                'Sohna road and nearby',
                'Golf course road and nearby',
                'Udyog vihar and nearby',
                'Manesar and nearby',
                'All areas',
            ],
            'Noida' => [
                'Sector 62 and nearby',
                'Sector 18 and nearby',
                'Sector 76 and nearby',
                'Sector 140 and nearby',
                'Greater Noida',
                'All areas',
            ],
            'Faridabad' => [
                'Badkhal and nearby',
                'Central Faridabad, NIT and nearby',
                'Ballabhgarh and nearby',
                'Charms wood village and nearby',
                'All areas',
            ],
        ];

        // Loop through the cities array
        foreach ($cities as $cityName => $subCities) {
            // Check if the city already exists, if not, create it
            $city = PartentServiceCity::firstOrCreate([
                'city_name' => $cityName,
            ], [
                'city_status' => 1, // Assuming all cities are active by default
            ]);

            // Loop through the sub-cities for each city and create them if they don't exist
            foreach ($subCities as $subCityName) {
                SubCities::firstOrCreate([
                    'sub_city_name' => $subCityName,
                    'partent_service_city_id' => $city->id,
                ], [
                    'sub_city_status' => 1, // Assuming all sub-cities are active by default
                ]);
            }
        }

        // Output to confirm seeding
        $this->command->info('Cities and Sub-Cities have been seeded successfully!');
    }
}
