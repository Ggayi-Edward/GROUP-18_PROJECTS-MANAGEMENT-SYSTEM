<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\FakeParticipantRepository;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = FakeParticipantRepository::all();
        return view('participants.index', compact('participants'));
    }

    public function create()
    {
        return view('participants.create');
    }

    public function store(Request $request)
    {
        FakeParticipantRepository::create([
            'FirstName' => $request->input('firstName'),
            'LastName' => $request->input('lastName'),
            'Email' => $request->input('email'),
            'Phone' => $request->input('phone'),
            'Role' => $request->input('role'),
            'Affiliation' => $request->input('affiliation'),
        ]);
        return redirect()->route('participants.index');
    }

    public function show($id)
    {
        $participant = FakeParticipantRepository::find($id);
        return view('participants.show', compact('participant'));
    }

    public function edit($id)
    {
        $participant = FakeParticipantRepository::find($id);
        return view('participants.edit', compact('participant'));
    }

    public function update(Request $request, $id)
    {
        FakeParticipantRepository::update($id, [
            'FirstName' => $request->input('firstName'),
            'LastName' => $request->input('lastName'),
            'Email' => $request->input('email'),
            'Phone' => $request->input('phone'),
            'Role' => $request->input('role'),
            'Affiliation' => $request->input('affiliation'),
        ]);
        return redirect()->route('participants.index');
    }

    public function destroy($id)
    {
        FakeParticipantRepository::delete($id);
        return redirect()->route('participants.index');
    }
}
