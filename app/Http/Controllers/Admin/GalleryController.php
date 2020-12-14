<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleryController extends HomeController
{

    public function __construct()
    {
        parent::__construct();
        $this->imgdir = '/images/gallery/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::orderBy('updated_at', 'desc')->get();
        $this->vars['content'] = view('admin.index_gallery')->with(['galleries' => $galleries, 'path' => $this->imgdir])->render();
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
        $gallery = new Gallery;
        $path = public_path().$this->imgdir;
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
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
            $gallery->image = $newFileName;
            $gallery->cimage = $newFileName;
        }

        $gallery->name = $data['name'];
        $gallery->name_en = $data['name_en'];
        $gallery->name_uz = $data['name_uz'];
        $gallery->text = $data['text'];
        $gallery->text_en = $data['text_en'];
        $gallery->text_uz = $data['text_uz'];
        $gallery->link = $data['link'];
        $gallery->save();
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
        $gallery = Gallery::findOrFail($id);
        $path = public_path().$this->imgdir;
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'image' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('image')){
            $this->deleteOldFile($path . $gallery->image); // Удаляем файл с диска
            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $gallery->image = $newFileName;
            $gallery->cimage = $newFileName;
        }

        $gallery->name = $data['name'];
        $gallery->name_en = $data['name_en'];
        $gallery->name_uz = $data['name_uz'];
        $gallery->text = $data['text'];
        $gallery->text_en = $data['text_en'];
        $gallery->text_uz = $data['text_uz'];
        $gallery->link = $data['link'];
        $gallery->save();
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
        $gallery = Gallery::findOrFail($id);
        $path = public_path() . $this->imgdir;
        $this->deleteOldFile($path . $gallery->image); // Удаляем файл с диска
        $gallery->delete(); // Удаляем запись в БД
        return redirect()->back();
    }
}
