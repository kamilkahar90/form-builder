<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fields = Field::all();

        return view('fields.index', compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fields.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'form_id' => 'required|integer',
            'label' => 'required|string',
            'type' => 'required|string',
            'validation' => 'nullable|string',
            'options' => 'nullable|string',
            'is_required' => 'required|boolean',
        ]);

        $field = Field::create($validatedData);

        return redirect()->route('fields.show', $field->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Field $field)
    {
        return view('fields.show', compact('field'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Field $field)
    {
        return view('fields.edit', compact('field'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Field $field)
    {
        $validatedData = $request->validate([
            'form_id' => 'required|integer',
            'label' => 'required|string',
            'type' => 'required|string',
            'validation' => 'nullable|string',
            'options' => 'nullable|string',
            'is_required' => 'required|boolean',
        ]);

        $field->update($validatedData);

        return redirect()->route('fields.show', $field->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Field $field)
    {
        $field->delete();

        return redirect()->route('fields.index');
    }
}
