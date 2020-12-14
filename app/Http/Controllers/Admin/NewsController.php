<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Validator;

class NewsController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
        $this->imgdir = '/images/news/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('updated_at', 'desc')->get();
        $this->vars['content'] = view('admin.index_news')->with(['news' => $news, 'path' => $this->imgdir])->render();
        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->vars['content'] = view('admin.create_news')->render();
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new News;
        $path = public_path().$this->imgdir;
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('image')){
            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $news->image = $newFileName;
        }

        $news->title = $data['title'];
        $news->title_en = $data['title_en'];
        $news->title_uz = $data['title_uz'];
        $news->text = $data['text'];
        $news->text_en = $data['text_en'];
        $news->text_uz = $data['text_uz'];
        $news->description = $data['description'];
        $news->description_en = $data['description_en'];
        $news->description_uz = $data['description_uz'];
        $news->save();
        return redirect()->route('admin.news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        $this->vars['content'] = view('admin.show_news')->with(['news' => $news, 'path' => $this->imgdir])->render();
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
        $news = News::findOrFail($id);
        $this->vars['content'] = view('admin.edit_news')->with(['news' => $news, 'path' => $this->imgdir])->render();
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
        $news = News::findOrFail($id);
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
            $this->deleteOldFile($path.$news->image); // Удаляем старый файл с диска

            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $news->image = $newFileName;
        }

        $news->title = $data['title'];
        $news->title_en = $data['title_en'];
        $news->title_uz = $data['title_uz'];
        $news->text = $data['text'];
        $news->text_en = $data['text_en'];
        $news->text_uz = $data['text_uz'];
        $news->description = $data['description'];
        $news->description_en = $data['description_en'];
        $news->description_uz = $data['description_uz'];
        $news->update();
        return redirect()->route('admin.news.show', $news->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $path = public_path().$this->imgdir;
        $this->deleteOldFile($path.$news->image); // Удаляем файл с диска
        $news->delete(); // Удаляем запись в БД
        return redirect()->route('admin.news.index');
    }
}
