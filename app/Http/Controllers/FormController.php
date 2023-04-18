<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forms = Form::all();

        return view('forms.index', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form = Form::create($request->all());

        return redirect()->route('forms.show', $form);
    }

    /**
     * Display the specified resource.
     */
    public function show(Form $form)
    {
        $fields = $form->fields;

        return view('forms.show', compact('form', 'fields'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Form $form)
    {
        return view('forms.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Form $form)
    {
        $form->update($request->all());

        return redirect()->route('forms.show', $form);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Form $form)
    {
        $form->delete();

        return redirect()->route('forms.index');
    }
}
