<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notification::all();
        return view('notifications.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $notification = Notification::create($request->all());
        return redirect()->route('notifications.index')->with('success', 'Notification created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('notifications.show', compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('notifications.edit', compact('notification'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $notification->update($request->all());
        return redirect()->route('notifications.index')->with('success', 'Notification updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notification->delete();
        return redirect()->route('notifications.index')->with('success', 'Notification deleted successfully!');
    }
}
