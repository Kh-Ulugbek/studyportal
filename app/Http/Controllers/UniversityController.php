<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Duration;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\ProgramTypes;
use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends MainController
{
    public function __construct()
    {
        parent::__construct();
        $this->path = '/images/partners/';
    }

    public function index(){
        $this->template = 'university_index';
        $this->vars['page_title'] = $this->vars['company']->name;
        $universities = University::select('*')->orderBy('created_at', 'desc')->get();
        $countries = Country::all();
        $content = [
            'countries' => $countries,
            'universities' => $universities,
            'path' => $this->path,
            'cpath' => '/images/country/',
            'programTypes' => ProgramTypes::all(),
            'faculties' => Faculty::all(),
            'durations' => Duration::all()
        ];

        $this->vars['content'] = view('university_content')
            ->with($content)
            ->render();

        return $this->renderOutput();
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $university = University::findOrFail($id);
        $this->template = 'privacy_index';
        $this->vars['page_title'] = $this->vars['company']->name;
        $this->vars['content'] = view('university_show')->with('university', $university)->render();
        return $this->renderOutput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function getFaculties($id){
        $faculties = University::findOrFail($id)->faculties;
        return response()->json($faculties, 200);
    }


}
