<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Faculty;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PartnerController extends HomeController
{

    public function __construct()
    {
        parent::__construct();
        $this->imgdir = '/images/partners/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = University::orderBy('created_at', 'desc')->get();
        $this->vars['content'] = view('admin.index_partner')->with([
            'partners' => $partners,
            'path' => $this->imgdir
        ])->render();
        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $this->vars['content'] = view('admin.create_partner')->with('countries', $countries)->render();
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
            'country_id' => 'required|numeric',
            'city' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = $request->except('_token');
        $data['image'] = '';
        $data['logo'] = '';

        if ($request->hasFile('image')) {
            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename() . '.' . $request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $data['image'] = $newFileName;
        }

        if ($request->hasFile('logo')) {
            $newfile = $request->file('logo'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename() . '.' . $request->logo->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path . 'list/', $newFileName);
            // Обновляем название файла в модели
            $data['logo'] = $newFileName;
        }

        $partner = new University;
        $partner->name = $data['name'];
        $partner->name_en = $data['name_en'];
        $partner->name_uz = $data['name_uz'];
        $partner->country_id = $data['country_id'];
        $partner->city = $data['city'];
        $partner->city_en = $data['city_en'];
        $partner->city_uz = $data['city_uz'];
        $partner->image = $data['image'];
        $partner->logo = $data['logo'];
        $partner->link = $data['link'];
        $partner->type = $data['type'];
        $partner->type_en = $data['type_en'];
        $partner->type_uz = $data['type_uz'];
        $partner->students = $data['students'];
        $partner->students_en = $data['students_en'];
        $partner->students_uz = $data['students_uz'];
        $partner->title = $data['title'];
        $partner->title_en = $data['title_en'];
        $partner->title_uz = $data['title_uz'];
        $partner->description = $data['description'];
        $partner->description_en = $data['description_en'];
        $partner->description_uz = $data['description_uz'];
        $partner->save();
        return redirect()->route('admin.partner.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = University::find($id);
        if (!$partner) {
            abort(404);
        }
        $countries = Country::all();
        $this->vars['content'] = view('admin.edit_partner')
            ->with(['countries' => $countries, 'partner' => $partner, 'path' => $this->imgdir])
            ->render();
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
        $partner = University::find($id);
        if (!$partner) {
            abort(404);
        }
        $path = public_path() . $this->imgdir;
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'country_id' => 'required|numeric',
            'city' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = $request->except('_token');

        if ($request->hasFile('image')) {
            if (file_exists($path . $partner->image)) {
                File::delete($path . $partner->image); // Удаляем старый файл с диска
            }

            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename() . '.' . $request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $partner->image = $newFileName;
        }

        if ($request->hasFile('logo')) {
            if (file_exists($path . 'list/' . $partner->logo)) {
                File::delete($path . 'list/' . $partner->logo); // Удаляем старый файл с диска
            }
            $newfile = $request->file('logo'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename() . '.' . $request->logo->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path . 'list/', $newFileName);
            // Обновляем название файла в модели
            $partner->logo = $newFileName;
        }

        $partner->name = $data['name'];
        $partner->name_en = $data['name_en'];
        $partner->name_uz = $data['name_uz'];
        $partner->country_id = $data['country_id'];
        $partner->city = $data['city'];
        $partner->city_en = $data['city_en'];
        $partner->city_uz = $data['city_uz'];
        $partner->link = $data['link'];
        $partner->type = $data['type'];
        $partner->type_en = $data['type_en'];
        $partner->type_uz = $data['type_uz'];
        $partner->students = $data['students'];
        $partner->students_en = $data['students_en'];
        $partner->students_uz = $data['students_uz'];
        $partner->title = $data['title'];
        $partner->title_en = $data['title_en'];
        $partner->title_uz = $data['title_uz'];
        $partner->description = $data['description'];
        $partner->description_en = $data['description_en'];
        $partner->description_uz = $data['description_uz'];
        $partner->update();
        return redirect()->route('admin.partner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(University $partner)
    {
        if (!$partner) {
            abort('404');
        }
        $partner->faculties()->detach();

        foreach ($partner->images as $image) {
            $image->delete();
        }
        foreach ($partner->programs as $program) {
            $program->delete();
        }

        $partner->userBookmarks()->detach();

        $path = public_path() . $this->imgdir;
        if (file_exists($path . $partner->image)) {
            File::delete($path . $partner->image); // Удаляем файл с диска
        }
        if (file_exists($path . 'list/' . $partner->logo)) {
            File::delete($path . 'list/' . $partner->logo); // Удаляем файл с диска
        }
        $partner->delete(); // Удаляем запись в БД
        return redirect()->back();
    }

    public function faculties($id)
    {
        $partner = University::findOrFail($id);
        $partnerId = $partner->id;
        $faculties = Faculty::whereDoesntHave('universities', function ($q) use ($partnerId) {
            $q->where('university_id', $partnerId);
        })->get();

        $vars = [
            'partner' => $partner,
            'path' => $this->imgdir,
            'faculties' => $faculties,
        ];
        $this->vars['content'] = view('admin.index_partner_faculties')->with($vars)->render();
        return $this->renderOutput();
    }

    public function facultyAttach(Request $request, $id)
    {
        $partner = University::findOrFail($id);
        $partner->faculties()->attach($request->faculty);
        return redirect()->back();
    }

    public function facultyDetach(Request $request, $id)
    {
        $partner = University::findOrFail($id);
        $partner->faculties()->detach($request->faculty_id);
        return redirect()->back();
    }

}
