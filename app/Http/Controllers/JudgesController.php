<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Court;
use App\Judge;
use App\Http\Requests\JudgeRequest;
use RealRashid\SweetAlert\Facades\Alert;

class JudgesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courts = Court::all();
        $judges = Judge::latest()->paginate(5);
        return view('judges.index', compact('courts', 'judges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JudgeRequest $request)
    {
        $judge = new Judge;
        $judge->judge_name = $request->judge_name;
        $judge->court_id   = $request->court_id;
        $judge->save();
        //Alert::success('Success', 'Judge Added !!');
        //Alert::toast('Success', 'Judge Added !!');
        toast('Judge Added !!', 'success');
        return redirect()->back()->with('success', 'Judge Added !!!');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judge = Judge::find($id);
        $courts = Court::all();
        $cou = [];
        foreach($courts as $court){
            $cou[$court->id] = $court->name;
        }
        return view('judges.edit', compact('judge', 'cou'));
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
        $judge = Judge::find($id);
        $judge->judge_name = $request->judge_name;
        $judge->court_id = $request->court_id;

        $judge->save();
        toast('Judge Updated', 'success');
        return redirect()->route('judges.index')->with('success', 'Judge Successfully Updated');
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
