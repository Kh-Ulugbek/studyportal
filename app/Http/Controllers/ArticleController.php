<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\University;
use App\Models\userData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ArticleController extends MainController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
        $this->imgdir = '/images/card-reviews/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $article = new Article;
        $path = public_path().$this->imgdir;
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'image' => 'required|image',
            'description' => 'required|max:255',
            'text' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();

        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('image')){
            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = date('d_m_Y_Hms', time()).rand(0,1000).'.'.$request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $article->image = $newFileName;
        }
        if ($request->hasFile('image2')){
            $newfile = $request->file('image2'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = date('d_m_Y_Hms', time()).rand(0,1000).'.'.$request->image2->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $article->image2 = $newFileName;
        }

        $article->user_id = $user->id;
        $article->published = false;
        $article->title = $data['title'];
        $article->description = $data['description'];
        $article->text = $data['text'];
        $article->save();
        return redirect()->back();
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
        $article = Article::findOrFail($id);
        $path = public_path().$this->imgdir;
        if (file_exists($path.$article->image)){
            File::delete($path.$article->image); // Удаляем старый файл с диска
        }
        if (file_exists($path.$article->image2)){
            File::delete($path.$article->image2); // Удаляем старый файл с диска
        }

        $article->delete(); // Удаляем запись в БД

       return "Статья удалена!";
    }
}
