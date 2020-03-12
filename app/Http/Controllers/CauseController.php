<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cause;
use App\Judge;
use App\Court;
use App\Http\Requests\CauseRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class CauseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->user_type == 'admin') {
            $causelist = Cause::all();
            return view('cases.index', compact('causelist'));
        } else {
                  $causelist = Cause::where('user_id', auth()->user()->id)->latest()->paginate(10);
                  return view('cases.index', compact('causelist'));
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->user_type == 'admin') {
            $judges = Judge::all();
            $courts = Court::all();
            return view('cases.create', compact('judges', 'courts'));
        } else {
            $judges = Judge::where('court_id', Auth::user()->court_id)->get();
            $courts = Court::where('id', Auth::user()->court_id)->get();
            return view('cases.create', compact('judges', 'courts'));
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CauseRequest $request)
    {
       //dd($request->all());
       $cause = new Cause;
       $cause->case_fileno = $request->case_fileno;
       $cause->judge_id = $request->judge_id;
       $cause->court_id = $request->court_id;
       $cause->status = $request->status;
       $cause->action = $request->action;
       $cause->litigants = $request->litigants;
       $cause->user_id = $request->user_id;
       $cause->case_date = $request->case_date;
       $cause->dateof_nextadj = $request->dateof_nextadj;
       $cause->state = $request->state;

       $cause->save();
       Alert('success', 'Case Created');
       return redirect()->route('causelist.index')->with('success', 'Case Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $cause = Cause::find($id);
        return view('cases.show', compact('cause'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cause = Cause::findOrFail($id);
        $courts = Court::all();
        $judges = Judge::all();

        $cou = [];
        foreach($courts as $court){
            $cou[$court->id] = $court->name;
        }

        $judge =[];
        foreach($judges as $j)
        {
            $judge[$j->id]= $j->judge_name;
        }

        return view('cases.edit', compact('cause', 'cou', 'judge'));
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
        $cause = Cause::find($id);
        $cause->case_fileno = $request->case_fileno;
        $cause->judge_id = $request->judge_id;
        $cause->court_id = $request->court_id;
        $cause->litigants = $request->litigants;
        $cause->status = $request->status;
        $cause->action = $request->action;
        $cause->case_date = $request->case_date;
        $cause->dateof_nextadj = $request->dateof_nextadj;

        $cause->save();
        Alert::success('success', 'Case Updated');
        return redirect()->route('causelist.index')->with('success', 'Case Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
