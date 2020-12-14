<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tourism;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TourismController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
        $this->imgdir = '/images/regions/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tourism = Tourism::first();
        $this->vars['content'] = view('admin.index_tourism')->with(['tourism' => $tourism, 'path' => $this->imgdir])->render();
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
        $tourism = Tourism::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'intro' => 'required',
            'description' => 'required',
            'text' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except(['_token', '_method']);
        if ($request->hasFile('image')){
            $this->deleteOldFile($path.$tourism->image); // Удаляем старый файл с диска

            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $tourism->image = $newFileName;
        }
        $tourism->title = $data['title'];
        $tourism->intro = $data['intro'];
        $tourism->description = $data['description'];
        $tourism->text = $data['text'];
        $tourism->update();
        return redirect()->back();
    }

}
