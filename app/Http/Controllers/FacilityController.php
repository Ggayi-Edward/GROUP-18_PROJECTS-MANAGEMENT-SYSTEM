<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\FakeFacilityRepository;
use App\Data\FakeServiceRepository;
use App\Data\FakeEquipmentRepository;
use App\Data\FakeProjectRepository;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = FakeFacilityRepository::all();
        return view('facilities.index', compact('facilities'));
    }

    public function create()
    {
        return view('facilities.create');
    }

    public function store(Request $request)
    {
        FakeFacilityRepository::create([
            'Name' => $request->input('name'),
            'Location' => $request->input('location'),
            'Description' => $request->input('description'),
            'PartnerOrganization' => $request->input('partnerOrganization'),
            'FacilityType' => $request->input('facilityType'),
            'Capabilities' => array_map('trim', explode(',', $request->input('capabilities'))),
        ]);

        return redirect()->route('facilities.index')
                         ->with('success', 'Facility created successfully.');
    }

    public function show($id)
    {
        $facility = FakeFacilityRepository::find($id);

        if (!$facility) {
            abort(404, "Facility not found");
        }

        // Load related entities
        $services  = FakeServiceRepository::forFacility($id);
        $equipment = FakeEquipmentRepository::forFacility($id);
        $projects  = FakeProjectRepository::forFacility($id);

        return view('facilities.show', compact('facility', 'services', 'equipment', 'projects'));
    }

    public function edit($id)
    {
        $facility = FakeFacilityRepository::find($id);

        if (!$facility) {
            abort(404, "Facility not found");
        }

        return view('facilities.edit', compact('facility'));
    }

    public function update(Request $request, $id)
    {
        FakeFacilityRepository::update($id, [
            'Name' => $request->input('name'),
            'Location' => $request->input('location'),
            'Description' => $request->input('description'),
            'PartnerOrganization' => $request->input('partnerOrganization'),
            'FacilityType' => $request->input('facilityType'),
            'Capabilities' => array_map('trim', explode(',', $request->input('capabilities'))),
        ]);

        return redirect()->route('facilities.index')
                         ->with('success', 'Facility updated successfully.');
    }

    public function destroy($id)
    {
        FakeFacilityRepository::delete($id);

        return redirect()->route('facilities.index')
                         ->with('success', 'Facility deleted successfully.');
    }
}
