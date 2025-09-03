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

        // attach program & facility objects for display convenience
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

    public function create(Request $request)
    {
        // ensure we pass the variables the view expects
        $programs = FakeProgramRepository::all();
        $facilities = FakeFacilityRepository::all();

        // optional preselect from query string: /projects/create?programId=1
        $preselectedProgramId = $request->query('programId', null);
        $preselectedFacilityId = $request->query('facilityId', null);

        return view('projects.create', compact('programs', 'facilities', 'preselectedProgramId', 'preselectedFacilityId'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'startDate' => 'nullable|date',
            'endDate' => 'nullable|date',
            'status' => 'nullable|string',
            'programId' => 'required|integer',
            'facilityId' => 'required|integer',
            'participants' => 'nullable|string',
            'outcomes' => 'nullable|string',
        ]);

        FakeProjectRepository::create([
            'Name' => $data['name'],
            'Description' => $data['description'] ?? '',
            'StartDate' => $data['startDate'] ?? null,
            'EndDate' => $data['endDate'] ?? null,
            'Status' => $data['status'] ?? 'Planned',
            'ProgramId' => $data['programId'],
            'FacilityId' => $data['facilityId'],
            'Participants' => $data['participants'] ? array_filter(array_map('trim', explode(',', $data['participants']))) : [],
            'Outcomes' => $data['outcomes'] ? array_filter(array_map('trim', explode(',', $data['outcomes']))) : [],
        ]);

        return redirect()->route('projects.index')->with('success', 'Project created.');
    }

    public function show($id)
    {
        $project = FakeProjectRepository::find($id);
        if (!$project) abort(404, 'Project not found');

        $program = $project->ProgramId ? FakeProgramRepository::find($project->ProgramId) : null;
        $facility = $project->FacilityId ? FakeFacilityRepository::find($project->FacilityId) : null;

        return view('projects.show', compact('project', 'program', 'facility'));
    }

    public function edit($id)
    {
        $project = FakeProjectRepository::find($id);
        if (!$project) abort(404, 'Project not found');

        $programs = FakeProgramRepository::all();
        $facilities = FakeFacilityRepository::all();

        return view('projects.edit', compact('project', 'programs', 'facilities'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'startDate' => 'nullable|date',
            'endDate' => 'nullable|date',
            'status' => 'nullable|string',
            'programId' => 'required|integer',
            'facilityId' => 'required|integer',
            'participants' => 'nullable|string',
            'outcomes' => 'nullable|string',
        ]);

        FakeProjectRepository::update($id, [
            'Name' => $data['name'],
            'Description' => $data['description'] ?? '',
            'StartDate' => $data['startDate'] ?? null,
            'EndDate' => $data['endDate'] ?? null,
            'Status' => $data['status'] ?? 'Planned',
            'ProgramId' => $data['programId'],
            'FacilityId' => $data['facilityId'],
            'Participants' => $data['participants'] ? array_filter(array_map('trim', explode(',', $data['participants']))) : [],
            'Outcomes' => $data['outcomes'] ? array_filter(array_map('trim', explode(',', $data['outcomes']))) : [],
        ]);

        return redirect()->route('projects.index')->with('success', 'Project updated.');
    }

    public function destroy($id)
    {
        FakeProjectRepository::delete($id);
        return redirect()->route('projects.index')->with('success', 'Project deleted.');
    }
}
