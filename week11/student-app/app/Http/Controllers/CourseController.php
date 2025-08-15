<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $courses = Course::all();
            return view('courses.index', compact('courses'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Unable to load courses. Please try again.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        try {
            Course::create($request->validated());
            return redirect()->route('courses.index')->with('success', 'Course created successfully!');
        } catch (Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create course. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        try {
            return view('courses.show', compact('course'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('courses.index')->with('error', 'Course not found.');
        } catch (Exception $e) {
            return redirect()->route('courses.index')->with('error', 'Unable to display course details.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        try {
            return view('courses.edit', compact('course'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('courses.index')->with('error', 'Course not found.');
        } catch (Exception $e) {
            return redirect()->route('courses.index')->with('error', 'Unable to edit course.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        try {
            $course->update($request->validated());
            return redirect()->route('courses.show', $course->id)->with('success', 'Course updated successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('courses.index')->with('error', 'Course not found.');
        } catch (Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update course. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        try {
            $courseName = $course->name;
            $course->delete();
            return redirect()->route('courses.index')->with('success', "Course {$courseName} deleted successfully!");
        } catch (ModelNotFoundException $e) {
            return redirect()->route('courses.index')->with('error', 'Course not found.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete course. Please try again.');
        }
    }
}
