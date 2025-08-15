<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Http\Requests\StoreProfessorRequest;
use App\Http\Requests\UpdateProfessorRequest;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $professors = Professor::latest()->paginate(10);
            return view('professors.index', compact('professors'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error loading professors: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('professors.create');
        } catch (\Exception $e) {
            return redirect()->route('professors.index')->with('error', 'Error loading create form: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfessorRequest $request)
    {
        try {
            Professor::create($request->validated());
            return redirect()->route('professors.index')->with('success', 'Professor created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error creating professor: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Professor $professor)
    {
        try {
            return view('professors.show', compact('professor'));
        } catch (\Exception $e) {
            return redirect()->route('professors.index')->with('error', 'Error loading professor: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Professor $professor)
    {
        try {
            return view('professors.edit', compact('professor'));
        } catch (\Exception $e) {
            return redirect()->route('professors.index')->with('error', 'Error loading edit form: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfessorRequest $request, Professor $professor)
    {
        try {
            $professor->update($request->validated());
            return redirect()->route('professors.index')->with('success', 'Professor updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error updating professor: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professor $professor)
    {
        try {
            $professor->delete();
            return redirect()->route('professors.index')->with('success', 'Professor deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting professor: ' . $e->getMessage());
        }
    }
}
