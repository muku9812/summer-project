<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Book;
use App\Models\Faculty;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');



    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $data['book']=Book::count();
       $data['student']=Student::count();
       $data['batch']=Batch::count();
       $data['faculty']=Faculty::count();
       $data['active_batch']=Batch::where('status','1')->count();

        return view('home',compact('data'));
//        return view('home');
    }
}
