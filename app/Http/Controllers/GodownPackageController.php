<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Godown_package;

class GodownPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $godownPackages = Godown_package::all();
        return view('godown_packages.index', compact('godownPackages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('godown_packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'tracking_id' => 'required|string|max:255',
            'godown' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'row' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'status' => 'string|in:not taken,taken',
        ]);

        // Create a new Godown_package instance
        Godown_package::create($validatedData);

        // Redirect to the index route with success message
        return redirect()->route('godown_packages.index')->with('success', 'Godown package created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Godown_package  $godown_package
     * @return \Illuminate\View\View
     */
    public function show(Godown_package $godown_package)
    {
        return view('godown_packages.show', compact('godown_package'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Godown_package  $godown_package
     * @return \Illuminate\View\View
     */
    public function edit(Godown_package $godown_package)
    {
        return view('godown_packages.edit', compact('godown_package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Godown_package  $godown_package
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Godown_package $godown_package)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'tracking_id' => 'required|string|max:255',
            'godown' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'row' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'status' => 'required|string|in:not taken,loaded,taken',
        ]);

        // Update the Godown_package instance
        $godown_package->update($validatedData);

        // Redirect to the index route with success message
        return redirect()->route('godown_packages.index')->with('success', 'Godown package updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Godown_package  $godown_package
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Godown_package $godown_package)
    {
        // Delete the Godown_package instance
        $godown_package->delete();

        // Redirect to the index route with success message
        return redirect()->route('godown_packages.index')->with('success', 'Godown package deleted successfully.');
    }
}
