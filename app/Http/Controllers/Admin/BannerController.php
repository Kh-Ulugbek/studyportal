<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class BannerController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
        $this->imgdir = '/images/banners/';
    }


    public function banners(){

        $banners = Section::where('type', 'banner')->get();
        $this->vars['content'] = view('admin.index_banner')->with('banners', $banners)->render();
        return $this->renderOutput();
    }

    public function images(){

        $images = Section::where('type', 'image')->get();
        $this->vars['content'] = view('admin.index_images')->with('images', $images)->render();
        return $this->renderOutput();
    }

    public function change_banner(Request $request, $id){

        $section = Section::findOrFail($id);
        $path = public_path().'/'.$section->folder;

        if ($request->hasFile('image')){
            $this->deleteOldFile($path.'/'.$section->image);
            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $section->image = $newFileName;
        }
        $section->title = $request->title;
        $section->text = $request->text;
        $section->update();
        return redirect()->back();
    }



}
