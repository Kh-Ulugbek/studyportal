<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TourismPagesController extends HomeController
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
        $regions = Region::orderBy('created_at', 'desc')->get();
        $this->vars['content'] = view('admin.index_tourism_pages')->with(['regions' => $regions, 'path' => $this->imgdir])->render();
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
        $region = new Region;

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except(['_token', '_method']);
        if ($request->hasFile('image')){

            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $region->image = $newFileName;
        }
        $region->name = $data['name'];
        $region->name_en = $data['name_en'];
        $region->name_uz = $data['name_uz'];
        $region->title = $data['title'];
        $region->title_en = $data['title_en'];
        $region->title_uz = $data['title_uz'];
        $region->description = $data['description'];
        $region->description_en = $data['description_en'];
        $region->description_uz = $data['description_uz'];
        $region->save();
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
        $region = Region::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except(['_token', '_method']);
        if ($request->hasFile('image')){
            $this->deleteOldFile($path.$region->image); // Удаляем старый файл с диска

            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $region->image = $newFileName;
        }
        $region->name = $data['name'];
        $region->name_en = $data['name_en'];
        $region->name_uz = $data['name_uz'];
        $region->title = $data['title'];
        $region->title_en = $data['title_en'];
        $region->title_uz = $data['title_uz'];
        $region->description = $data['description'];
        $region->description_en = $data['description_en'];
        $region->description_uz = $data['description_uz'];
        $region->update();
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
        $path = public_path().$this->imgdir;
        $region = Region::findOrFail($id);
        $this->deleteOldFile($path.$region->image); // Удаляем старый файл с диска

        $region->places()->delete();
        $region->delete();

        return redirect()->back();
    }
}
