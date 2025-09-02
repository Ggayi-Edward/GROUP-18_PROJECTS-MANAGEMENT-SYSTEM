<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\FakeServiceRepository;

class ServiceController extends Controller
{
    public function index()
    {
        $services = FakeServiceRepository::all();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        FakeServiceRepository::create([
            'Name' => $request->input('name'),
            'Description' => $request->input('description'),
            'Category' => $request->input('category'),
            'DeliveryMode' => $request->input('deliveryMode'),
            'TargetGroups' => array_map('trim', explode(',', $request->input('targetGroups'))),
        ]);
        return redirect()->route('services.index');
    }

    public function show($id)
    {
        $service = FakeServiceRepository::find($id);
        return view('services.show', compact('service'));
    }

    public function edit($id)
    {
        $service = FakeServiceRepository::find($id);
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        FakeServiceRepository::update($id, [
            'Name' => $request->input('name'),
            'Description' => $request->input('description'),
            'Category' => $request->input('category'),
            'DeliveryMode' => $request->input('deliveryMode'),
            'TargetGroups' => array_map('trim', explode(',', $request->input('targetGroups'))),
        ]);
        return redirect()->route('services.index');
    }

    public function destroy($id)
    {
        FakeServiceRepository::delete($id);
        return redirect()->route('services.index');
    }
}
