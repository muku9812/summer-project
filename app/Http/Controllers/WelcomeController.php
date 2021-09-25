<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Student;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $data = Announcement::all();
        $data['rows'] = Announcement::all();
        $data['count']=Student::count();
        return view('welcome',compact('data'));
    }
}
