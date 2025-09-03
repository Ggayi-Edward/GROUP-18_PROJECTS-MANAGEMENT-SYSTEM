<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\FakeEquipmentRepository;
use App\Data\FakeFacilityRepository;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipment = FakeEquipmentRepository::all();
        return view('equipment.index', compact('equipment'));
    }

    public function create()
    {
        $facilities = FakeFacilityRepository::all();
        return view('equipment.create', compact('facilities'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Name'        => 'required|string|max:255',
            'Description' => 'nullable|string',
            'Capability'  => 'required|string|max:255',
            'FacilityId'  => 'required|integer',
        ]);

        FakeEquipmentRepository::create($data);
        return redirect()->route('equipment.index')->with('status', 'Equipment created');
    }

    public function show($id)
    {
        $equipment = FakeEquipmentRepository::find($id);
        abort_unless($equipment, 404);
        return view('equipment.show', compact('equipment'));
    }

    public function edit($id)
    {
        $equipment  = FakeEquipmentRepository::find($id);
        abort_unless($equipment, 404);
        $facilities = FakeFacilityRepository::all();
        return view('equipment.edit', compact('equipment', 'facilities'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'Name'        => 'required|string|max:255',
            'Description' => 'nullable|string',
            'Capability'  => 'required|string|max:255',
            'FacilityId'  => 'required|integer',
        ]);

        FakeEquipmentRepository::update($id, $data);
        return redirect()->route('equipment.index')->with('status', 'Equipment updated');
    }

    public function destroy($id)
    {
        FakeEquipmentRepository::delete($id);
        return redirect()->route('equipment.index')->with('status', 'Equipment deleted');
    }
}
