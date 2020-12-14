<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\CountryFAQ;
use Illuminate\Http\Request;

class CountryFaqController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = Country::findOrFail($id);
        $faqs = CountryFAQ::where('country_id', $country->id)->get();
        $this->vars['content'] = view('admin.show_country_faqs')->with(['faqs' => $faqs, 'country' => $country])->render();
        return $this->renderOutput();
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
        $country = Country::findOrFail($id);
        $faq = new CountryFAQ;
        $faq->country_id = $country->id;
        $faq->question = $request->input('question');
        $faq->save();
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
        $faq = CountryFAQ::findOrFail($id);
        if (!$faq) abort(404);
        $faq->answers()->delete();
        $faq->delete(); // Удаляем запись из БД
        return redirect()->back();

    }
}
