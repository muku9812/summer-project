<?php

namespace App\Http\Controllers;

use App\Http\Controllers\backend\AnnouncementController;
use App\Models\Announcement;
use Illuminate\Http\Request;

class lms extends Controller
{
    public function index()
    {
        $data['rows'] = Announcement::all();

        return view('lms',compact('data'));
    }
}
