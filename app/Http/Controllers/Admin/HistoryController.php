<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HistoryController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
        $this->imgdir = '/images/icons-parts/';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $history = History::first();
        $history->icons = json_decode($history->icons);
        $this->vars['content'] = view('admin.index_history')->with(['history' => $history, 'path' => $this->imgdir])->render();
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
        $history = History::first();
        if (!$history) abort('404');

       $history->icons = json_decode($history->icons);
       $icons = array();
       $icons['icon1'] = [
            'text' => $request['icon1-text'],
            'text_en' => $request['icon1-text_en'],
            'text_uz' => $request['icon1-text_uz'],
            'image' => $request['icon1-image']??$history->icons->icon1->image
        ];
        $icons['icon2'] = [
            'text' => $request['icon2-text'],
            'text_en' => $request['icon2-text_en'],
            'text_uz' => $request['icon2-text_uz'],
            'image' => $request['icon2-image']??$history->icons->icon2->image
        ];
        $icons['icon3'] = [
            'text' => $request['icon3-text'],
            'text_en' => $request['icon3-text_en'],
            'text_uz' => $request['icon3-text_uz'],
            'image' => $request['icon3-image']??$history->icons->icon3->image
        ];
        $icons['icon4'] = [
            'text' => $request['icon4-text'],
            'text_en' => $request['icon4-text_en'],
            'text_uz' => $request['icon4-text_uz'],
            'image' => $request['icon4-image']??$history->icons->icon4->image
        ];

        $validator = Validator::make($request->all(), [
            'header' => 'required|max:255',
            'paragraph' => 'required|max:255',
            'span' => 'required',
            'icon1-text' => 'required|max:255',
            'icon2-text' => 'required|max:255',
            'icon3-text' => 'required|max:255',
            'icon4-text' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except('_token');

        if ($request->hasFile('icon1-image')){
            $this->deleteOldFile($path.$history->icons->icon1->image);
            $newfile = $request->file('icon1-image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request['icon1-image']->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $icons['icon1']['image'] = $newFileName;
        }

        if ($request->hasFile('icon2-image')){
            $this->deleteOldFile($path.$history->icons->icon2->image);
            $newfile = $request->file('icon2-image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request['icon2-image']->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $icons['icon2']['image'] = $newFileName;
        }

        if ($request->hasFile('icon3-image')){
            $this->deleteOldFile($path.$history->icons->icon3->image);
            $newfile = $request->file('icon3-image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request['icon3-image']->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $icons['icon3']['image'] = $newFileName;
        }

        if ($request->hasFile('icon4-image')){
            $this->deleteOldFile($path.$history->icons->icon4->image);
            $newfile = $request->file('icon4-image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request['icon4-image']->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $icons['icon4']['image'] = $newFileName;
        }

        $icons = json_encode($icons);
        $history->icons = $icons;
        $history->header = $data['header'];
        $history->header_en = $data['header_en'];
        $history->header_uz = $data['header_uz'];
        $history->paragraph = $data['paragraph'];
        $history->paragraph_en = $data['paragraph_en'];
        $history->paragraph_uz = $data['paragraph_uz'];
        $history->span = $data['span'];
        $history->span_en = $data['span_en'];
        $history->span_uz = $data['span_uz'];
        $history->update();
        return redirect()->back();

    }

}
