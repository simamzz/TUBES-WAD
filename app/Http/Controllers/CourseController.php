<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Display a listing of the courses
    public function index()
    {
        $courses = Course::all();
        return view('course.index', compact('courses'));
    }

    // Show the form for creating a new course
    public function create()
    {
        return view('course.create');
    }

    // Store a newly created course in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link_meet' => 'required|url',
        ]);

        Course::create($validated);

        return redirect()->route('course.index')->with('success', 'Course created successfully!');
    }

    // Display the specified course
    public function show(Course $course)
    {
        return view('course.show', compact('course'));
    }

    // Show the form for editing the specified course
    public function edit(Course $course)
    {
        return view('course.edit', compact('course'));
    }

    // Update the specified course in storage
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link_meet' => 'required|url',
        ]);

        $course->update($validated);

        return redirect()->route('course.index')->with('success', 'Course updated successfully!');
    }

    // Remove the specified course from storage
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('course.index')->with('success', 'Course deleted successfully!');
    }
}
