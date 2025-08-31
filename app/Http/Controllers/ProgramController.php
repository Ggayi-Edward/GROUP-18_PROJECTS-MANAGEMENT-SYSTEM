<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\FakeProgramRepository;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = FakeProgramRepository::all();
        return view('programs.index', compact('programs'));
    }

    public function create()
    {
        return view('programs.create');
    }

    public function store(Request $request)
    {
        FakeProgramRepository::create([
    'Name' => $request->input('Name'),
    'Description' => $request->input('Description'),
    'NationalAlignment' => $request->input('NationalAlignment'),
    'FocusAreas' => array_map('trim', explode(',', $request->input('FocusAreas'))),
    'Phases' => array_map('trim', explode(',', $request->input('Phases'))),
]);
    }

    public function show($id)
    {
        $program = FakeProgramRepository::find($id);
        return view('programs.show', compact('program'));
    }

    public function edit($id)
    {
        $program = FakeProgramRepository::find($id);
        return view('programs.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        FakeProgramRepository::update($id, [
            'Name' => $request->input('name'),
            'Description' => $request->input('description'),
            'NationalAlignment' => $request->input('nationalAlignment'),
            'FocusAreas' => array_map('trim', explode(',', $request->input('focusAreas'))),
            'Phases' => array_map('trim', explode(',', $request->input('phases'))),
        ]);
        return redirect()->route('programs.index');
    }

    public function destroy($id)
    {
        FakeProgramRepository::delete($id);
        return redirect()->route('programs.index');
    }
}
