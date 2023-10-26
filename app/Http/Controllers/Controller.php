<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamStoreRequest;
use App\Mail\teamMail;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function sendUserEmail(Request $request)
    {
        $mailData = [
            'title' => 'Mail From Vertex Co.',
            'message' => $request->message,
        ];
        Mail::to($request->email)->send(new teamMail($mailData));
        return redirect()->back()->with('success', 'Message sent successfully.');
    }

    public function addTeamMember(Request $request){
//        dd($request);
//    $validated = $request->validated();
    User::create([
        'name'=>$request->Name,
        'username'=>$request->username,
        'email'=>$request->email,
        'mobile'=>$request->mobile,
        'password'=>$request->password,
        'role_id'=>$request->role,
    ]);
    return redirect()->back()->with('success','Team Member added successfully');
    }
}
