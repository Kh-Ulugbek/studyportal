<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CountryInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Country;

class CountryController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
        $this->imgdir = '/images/country/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $countries = Country::all();
        $this->vars['content'] = view('admin.index_country')->with([
            'countries' => $countries,
            'path' => $this->imgdir
        ])->render();
        return $this->renderOutput();
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);
        $this->vars['content'] = view('admin.edit_country')->with([
            'country' => $country,
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
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
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
        $country = new Country;
        $country->name = $data['name'];
        $country->name_en = $data['name_en'];
        $country->name_uz = $data['name_uz'];
        $country->image = $data['image'];
        $country->save();
        $info = new CountryInfo;
        $info->country_id = $country->id;
        $info->save();
        return redirect()->route('admin.country.index');
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
        $country = Country::find($id);
        if (!$country) {
            abort('404');
        }
        $info = $country->info;
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.country.index')->withErrors($validator)->withInput();
        }

        $data = $request->except(['_token', '_method']);
        $data['image'] = '';
        $data['infoimage'] = '';

        if ($request->hasFile('image')) {
            $this->deleteOldFile($path . $country->image); // Удаляем старый файл с диска

            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename() . '.' . $request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $country->image = $newFileName;
        }

        if ($request->hasFile('infoimage')) {
            $this->deleteOldFile($path . 'info/' . $info->image); // Удаляем старый файл с диска
            $newfile = $request->file('infoimage'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename() . '.' . $request->infoimage->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path . 'info/', $newFileName);
            // Обновляем название файла в модели
            $info->image = $newFileName;
        }

        $country->name = $data['name'];
        $country->name_en = $data['name_en'];
        $country->name_uz = $data['name_uz'];
        $info->title = $data['title'];
        $info->title_en = $data['title_en'];
        $info->title_uz = $data['title_uz'];
        $info->description = $data['description'];
        $info->description_en = $data['description_en'];
        $info->description_uz = $data['description_uz'];
        $info->update();
        $country->update();
        return redirect()->route('admin.country.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        if (!$country) {
            abort('404');
        }
        $info = $country->info;
        $path = public_path() . $this->imgdir;
        $this->deleteOldFile($path . $country->image); // Удаляем старый файл с диска
        if ($info) {
            $this->deleteOldFile($path . 'info/' . $info->image); // Удаляем старый файл с диска
            $info->delete();
        }

        $country->faqs()->dedele();

        $country->delete(); // Удаляем запись из БД
        return redirect()->back();
    }
}
