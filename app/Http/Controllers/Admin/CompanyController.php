<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends HomeController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->vars['content'] = view('admin.index_company')->with('company', $this->vars['company'])->render();
        return $this->renderOutput();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Models\Company $company){
        $params = request()->except(['_token', '_method']);
        if (!$company->update($params)) abort('404');
        return redirect()->route('admin.company.index');
    }

}
