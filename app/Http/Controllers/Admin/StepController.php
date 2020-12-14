<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Models\Step;

class StepController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
        $this->imgdir = '/images/icons-steps/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $steps = Step::all();
        $this->vars['content'] = view('admin.index_step')->with(['steps' => $steps, 'path' => $this->imgdir])->render();
        return $this->renderOutput();
    }

    public function store(Request $request)
    {
        $path = public_path() . $this->imgdir;
        $step = new Step;

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'text' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {
            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename() . '.' . $request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $step->image = $newFileName;
        }
        $step->title = $request->title;
        $step->title_en = $request->title_en;
        $step->title_uz = $request->title_uz;
        $step->text = $request->text;
        $step->text_en = $request->text_en;
        $step->text_uz = $request->text_uz;
        $step->save();
        return redirect()->back();
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
        $step = Step::find($id);
        if (!$step) {
            abort('404');
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'text' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except('_token');
        $data['image'] = '';

        if ($request->hasFile('image')) {
            if (file_exists($path . $step->image)) {
                File::delete($path . $step->image); // Удаляем старый файл с диска
            }

            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename() . '.' . $request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $step->image = $newFileName;
        }
        $step->title = $data['title'];
        $step->title_en = $data['title_en'];
        $step->title_uz = $data['title_uz'];
        $step->text = $data['text'];
        $step->text_en = $data['text_en'];
        $step->text_uz = $data['text_uz'];
        $step->update();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $step = Step::findOrFail($id);
        $path = public_path() . $this->imgdir;
        $this->deleteOldFile($path . $step->image); // Удаляем файл с диска
        $step->delete(); // Удаляем запись в БД
        return redirect()->back();
    }

}
