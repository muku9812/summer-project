<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Book;
use App\Models\Faculty;
use App\Models\Issue;
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
       $data['issue_book']=Issue::where('status','0')->count();
       $data['faculty']=Faculty::count();
        $data['active_faculty']=Faculty::where('status','1')->count();
        $data['active_student']=Student::where('status','1')->count();
       $data['active_batch']=Batch::where('status','1')->count();

        $issue_count= $data['issue_book'];

        $data['rows'] = Book::all();

        $cal = 0;
        foreach ($data['rows'] as $i => $row){
            $cal = $cal + $row->quantity;
        }
       $rem =  $cal- $issue_count ;
        return view('home',compact('data','cal','rem'));
//        return view('home');
    }
    public function handleAdmin()
    {
        return view('handleAdmin');
    }
}
