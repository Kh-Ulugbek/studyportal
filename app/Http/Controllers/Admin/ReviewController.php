<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\studentsReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
        $this->imgdir = '/images/video-reviews/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = studentsReview::orderBy('updated_at', 'desc')->get();
        $this->vars['content'] = view('admin.index_review')->with(['reviews' => $reviews, 'path' => $this->imgdir])->render();
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
        $review = studentsReview::findOrFail($id);
        $review->image  = json_decode($review->image);
        $path = public_path() . $this->imgdir;
        $this->deleteOldFile($path . $review->image->photo1); // Удаляем файл с диска
        $this->deleteOldFile($path . $review->image->photo2); // Удаляем файл с диска
        $this->deleteOldFile($path . $review->image->videobg); // Удаляем файл с диска
        if (Storage::exists($review->video)) Storage::delete($review->video);
        $review->delete(); // Удаляем запись в БД
        return redirect()->back();
    }
}
