<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    /*
         * create
         * store
         * list
         * edit
         * update
         * view
         * delete/destroy
         *
         */
    function create()
    {
        return view('book/create');

    }

    public function store(BookRequest $request)
    {
        $row = Book::create($request->all());
        if ($row) {
            $request->session()->flash('success', 'Book Created Successfully');
        } else {
            $request->session()->flash('error', 'Book Creation failed');

        }
        return redirect()->route('book.index');
    }

    public function index()
    {
        $data['rows'] = Book::all();
        $cal = 0;
        foreach ($data['rows'] as $i => $row){
            $cal = $cal + $row->quantity;
        }
//        dd($cal);


        return view('book/index', compact('data','cal'));
    }

    function show($id)
    {
        $data['row'] = Book::find($id);
        $data['rows'] = Book::all();
        $data['book']=Book::count();
        if(!$data['row']){
            request()->session()->flash('error','Invalid Request');
            return redirect()->route('book.index');
        }
        return view('book.show', compact('data'));

    }

    function destroy($id)
    {
        $data['row'] = Book::find($id);
        if ($data['row']) {
            if ($data['row']->delete()) {
                request()->session()->flash('success', 'Book Deleted Successfully');

            } else {
                request()->session()->flash('error', 'Book Deletion failed');
            }
        } else {
            request()->session()->flash('error', 'Invalid request');
        }
        return redirect()->route('book.index');
    }
    function edit($id)
    {
        $data['row'] = Book::find($id);  if(!$data ['row']){
            request()->session()->flash('error','Invalid Request');
            return redirect()->route('book.index');
        }
        return view('book.edit', compact('data'));

    }
    public function update(BookRequest $request,$id)
    {
        $data['row'] = Book::find($id);
        if(!$data ['row']){
            request()->session()->flash('error','Invalid Request');
            return redirect()->route('book.index');
        }
        if ($data['row']->update($request->all())) {
            $request->session()->flash('success', 'Book update Successfully');
        } else {
            $request->session()->flash('error', 'Book Update failed');

        }
        return redirect()->route('book.index');
    }
}
