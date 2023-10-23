<?php

namespace App\Http\Controllers;

use App\Models\AttendanceDate;
use Illuminate\Http\Request;

class DateController extends Controller
{
    public function addDate(Request $request)
    {
        AttendanceDate::create([
            'day_name'=>$request->date_name,
            'lecture_date'=>$request->date,
        ]);
        return redirect()->back()->with('dateMessage', 'Email sent successfully.');
    }

}
