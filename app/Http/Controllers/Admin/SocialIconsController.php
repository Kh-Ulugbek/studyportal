<?php

namespace App\Http\Controllers\Admin;

use App\Models\SocialIcons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class SocialIconsController extends HomeController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social_icons = SocialIcons::all();
        $this->vars['content'] = view('admin.index_socialicons')->with('social_icons', $social_icons)->render();
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

        $path = public_path().$this->imgdir;
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'link' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.social-icons.index')->withErrors($validator)->withInput();
        }

        $data = $request->except('_token');
        $data['image'] = '';

        if ($request->hasFile('image')){
            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $data['image'] = $newFileName;
        }

        $social_icon = new SocialIcons;
        $social_icon->name = $data['name'];
        $social_icon->link = $data['link'];
        $social_icon->image = $data['image'];
        $social_icon->save();
        return redirect()->back();
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
        $social_icon = SocialIcons::find($id);
        if (!$social_icon) abort('404');

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'link' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.social-icons.index')->withErrors($validator)->withInput();
        }

        $data = $request->except('_token');
        $data['image'] = '';

        if ($request->hasFile('image')){
            if (file_exists($path.$social_icon->image)){
                File::delete($path.$social_icon->image); // Удаляем старый файл с диска
            }

            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $data['image'] = $newFileName;
            $social_icon->image = $data['image'];
        }
        $social_icon->name = $data['name'];
        $social_icon->link = $data['link'];
        $social_icon->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialIcons $social_icon)
    {
        if (!$social_icon) abort('404');
        $path = public_path().$this->imgdir;
        if (file_exists($path.$social_icon->image)){
            File::delete($path.$social_icon->image); // Удаляем файл с диска
        }
        $social_icon->delete(); // Удаляем запись в БД
        return redirect()->back();
    }
}
