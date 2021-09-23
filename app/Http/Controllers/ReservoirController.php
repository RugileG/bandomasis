<?php

namespace App\Http\Controllers;

use App\Models\Reservoir;
use Illuminate\Http\Request;
use App\Models\Member;
use Validator;

class ReservoirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservoirs = Reservoir::all();
        $reservoirs = Reservoir::orderBy('title')->get();
        $reservoirs = $reservoirs->sortBy('area', SORT_REGULAR, true);
       return view('reservoir.index', ['reservoirs' => $reservoirs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::all();
       return view('reservoir.create', ['members' => $members]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->reservoir_title = ucwords(strtolower($request->reservoir_title));
        

        $validator = Validator::make($request->all(),
        [
            'reservoir_title' => ['required', 'min:2', 'max:200', 'string', 'regex:/^[\pL\s\-]+$/u'],
            'reservoir_area' => ['required', 'min:1', 'max:3000', 'numeric', 'regex:/^[\pL\s\-]+$/u'],
            'reservoir_about' => ['required'],

        ],
            [
            'reservoir_title.required' => 'Title is required',
            'reservoir_title.min' => 'Title is too short',
            'reservoir_title.max' => 'Title is too long',
            'reservoir_title.string' => 'Roman letters are required',

            'reservoir_title.required' => 'Area must be submited',
            'reservoir_title.min' => 'Invalid number',
            'reservoir_title.max' => 'Invalid number',
            'reservoir_title.string' => 'Numbers are required',

            'reservoir_about.required' => 'The About field is required',


            ]
                    );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
 

        $reservoir = new Reservoir;

        $reservoir->title = $request->reservoir_title;
        $reservoir->area = $request->reservoir_area;
        $reservoir->about = $request->reservoir_about;
        $reservoir->save();

        return redirect()->route('reservoir.index')->with('success_message', 'Sekmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function show(Reservoir $reservoir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservoir $reservoir)
    {
        $members = Member::all();
        return view('reservoir.edit', ['reservoir' => $reservoir, 'members' => $members]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservoir $reservoir)
    {
        $request->reservoir_title = ucwords(strtolower($request->reservoir_title));

        $validator = Validator::make($request->all(),
        [
            'reservoir_title' => ['required', 'min:2', 'max:200', 'string'],
            'reservoir_area' => ['required', 'min:1', 'max:3000', 'numeric'],
            'reservoir_about' => ['required'],

        ],
            [
            'reservoir_title.required' => 'Title is required',
            'reservoir_title.min' => 'Title is too short',
            'reservoir_title.max' => 'Title is too long',
            'reservoir_title.string' => 'Roman letters are required',

            'reservoir_title.required' => 'Area must be submited',
            'reservoir_title.min' => 'Invalid number',
            'reservoir_title.max' => 'Invalid number',
            'reservoir_title.string' => 'Numbers are required',

            'reservoir_about.required' => 'The About field is required',


            ]
                    );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
    
        $reservoir->title = $request->reservoir_title;
        $reservoir->area = $request->reservoir_area;
        $reservoir->about = $request->reservoir_about;
        

        $reservoir->save();
        return redirect()->route('reservoir.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservoir $reservoir)
    {
        $reservoir->delete();
       return redirect()->route('reservoir.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}
