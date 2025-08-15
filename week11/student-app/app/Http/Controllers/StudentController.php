<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $students = Student::all();
            return view('students.index', compact('students'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Unable to load students. Please try again.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        try {
            Student::create($request->validated());
            return redirect()->route('students.index')->with('success', 'Student created successfully!');
        } catch (Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create student. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        try {
            return view('students.show', compact('student'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('students.index')->with('error', 'Student not found.');
        } catch (Exception $e) {
            return redirect()->route('students.index')->with('error', 'Unable to display student details.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        try {
            return view('students.edit', compact('student'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('students.index')->with('error', 'Student not found.');
        } catch (Exception $e) {
            return redirect()->route('students.index')->with('error', 'Unable to edit student.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        try {
            $student->update($request->validated());
            return redirect()->route('students.show', $student->id)->with('success', 'Student updated successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('students.index')->with('error', 'Student not found.');
        } catch (Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update student. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        try {
            $studentName = $student->fname . ' ' . $student->lname;
            $student->delete();
            return redirect()->route('students.index')->with('success', "Student {$studentName} deleted successfully!");
        } catch (ModelNotFoundException $e) {
            return redirect()->route('students.index')->with('error', 'Student not found.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete student. Please try again.');
        }
    }
}
