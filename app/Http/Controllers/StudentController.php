<?php

namespace App\Http\Controllers;

use App\Models\AttendanceDate;
use App\Models\Event;
use App\Models\Student;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class StudentController extends Controller
{
    public function showAllStudents() {
        $students = Student::all();
        $events = Event::all();
        $dates  = AttendanceDate::all();
        return view('main', compact(['students','events','dates']));
    }
    public function addStudent(Request $request) {
        // Validate the form data
        $request->validate([
            'student_name' => 'required|string|max:255',
            'mobile' => 'sometimes|string|max:20|unique:students,mobile',
            'email' => 'sometimes|email|max:255|unique:students,email',
            'event_id' => 'required|integer', // Assuming event_id is an integer
        ]);

        $student = new Student([
            'name' => $request->student_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'event_id' => $request->event_id,
        ]);

        $student->save();

        return redirect()->back()->with('student_message', 'Student added successfully');
    }

    public function getStudentsByEvent($eventId) {
        $students = Student::where('event_id', $eventId)->get();
        return response()->json($students);
    }

}
