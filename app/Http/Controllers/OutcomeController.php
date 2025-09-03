<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\FakeOutcomeRepository;
use App\Data\FakeProjectRepository;

class OutcomeController extends Controller
{
    public function index()
    {
        $outcomes = FakeOutcomeRepository::all();
        return view('outcomes.index', compact('outcomes'));
    }

    public function create()
    {
        $projects = FakeProjectRepository::all(); // needed for dropdown
        return view('outcomes.create', compact('projects'));
    }

    public function store(Request $request)
    {
        FakeOutcomeRepository::create([
            'Title'        => $request->input('title'),
            'Description'  => $request->input('description'),
            'ArtifactLink' => $request->input('artifactLink'),
            'ProjectId'    => $request->input('projectId'),
        ]);

        return redirect()->route('outcomes.index')
                         ->with('success', 'Outcome created successfully.');
    }

    public function show($id)
    {
        $outcome = FakeOutcomeRepository::find($id);
        if (!$outcome) abort(404, 'Outcome not found');
        $project = $outcome->ProjectId ? FakeProjectRepository::find($outcome->ProjectId) : null;
        return view('outcomes.show', compact('outcome', 'project'));
    }

    public function edit($id)
    {
        $outcome = FakeOutcomeRepository::find($id);
        if (!$outcome) abort(404, 'Outcome not found');
        $projects = FakeProjectRepository::all();
        return view('outcomes.edit', compact('outcome', 'projects'));
    }

    public function update(Request $request, $id)
    {
        FakeOutcomeRepository::update($id, [
            'Title'        => $request->input('title'),
            'Description'  => $request->input('description'),
            'ArtifactLink' => $request->input('artifactLink'),
            'ProjectId'    => $request->input('projectId'),
        ]);

        return redirect()->route('outcomes.index')
                         ->with('success', 'Outcome updated successfully.');
    }

    public function destroy($id)
    {
        FakeOutcomeRepository::delete($id);
        return redirect()->route('outcomes.index')
                         ->with('success', 'Outcome deleted successfully.');
    }
}
