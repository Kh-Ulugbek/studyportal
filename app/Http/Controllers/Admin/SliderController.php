<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SliderController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
        $this->imgdir = '/images/slider-index/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        $this->vars['content'] = view('admin.index_slider')->with([
            'sliders' => $sliders,
            'path' => $this->imgdir
        ])->render();
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = public_path() . $this->imgdir;
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'link' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except('_token');
        $data['image'] = '';

        if ($request->hasFile('image')) {
            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename() . '.' . $request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $data['image'] = $newFileName;
        }

        $slider = new Slider;
        $slider->title = $data['title'];
        $slider->title_en = $data['title_en'];
        $slider->title_uz = $data['title_uz'];
        $slider->link = $data['link'];
        $slider->text = $data['text'];
        $slider->text_en = $data['text_en'];
        $slider->text_uz = $data['text_uz'];
        $slider->image = $data['image'];
        $slider->save();
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
        $slider = Slider::find($id);
        if (!$slider) {
            abort('404');
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'text' => 'required',
            'link' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except('_token');
        $data['image'] = '';

        if ($request->hasFile('image')) {
            if (file_exists($path . $slider->image)) {
                File::delete($path . $slider->image); // Удаляем старый файл с диска
            }

            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename() . '.' . $request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $data['image'] = $newFileName;
            $slider->image = $data['image'];
        }
        $slider->title = $data['title'];
        $slider->title_en = $data['title_en'];
        $slider->title_uz = $data['title_uz'];
        $slider->link = $data['link'];
        $slider->text = $data['text'];
        $slider->text_en = $data['text_en'];
        $slider->text_uz = $data['text_uz'];
        $slider->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if (!$slider) {
            abort('404');
        }
        $path = public_path() . $this->imgdir;
        if (file_exists($path . $slider->image)) {
            File::delete($path . $slider->image); // Удаляем файл с диска
        }
        $slider->delete(); // Удаляем запись в БД
        return redirect()->back();
    }
}
