<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $data = Announcement::all();
        $data['rows'] = Announcement::all();
        return view('welcome',compact('data'));
    }
}
