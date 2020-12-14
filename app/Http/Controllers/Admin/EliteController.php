<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\eliteEducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EliteController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
        $this->imgdir = '/images/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elite = eliteEducation::first();
        $this->vars['content'] = view('admin.index_elite')->with(['elite' => $elite, 'path' => $this->imgdir])->render();
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
        $path = public_path().$this->imgdir;
        $elite = eliteEducation::first();
        if (!$elite) abort('404');

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'link' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except('_token');
        if ($request->hasFile('image')){
            $this->deleteOldFile($path.$elite->image);
            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $elite->image = $newFileName;

        }

        $elite->title = $data['title'];
        $elite->title_en = $data['title_en'];
        $elite->title_uz = $data['title_uz'];
        $elite->link = $data['link'];
        $elite->update();
        return redirect()->back();
    }

}
