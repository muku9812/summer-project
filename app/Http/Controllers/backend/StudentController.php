<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Batch;
use App\Models\Faculty;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = Student::all();
        $data['active_batch']=Batch::where('status','1')->get();
        $data['sb_active']=Student::where('batch_id','1')->get();
        return view('student/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['batch_id']=Batch::all();
        $data['faculty_id']=Faculty::all();
        return view('student/create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $row = Student::create($request->all());
        if($row){
            $request->session()->flash('success','Add Student Successfully');
        } else{
            $request->session()->flash('error','Add student failed');

        }
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['row'] = Student::find($id);
        return view('student.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['faculty_id']=Faculty::all();
        $data['row'] = Student::find($id);
        if(!$data ['row']){
            request()->session()->flash('error','Invalid Request');
            return redirect()->route('book.index');
        }
        return view('student.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data['row'] = Student::find($id);
        if(!$data ['row']){
            request()->session()->flash('error','Invalid Request');
            return redirect()->route('student.index');
        }
        if ($data['row']->update($request->all())) {
            $request->session()->flash('success', 'Student update Successfully');
        } else {
            $request->session()->flash('error', 'Student Update failed');

        }
        return redirect()->route('student.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $data['row'] = Student::find($id);
            if ($data['row']) {
                if ($data['row']->delete()) {
                    request()->session()->flash('success', 'Student Deleted Successfully');

                } else {
                    request()->session()->flash('error', 'Student Deletion failed');
                }
            } else {
                request()->session()->flash('error', 'Invalid request');
            }
            return redirect()->route('student.index');
        }
    }
}
