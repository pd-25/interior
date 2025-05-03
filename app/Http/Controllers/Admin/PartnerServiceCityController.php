<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PartentServiceCity;
use Illuminate\Http\Request;

class PartnerServiceCityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.city.index', [
            'cities' => PartentServiceCity::with('subCities')->orderBy('id', 'DESC')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.city.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'city_name' => 'required|string|max:255',
            'city_status' => 'required|boolean',
            'sub_areas' => 'required|array',
            'sub_areas.*.sub_city_name' => 'required|string|max:255',
            'sub_areas.*.sub_city_status' => 'required|boolean',
        ]);

        $city = new PartentServiceCity();
        $city->city_name = $request->input('city_name');
        $city->city_status = $request->input('city_status');
        $city->save();

        // Create the subCities
        $city->subCities()->createMany($request->input('sub_areas'));

        return redirect()->route('service-cities.index')->with('success', 'City created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $city = PartentServiceCity::with('subCities')->findOrFail($id);
        return view('admin.city.edit', [
            'city' => $city,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'city_name' => 'required|string|max:255',
            'city_status' => 'required|boolean',
            'sub_areas' => 'required|array',
            'sub_areas.*.sub_city_name' => 'required|string|max:255',
            'sub_areas.*.sub_city_status' => 'required|boolean',
        ]);

        // Find the city by ID
        $city = PartentServiceCity::findOrFail($id);

        // Update the city details
        $city->city_name = $request->input('city_name');
        $city->city_status = $request->input('city_status');
        $city->save();

        // Update sub-areas
        // First, remove old sub-areas
        $city->subCities()->delete();

        // Add the new sub-areas
        foreach ($request->input('sub_areas') as $subAreaData) {
            $city->subCities()->create([
                'sub_city_name' => $subAreaData['sub_city_name'],
                'sub_city_status' => $subAreaData['sub_city_status'],
            ]);
        }

        return redirect()->route('service-cities.index')->with('success', 'City updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $city = PartentServiceCity::findOrFail($id);
        $city->subCities()->delete(); // Delete related sub-cities
        $city->delete(); // Delete the city itself
        return redirect()->route('service-cities.index')->with('success', 'City Deleted successfully.');
    }
}
