<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BatchRequest;
use App\Models\Batch;
use App\Models\Issue;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = Batch::all();
        return view('batch/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('batch/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BatchRequest $request)
    {
        $row = Batch::create($request->all());
        if ($row) {
            $request->session()->flash('success', 'Batch Created Successfully');
        } else {
            $request->session()->flash('error', 'Batch Creation failed');

        }
        return redirect()->route('batch.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['row'] = Batch::find($id);
        if(!$data['row']){
            request()->session()->flash('error','Invalid Request');
            return redirect()->route('batch.index');
        }
        return view('batch.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['row'] = Batch::find($id);
        if(!$data ['row']){
            request()->session()->flash('error','Invalid Request');
            return redirect()->route('batch.index');
        }
        return view('batch.edit', compact('data'));
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
        $data['row'] = Batch::find($id);
        if(!$data ['row']){
            request()->session()->flash('error','Invalid Request');
            return redirect()->route('batch.index');
        }
        if ($data['row']->update($request->all())) {
            $request->session()->flash('success', 'Batch update Successfully');
        } else {
            $request->session()->flash('error', 'Batch Update failed');

        }
        return redirect()->route('batch.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['row'] = Batch::find($id);
        if ($data['row']) {
            if ($data['row']->delete()) {
                request()->session()->flash('success', 'Batch Deleted Successfully');

            } else {
                request()->session()->flash('error', 'Batch Deletion failed');
            }
        } else {
            request()->session()->flash('error', 'Invalid request');
        }
        return redirect()->route('batch.index');
    }
    public function search(BatchRequest $request){
        $search_text= $request->input('query');
        dd($search_text);
        $issues =Issue::where('title','LIKE','%'.$search_text.'%')->with('books')->get();
        return view('issue.search',compact('issues'));
    }
    public function updateStatus(Request $request)
    {
        $member = Issue::find($request->id);
        $member->status = $request->status;
        $member->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

}
