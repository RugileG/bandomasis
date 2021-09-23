<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Reservoir;
use Illuminate\Http\Request;
use Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        $member = Member::orderBy('surname')->orderBy('name')->get();
       return view('member.index', ['members' => $members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservoirs = Reservoir::all();
        return view('member.create', ['reservoirs' => $reservoirs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if(   preg_match(" /^a-zA-Z/", $request->name)){
        //     dd("radau raidziu");
        // }else{
        //       dd("neradau raidziu");
        // }

   
        $validator = Validator::make($request->all(),
        [
            'member_name' => ['required', 'min:3', 'max:64', 'string','regex:/^[\pL\s\-]+$/u'],
            'member_surname' => ['required', 'min:3', 'max:64', 'string'],
            'member_live' => ['required', 'min:3', 'max:64', 'string'],
            'member_experience' => ['required', 'min:0', 'max:90', 'numeric'],
            'member_registered' => ['required', 'min:0', 'max:99', 'numeric'],



        ],
            ['member_name.required' => 'Name is required'],
            ['member_name.min' => 'Name is too short'],
            ['member_name.max' => 'Surname is too long'],
            ['member_name.string' => 'Roman letters are required'],

            ['member_surname.required' => 'Surname is required'],
            ['member_surname.min' => 'Surname is too short'],
            ['member_surname.max' => 'Surname is too long'],
            ['member_surname.string' => 'Roman letters are required'],

            ['member_live.required' => 'Name is required'],
            ['member_live.min' => 'Name is too short'],
            ['member_live.max' => 'Name is too long'],
            ['member_live.string' => 'Roman letters are required'],

            ['member_experience.required' => 'Experience must be submit'],
            ['member_experience.min' => 'Invalid number'],
            ['member_experience.max' => 'Invalid number'],
            ['member_experience.numeric' => 'Numbers are required'],

            ['member_registered.required' => 'Registration period must be submit'],
            ['member_registered.min' => 'Invalid number'],
            ['member_registered.max' => 'Invalid number'],
            ['member_registered.numeric' => 'Numbers are required'],


        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
  



        $member = new Member;
        
        $member->name = $request->member_name;
        $member->surname = $request->member_surname;
        $member->live = $request->member_live;
        $member->experience = $request->member_experience;
        $member->registered = $request->member_registered;
        $member->$reservoir_id = $request->$reservoir_id;
        $member->save();
        return redirect()->route('member.index')->with('success_message', 'Sekmingai įrašytas.');



       
        
    }
 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $reservoirs = Reservoir::all();
        return view('member.edit', ['member' => $member,'reservoirs' => $reservoirs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {

        $validator = Validator::make($request->all(),
        [
            'member_name' => ['required', 'min:3', 'max:64', 'string'],
            'member_surname' => ['required', 'min:3', 'max:64', 'string'],
            'member_live' => ['required', 'min:3', 'max:64', 'string'],
            'member_experience' => ['required', 'min:0', 'max:90', 'numeric'],
            'member_registered' => ['required', 'min:0', 'max:99', 'numeric'],
        ],
            ['member_name.required' => 'Name is required'],
            ['member_name.min' => 'Name is too short'],
            ['member_name.max' => 'Surname is too long'],
            ['member_name.string' => 'Roman letters are required'],

            ['member_surname.required' => 'Surname is required'],
            ['member_surname.min' => 'Surname is too short'],
            ['member_surname.max' => 'Surname is too long'],
            ['member_surname.string' => 'Roman letters are required'],

            ['member_live.required' => 'Name is required'],
            ['member_live.min' => 'Name is too short'],
            ['member_live.max' => 'Name is too long'],
            ['member_live.string' => 'Roman letters are required'],

            ['member_experience.required' => 'Experience must be submit'],
            ['member_experience.min' => 'Invalid number'],
            ['member_experience.max' => 'Invalid number'],
            ['member_experience.numeric' => 'Numbers are required'],

            ['member_registered.required' => 'Registration period must be submit'],
            ['member_registered.min' => 'Invalid number'],
            ['member_registered.max' => 'Invalid number'],
            ['member_registered.numeric' => 'Numbers are required'],
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $member->name = $request->member_name;
        $member->surname = $request->member_surname;
        $member->live = $request->member_live;
        $member->experience = $request->member_experience;
        $member->registered = $request->member_registered;
        $reservoir->$reservoir_id = $request->$reservoir_id;
        $member->save();
        return redirect()->route('member.index')->with('success_message', 'Sėkmingai pakeistas.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        if($member->memberDetails->count()){
            return redirect()->route('member.index')->with('info_message', 'Trinti negalima, nes turi įrašų.');
        }
        $member->delete();
        return redirect()->route('member.index')->with('success_message', 'Sekmingai ištrintas.');
    }


}
