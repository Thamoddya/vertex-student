<?php

namespace App\Http\Controllers;

use App\Models\AttendanceDate;
use App\Models\Event;
use App\Models\Role;
use App\Models\Student;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class StudentController extends Controller
{
    public function showAllStudents() {
        $today = now()->toDateString();
        $nearestLecture = AttendanceDate::where('lecture_date', '>=', $today)
            ->orderBy('lecture_date', 'asc')
            ->first();
        $students = Student::all();
        $events = Event::all();
        $attendanceDate = AttendanceDate::all();
        $formattedEvents = [];
        foreach ($events as $event) {
            $constraint = $event->started_date >= now() ? 'availableForMeeting' : 'unavailableForMeeting';
            $formattedEvents[] = [
                'title' => $event->event_name,
                'start' => $event->started_date,
                'end' => $event->started_date, // Add 'ended_date' field if you have it
                'constraint'=>$constraint,
                'color'=>'#07f4bd'
            ];
        }
        foreach ($attendanceDate as $attendance) {
            $constraint = $attendance->started_date >= now() ? 'availableForMeeting' : 'unavailableForMeeting';
            $formattedEvents[] = [
                'title' => $attendance->day_name,
                'start' => $attendance->lecture_date,
                'end' => $attendance->lecture_date, // Add 'ended_date' field if you have it
                'constraint'=>$constraint,
                'color'=>'#07f4bd'
            ];
        }

        $dates  = AttendanceDate::all();
        $user  = \Auth::user();
        $userRole = $user->role;

        $roles = Role::all();
        $users = User::all();
        $siteDate = [
            'studentCount' => Student::count(),
            'eventCount' => Event::count(),
            'events' => $formattedEvents,
            'userData'=>\Auth::user(),
            'userRole'=>$userRole->name,
            'upcomingEvent' =>$nearestLecture,
            'users'=>$users,
            'role'=>$roles
        ];
        return view('main', compact(['students','events','dates','siteDate']));
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
