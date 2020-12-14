<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Section;
use Illuminate\Http\Request;

class BookController extends MainController
{
    public function __construct()
    {
        parent::__construct();
        $this->path = '/images/books/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->template = 'page_index';
        $this->vars['page_title'] = $this->vars['company']->name;
        $books = Book::orderBy('created_at', 'desc')->take(6)->get();
        $banner_image = Section::where('name', 'book_banner')->first()->image;
        $section = Section::where('name', 'book_world')->first();
        $compare = Book::orderBy('created_at', 'desc')->take(2)->get();

        $content = [
            'banner' => view('book_banner')->with(['path' => $this->path, 'image' => $banner_image])->render(),
            'best_selection' => view('book_best_selection')->with(['books' => $books, 'path' => $this->path])->render(),
            'online_lib' => view('book_online_lib')->with('path', $this->path)->render(),
            'book_compare' => view('book_compare')->with(['path' => $this->path, 'compare' =>$compare])->render(),
            'book_world' => view('book_world')->with(['path' => $this->path, 'section' => $section])->render(),
        ];

        $this->vars['content'] = view('book_content')->with($content)->render();

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
}
