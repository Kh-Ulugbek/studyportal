<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
        $this->imgdir = '/images/card-reviews/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('updated_at', 'desc')->paginate(6);
        $this->vars['content'] = view('admin.index_article')->with(['articles' => $articles, 'path' => $this->imgdir])->render();
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
        $article = Article::findOrFail($id);
        $this->vars['content'] = view('admin.show_article')->with(['article' => $article, 'path' => $this->imgdir])->render();
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
        $article = Article::findOrFail($id);
        $this->vars['content'] = view('admin.edit_article')->with(['article' => $article, 'path' => $this->imgdir])->render();
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
        $article = Article::findOrFail($id);
        $path = public_path().$this->imgdir;
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('image')){
            $this->deleteOldFile($path.$article->image); // Удаляем старый файл с диска

            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $article->image = $newFileName;
        }

        $article->title = $data['title'];
        $article->description = $data['description'];
        $article->text = $data['text'];
        $article->update();
        return redirect()->route('admin.article.show', $article->id);
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
        $this->deleteOldFile($path.$article->image); // Удаляем файл с диска
        $article->delete(); // Удаляем запись в БД
        return redirect()->route('admin.article.index');
    }

    public function publish(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->published = $request->published;
        $article->update();
        return redirect()->back();
    }

}
