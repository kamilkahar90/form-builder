<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workflow;

class WorkflowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workflows = Workflow::all();

        return view('workflows.index', compact('workflows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('workflows.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $workflow = Workflow::create($validated);

        return redirect()->route('workflows.show', $workflow);
    }

    /**
     * Display the specified resource.
     */
    public function show(Workflow $workflow)
    {
        return view('workflows.show', compact('workflow'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workflow $workflow)
    {
        return view('workflows.edit', compact('workflow'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Workflow $workflow)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $workflow->update($validated);

        return redirect()->route('workflows.show', $workflow);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workflow $workflow)
    {
        $workflow->delete();

        return redirect()->route('workflows.index');
    }
}
