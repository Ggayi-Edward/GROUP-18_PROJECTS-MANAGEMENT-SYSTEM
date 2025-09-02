<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\FakeProjectRepository;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = FakeProjectRepository::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        FakeProjectRepository::create([
            'Name' => $request->input('name'),
            'Description' => $request->input('description'),
            'StartDate' => $request->input('startDate'),
            'EndDate' => $request->input('endDate'),
            'Status' => $request->input('status'),
            'ProgramId' => $request->input('programId'),
            'Participants' => array_map('trim', explode(',', $request->input('participants'))),
            'Outcomes' => array_map('trim', explode(',', $request->input('outcomes'))),
        ]);
        return redirect()->route('projects.index');
    }

    public function show($id)
    {
        $project = FakeProjectRepository::find($id);
        return view('projects.show', compact('project'));
    }

    public function edit($id)
    {
        $project = FakeProjectRepository::find($id);
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        FakeProjectRepository::update($id, [
            'Name' => $request->input('name'),
            'Description' => $request->input('description'),
            'StartDate' => $request->input('startDate'),
            'EndDate' => $request->input('endDate'),
            'Status' => $request->input('status'),
            'ProgramId' => $request->input('programId'),
            'Participants' => array_map('trim', explode(',', $request->input('participants'))),
            'Outcomes' => array_map('trim', explode(',', $request->input('outcomes'))),
        ]);
        return redirect()->route('projects.index');
    }

    public function destroy($id)
    {
        FakeProjectRepository::delete($id);
        return redirect()->route('projects.index');
    }
}
