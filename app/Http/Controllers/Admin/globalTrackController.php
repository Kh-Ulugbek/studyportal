<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\globalTrack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class globalTrackController extends HomeController
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
        $track = globalTrack::first();
        $this->vars['content'] = view('admin.index_track')->with([
            'track' => $track,
            'path' => $this->imgdir
        ])->render();
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $path = public_path() . $this->imgdir;
        $track = globalTrack::first();
        if (!$track) {
            abort('404');
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'text' => 'required',
            'num1' => 'required|numeric',
            'num2' => 'required|numeric',
            'subt1' => 'required|max:255',
            'subt2' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except('_token');
        $data['image'] = '';
        $data['ico1'] = '';
        $data['ico2'] = '';

        if ($request->hasFile('image')) {
            $this->deleteOldFile($path . $track->image);
            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename() . '.' . $request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $track->image = $newFileName;
        }

        if ($request->hasFile('ico1')) {
            $this->deleteOldFile($path . $track->ico1);
            $newfile = $request->file('ico1'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename() . '.' . $request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $track->ico1 = $newFileName;
        }

        if ($request->hasFile('ico2')) {
            $this->deleteOldFile($path . $track->ico2);
            $newfile = $request->file('ico2'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename() . '.' . $request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $track->ico2 = $newFileName;
        }

        $track->title = $data['title'];
        $track->title_en = $data['title_en'];
        $track->title_uz = $data['title_uz'];
        $track->text = $data['text'];
        $track->text_en = $data['text_en'];
        $track->text_uz = $data['text_uz'];
        $track->num1 = $data['num1'];
        $track->num2 = $data['num2'];
        $track->subt1 = $data['subt1'];
        $track->subt2 = $data['subt2'];
        $track->update();
        return redirect()->back();
    }

}
