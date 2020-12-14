<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
        $this->imgdir = '/images/news/uploaded/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::orderBy('updated_at', 'desc')->get();
        $this->vars['content'] = view('admin.index_image')->with(['images' => $images, 'path' => $this->imgdir])->render();
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
        $image = new Image;
        $path = public_path().$this->imgdir;
        $validator = Validator::make($request->all(), [
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
            $image->path = $newFileName;
        }

        $image->name = $data['name'];
        $image->alt = $data['alt'];
        $image->save();
        return redirect()->route('admin.image.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $path = public_path() . $this->imgdir;
        $this->deleteOldFile($path . $image->path); // Удаляем файл с диска
        $image->delete(); // Удаляем запись в БД
        return redirect()->route('admin.image.index');
    }
}
