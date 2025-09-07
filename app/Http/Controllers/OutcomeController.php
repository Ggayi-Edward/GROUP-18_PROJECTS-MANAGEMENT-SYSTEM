<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\FakeOutcomeRepository;
use App\Data\FakeProjectRepository;

class OutcomeController extends Controller
{
    // List all outcomes, optionally for a specific project
    public function index($projectId = null)
    {
        $outcomes = $projectId
            ? FakeOutcomeRepository::forProject($projectId)
            : FakeOutcomeRepository::all();

        $outcomes = collect($outcomes);

        return view('outcomes.index', compact('outcomes', 'projectId'));
    }

    // Show a single outcome
    public function show($id)
    {
        $outcome = FakeOutcomeRepository::find($id);
        abort_unless($outcome, 404);

        $projects = FakeProjectRepository::all();

        return view('outcomes.show', compact('outcome', 'projects'));
    }

    // Show create form
    public function create()
    {
        $projects = FakeProjectRepository::all();
        return view('outcomes.create', compact('projects'));
    }

    // Store new outcome with file upload support
    public function store(Request $request)
    {
        $data = $request->validate([
            'ProjectId'           => 'required|integer',
            'Type'                => 'required|string|max:255',
            'CertificationStatus' => 'nullable|string|max:255',
            'Commercialization'   => 'nullable|string|max:255',
            'FilePath'            => 'nullable|file|mimes:pdf,doc,docx,xlsx,png,jpg,jpeg',
            'Description'         => 'nullable|string',
        ]);

        if ($request->hasFile('FilePath')) {
            $file = $request->file('FilePath');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/artifacts', $filename);
            $data['FilePath'] = 'storage/artifacts/' . $filename;
        }

        FakeOutcomeRepository::create($data);

        return redirect()->route('outcomes.index')
                         ->with('status', 'Outcome added successfully');
    }

    // Edit outcome
    public function edit($id)
    {
        $outcome = FakeOutcomeRepository::find($id);
        abort_unless($outcome, 404);

        $projects = FakeProjectRepository::all();
        return view('outcomes.edit', compact('outcome', 'projects'));
    }

    // Update outcome with file upload support
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'ProjectId'           => 'required|integer',
            'Type'                => 'required|string|max:255',
            'CertificationStatus' => 'nullable|string|max:255',
            'Commercialization'   => 'nullable|string|max:255',
            'FilePath'            => 'nullable|file|mimes:pdf,doc,docx,xlsx,png,jpg,jpeg',
            'Description'         => 'nullable|string',
        ]);

        if ($request->hasFile('FilePath')) {
            $file = $request->file('FilePath');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/artifacts', $filename);
            $data['FilePath'] = 'storage/artifacts/' . $filename;
        }

        FakeOutcomeRepository::update($id, $data);

        return redirect()->route('outcomes.index')
                         ->with('status', 'Outcome updated');
    }

    // Delete outcome
    public function destroy($id)
    {
        $outcome = FakeOutcomeRepository::find($id);
        abort_unless($outcome, 404);

        FakeOutcomeRepository::delete($id);

        return redirect()->route('outcomes.index')
                         ->with('status', 'Outcome deleted');
    }
}
