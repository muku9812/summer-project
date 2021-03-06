<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\IssueRequest;
use App\Models\Batch;
use App\Models\Book;
use App\Models\Issue;
use App\Models\Student;
use Carbon\Carbon;
use Hamcrest\Core\Is;
use Illuminate\Http\Request;
//use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Nette\Utils\DateTime;


class IssueController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Issue::all();
        $data['rows'] = Issue::all();
        return view('issue/index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['student_id'] = Student::all();
        $data['book_id'] = Book::all();
        $data['batch_id'] = Batch::all();
        $data['active_student']=Student::where('status','1')->get();
        $data['active_batch']=Batch::where('status','1')->get();


        return view('issue/create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IssueRequest $request)
    {
        $row = Issue::create($request->all());
        if ($row) {
            $request->session()->flash('success', 'Book Created Successfully');
        } else {
            $request->session()->flash('error', 'Book Creation failed');

        }
        return redirect()->route('issue.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {

        $data['row'] = Issue::find($id);
        if(!$data['row']){
            request()->session()->flash('error','Invalid Request');
            return redirect()->route('issue.index');

            $transactions = Issue::all();
            return view('index', compact('transactions'));


        }
        return view('issue.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $data['student_id'] = Student::all();
        $data['book_id'] = Book::all();
        $data['batch_id'] = Batch::all();
        $data['row'] = Issue::find($id);

//        $from = $data['row']->issue_date;
//        $to = Carbon::now()->format('Y-m-d');
//
//        $datetime1 = new Date($from);
//        $datetime2 = new Date($to);
//        $interval = $datetime1->diff($datetime2);
//        dd($interval);





        if(!$data ['row']){
            request()->session()->flash('error','Invalid Request');
            return redirect()->route('issue.index');
        }
        return view('issue.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data['row'] = Issue::find($id);
        $today_date = Carbon::parse($request->input('Book_return_on'))->toDateString();
        $return_date = Carbon::parse($data['row']->return_date);
//        dd($today_date);
//        $today_date = Carbon::now()->toDateString();
        if ($return_date >= $today_date){
            $fine = 0;
//            $request->request->add(['fine'=>$fine]);
            DB::table('transactions')
                ->where('id',$id)
                ->update([
                    'fine' => $fine,
                ]);
//            $request->request->add(['Book_return_on'=>$today_date]);
            if ($data['row']->update($request->all())) {
                $request->session()->flash('success', 'Book Renew Successfully');
            } else {
                $request->session()->flash('error', 'Book Renew failed');

            }
        } else{
            $diff = $return_date->diffInDays($today_date);
            $fine = $diff * 2;
            DB::table('transactions')
                ->where('id',$id)
                ->update([
                    'fine' => $fine,
                ]);
            $request->request->add(['Book_return_on'=>$today_date]);
            if ($data['row']->update($request->all())) {
                $request->session()->flash('success', 'Book Renew Successfully');
            } else {
                $request->session()->flash('error', 'Book Renew failed');

            }
//            dd('fine');
        }

//        dd($diff);
        if(!$data ['row']){
            request()->session()->flash('error','Invalid Request');
            return redirect()->route('issue.index');
        }
        return redirect()->route('issue.index');
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
            $data['row'] = Issue::find($id);
            if ($data['row']) {
                if ($data['row']->delete()) {
                    request()->session()->flash('success', 'Returned Book Successfully');

                } else {
                    request()->session()->flash('error', 'Returning book failed');
                }
            } else {
                request()->session()->flash('error', 'Invalid request');
            }
            return redirect()->route('issue.index');
        }
    }
//    public function trash(){
//        $data['title']='Trash List';
//        $data['rows']=$this->model->onlyTrashed()->orderby('deleted_at','desc')->get();
//return view($this->__loadDataToview($this->folder.'trash'),compact('data'));
//    }

//public function changeTransactionStatus(Request $request){
//  $issue = Issue::find($request->transaction_id);
//  $issue ->status =$request->status;
//  $issue -> save();
//}
    public function changeUserStatus(IssueRequest $request)
    {
        $data['row'] = Issue::find($request->user_id);
        if (!$data ['row']) {
            request()->session()->flash('error', 'Invalid Request');
            return redirect()->route('issue.index');
        }
        if ($data['row']->update($request->all())) {
            $request->session()->flash('success', 'Book Renew Successfully');
        } else {
            $request->session()->flash('error', 'Book Renew failed');

        }
//        return redirect()->route('issue.index');

//
//        $user = User::find($request->user_id);
//        $user->status = $request->status;
//        $user->save();
////        $user['row']->update($request->all());
//
        return response()->json(['success'=>'User status change successfully.']);
//    }


    }
    public function search(IssueRequest $request){

        $search_text= $request->input('query');
        dd($search_text);
        $issues =Issue::where('title','LIKE','%'.$search_text.'%')->with('books')->get();
        return view('issue.search',compact('issues'));
    }


//    public function createPDF() {
//        // retreive all records from db
//        $data = transactions::all();
//
//        // share data to view
//        view()->share('transactions',$data);
//        $pdf = PDF::loadView('pdf_view', $data);
//
//        // download PDF file with download method
//        return $pdf->download('pdf_file.pdf');
//    }
//    public function createPDF()
//    {
//        $data = Issue::all();
//
//        // share data to view
//        view()->share('users-pdf',$data);
//        $pdf = PDF::loadView('pdf_view', $data);;
//        return $pdf->download('users.pdf');
//    }

    public function pending()
    {
        $data=Issue::all();
        $data['rows'] = Issue::all();
        $data['pending'] = Issue::where('status','0')->get();
        return view('issue/pending',compact('data'));

    }
    public function return()
    {

        $data=Issue::all();
        $data['rows'] = Issue::all();
        $data['return'] = Issue::where('status','1')->get();
        return view('issue/return',compact('data'));

    }
    public function renew($id)
    {
        $data['student_id'] = Student::all();
        $data['book_id'] = Book::all();
        $data['batch_id'] = Batch::all();
        $data['row'] = Issue::find($id);
        if(!$data ['row']){
            request()->session()->flash('error','Invalid Request');
            return redirect()->route('issue.index');
        }
        return view('issue.renew', compact('data'));
    }

}
