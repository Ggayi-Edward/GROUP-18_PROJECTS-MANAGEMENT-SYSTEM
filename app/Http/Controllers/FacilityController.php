<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\FakeFacilityRepository;

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
        return redirect()->route('facilities.index');
    }

    public function show($id)
    {
        $facility = FakeFacilityRepository::find($id);
        return view('facilities.show', compact('facility'));
    }

    public function edit($id)
    {
        $facility = FakeFacilityRepository::find($id);
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
        return redirect()->route('facilities.index');
    }

    public function destroy($id)
    {
        FakeFacilityRepository::delete($id);
        return redirect()->route('facilities.index');
    }
}
