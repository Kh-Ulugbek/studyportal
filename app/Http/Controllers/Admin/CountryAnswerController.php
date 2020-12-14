<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CountryAnswer;
use Illuminate\Http\Request;

class CountryAnswerController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $answer = new CountryAnswer;
        $answer->answer = $request->input('answer');
        $answer->faq_id = $request->input('faq_id');
        $answer->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $answer = CountryAnswer::findOrFail($id);
        $answer->delete(); // Удаляем запись из БД
        return redirect()->back();
    }
}
