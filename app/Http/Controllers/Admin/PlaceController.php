<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlaceController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
        $this->imgdir = '/images/regions/';
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $region = Region::findOrFail($request->region_id);
        $path = public_path().$this->imgdir;
        $place = new Place;

        $validator = Validator::make($request->all(), [
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('image1')){
            $this->deleteOldFile($path.$place->image1); // Удаляем старый файл с диска

            $newfile = $request->file('image1'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->image1->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $place->image1 = $newFileName;
        }

        if ($request->hasFile('image2')){
            $this->deleteOldFile($path.$place->image2); // Удаляем старый файл с диска

            $newfile = $request->file('image2'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->image2->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $place->image2 = $newFileName;
        }

        $place->region_id = $region->id;
        $place->name = $data['name'];
        $place->description = $data['description'];
        $place->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $region = Region::findOrFail($id);
        $places =Place::where('region_id', $id)->get();
        $this->vars['content'] = view('admin.index_place')->with(['region' => $region, 'places' => $places, 'path' => $this->imgdir])->render();
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

        $place = Place::findOrFail($id);
        $path = public_path().$this->imgdir;

        $validator = Validator::make($request->all(), [
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('image1')){
            $this->deleteOldFile($path.$place->image1); // Удаляем старый файл с диска

            $newfile = $request->file('image1'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->image1->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $place->image1 = $newFileName;
        }

        if ($request->hasFile('image2')){
            $this->deleteOldFile($path.$place->image2); // Удаляем старый файл с диска

            $newfile = $request->file('image2'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->image2->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $place->image2 = $newFileName;
        }

        $place->name = $data['name'];
        $place->description = $data['description'];
        $place->update();
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
        $place = Place::findOrFail($id);
        $this->deleteOldFile($path.$place->image1); // Удаляем старый файл с диска
        $this->deleteOldFile($path.$place->image2); // Удаляем старый файл с диска
        $place->delete();

        return redirect()->back();
    }
}
