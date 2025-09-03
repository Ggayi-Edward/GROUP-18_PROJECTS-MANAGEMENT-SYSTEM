<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\FakeProjectRepository;
use App\Data\FakeProgramRepository;
use App\Data\FakeFacilityRepository;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = FakeProjectRepository::all();

        // Attach Program and Facility objects for easy use in views
        foreach ($projects as $project) {
            $project->Program = $project->ProgramId
                ? FakeProgramRepository::find($project->ProgramId)
                : null;

            $project->Facility = $project->FacilityId
                ? FakeFacilityRepository::find($project->FacilityId)
                : null;
        }

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $programs = FakeProgramRepository::all();
        $facilities = FakeFacilityRepository::all();
        return view('projects.create', compact('programs', 'facilities'));
    }

    public function store(Request $request)
    {
        FakeProjectRepository::create([
            'Name'         => $request->input('name'),
            'Description'  => $request->input('description'),
            'StartDate'    => $request->input('startDate'),
            'EndDate'      => $request->input('endDate'),
            'Status'       => $request->input('status'),
            'ProgramId'    => $request->input('programId'),
            'FacilityId'   => $request->input('facilityId'),
            'Participants' => $request->filled('participants')
                ? array_map('trim', explode(',', $request->input('participants')))
                : [],
            'Outcomes'     => $request->filled('outcomes')
                ? array_map('trim', explode(',', $request->input('outcomes')))
                : [],
        ]);

        return redirect()->route('projects.index')
                         ->with('success', 'Project created successfully.');
    }

    public function show($id)
    {
        $project  = FakeProjectRepository::find($id);
        if (!$project) {
            abort(404, 'Project not found');
        }

        $program  = $project->ProgramId
            ? FakeProgramRepository::find($project->ProgramId)
            : null;

        $facility = $project->FacilityId
            ? FakeFacilityRepository::find($project->FacilityId)
            : null;

        return view('projects.show', compact('project', 'program', 'facility'));
    }

    public function edit($id)
    {
        $project = FakeProjectRepository::find($id);
        if (!$project) {
            abort(404, 'Project not found');
        }

        $programs = FakeProgramRepository::all();
        $facilities = FakeFacilityRepository::all();

        return view('projects.edit', compact('project', 'programs', 'facilities'));
    }

    public function update(Request $request, $id)
    {
        FakeProjectRepository::update($id, [
            'Name'         => $request->input('name'),
            'Description'  => $request->input('description'),
            'StartDate'    => $request->input('startDate'),
            'EndDate'      => $request->input('endDate'),
            'Status'       => $request->input('status'),
            'ProgramId'    => $request->input('programId'),
            'FacilityId'   => $request->input('facilityId'),
            'Participants' => $request->filled('participants')
                ? array_map('trim', explode(',', $request->input('participants')))
                : [],
            'Outcomes'     => $request->filled('outcomes')
                ? array_map('trim', explode(',', $request->input('outcomes')))
                : [],
        ]);

        return redirect()->route('projects.index')
                         ->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        FakeProjectRepository::delete($id);
        return redirect()->route('projects.index')
                         ->with('success', 'Project deleted successfully.');
    }
}
