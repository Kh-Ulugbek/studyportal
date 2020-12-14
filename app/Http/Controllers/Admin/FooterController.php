<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends HomeController
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
        $footer = Footer::first();
        $footer->col1 = json_decode($footer->col1);
        $footer->col2 = json_decode($footer->col2);
        $footer->col3 = json_decode($footer->col3);

        $this->vars['content'] = view('admin.index_footer')->with(['footer' => $footer, 'path' => $this->imgdir])->render();
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
        //dd($request->all(), $id);

        $footer = Footer::first();
        if(!$footer) abort(404);
        $column = json_decode($footer["col$id"]);
        $data = $request->except(['_token','_method']);

        $column->title = $data['title'];
        $column->links->link1->name = $data['link1Name'];
        $column->links->link2->name = $data['link2Name'];
        $column->links->link3->name = $data['link3Name'];
        $column->links->link4->name = $data['link4Name'];
        $column->links->link5->name = $data['link5Name'];

        $column->links->link1->href = $data['link1Href'];
        $column->links->link2->href = $data['link2Href'];
        $column->links->link3->href = $data['link3Href'];
        $column->links->link4->href = $data['link4Href'];
        $column->links->link5->href = $data['link5Href'];

        $footer["col$id"] = json_encode($column);
        $footer->update();
        return redirect()->back();
    }


}
