<?php

namespace App\Http\Controllers;

use App\Models\StudentHasAttendance;
use Illuminate\Http\Request;

class StudentHasAttendanceController extends Controller
{
    public function addAttendance(Request $request) {
        $request->validate([
            'student_id' => 'required|integer',
            'day_id' => 'required|integer',
        ]);

        $attendance = new StudentHasAttendance([
            'student_id' => $request->student_id,
            'day_id' => $request->day_id,
        ]);

        $attendance->save();
        return redirect()->back()->with('attendanceMessage', 'Attendance Marked successfully');
    }
}
