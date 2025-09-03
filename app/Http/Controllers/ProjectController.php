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
            'Participants' => array_filter(array_map('trim', explode(',', $request->input('participants', '')))),
            'Outcomes'     => array_filter(array_map('trim', explode(',', $request->input('outcomes', '')))),
        ]);

        return redirect()->route('projects.index');
    }

    public function show($id)
    {
        $project   = FakeProjectRepository::find($id);
        $program   = $project && $project->ProgramId 
                        ? FakeProgramRepository::find($project->ProgramId) 
                        : null;
        $facility  = $project && $project->FacilityId 
                        ? FakeFacilityRepository::find($project->FacilityId) 
                        : null;

        return view('projects.show', compact('project', 'program', 'facility'));
    }

    public function edit($id)
    {
        $project    = FakeProjectRepository::find($id);
        $programs   = FakeProgramRepository::all();
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
            'Participants' => array_filter(array_map('trim', explode(',', $request->input('participants', '')))),
            'Outcomes'     => array_filter(array_map('trim', explode(',', $request->input('outcomes', '')))),
        ]);

        return redirect()->route('projects.index');
    }

    public function destroy($id)
    {
        FakeProjectRepository::delete($id);
        return redirect()->route('projects.index');
    }
}
