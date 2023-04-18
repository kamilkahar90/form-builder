<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submissions = Submission::all();

        return view('submissions.index', compact('submissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $forms = Form::all();

        return view('submissions.create', compact('forms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $submission = Submission::create([
            'form_id' => $request->form_id,
            'user_id' => Auth::id(),
        ]);

        $fields = Form::find($request->form_id)->fields;

        foreach ($fields as $field) {
            $submission->values()->create([
                'field_id' => $field->id,
                'value' => $request->input('field_' . $field->id),
            ]);
        }

        return redirect()->route('submissions.index')->with('success', 'Submission created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Submission $submission)
    {
        return view('submissions.show', compact('submission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Submission $submission)
    {
        $forms = Form::all();

        return view('submissions.edit', compact('submission', 'forms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Submission $submission)
    {
        $submission->update([
            'form_id' => $request->form_id,
        ]);

        $fields = Form::find($request->form_id)->fields;

        foreach ($fields as $field) {
            $submission->values()->updateOrCreate(
                ['field_id' => $field->id],
                ['value' => $request->input('field_' . $field->id)]
            );
        }

        return redirect()->route('submissions.show', $submission)->with('success', 'Submission updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submission)
    {
        $submission->delete();

        return redirect()->route('submissions.index')->with('success', 'Submission deleted successfully.');
    }
}
