<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FacultyController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
        $this->imgdir = '/images/filters/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::orderBy('created_at', 'desc')->paginate(8);
        $this->vars['content'] = view('admin.index_faculty')->with(['faculties' => $faculties, 'path' => $this->imgdir])->render();
        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faculty = new Faculty;

        $path = public_path().$this->imgdir;
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('image')){
            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $faculty->image = $newFileName;
        }

        if ($request->hasFile('icon')){
            $newfile = $request->file('icon'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->icon->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path.'icons/', $newFileName);
            // Обновляем название файла в модели
            $faculty->icon = $newFileName;
        }

        $faculty->name = $request->name;
        $faculty->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $faculty = Faculty::findOrFail($id);

        $path = public_path().$this->imgdir;
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('image')){
            $this->deleteOldFile($path.$faculty->image);
            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $faculty->image = $newFileName;
        }

        if ($request->hasFile('icon')){
            $this->deleteOldFile($path.'icons/'.$faculty->icon);
            $newfile = $request->file('icon'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->icon->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path.'icons/', $newFileName);
            // Обновляем название файла в модели
            $faculty->icon = $newFileName;
        }

        $faculty->name = $request->name;
        $faculty->update();
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
        $faculty = Faculty::findOrFail($id);
        $this->deleteOldFile($path.$faculty->image);
        $this->deleteOldFile($path.'icons/'.$faculty->icon);
        $faculty->universities()->detach();
        $faculty->programs()->delete();
        $faculty->delete();
        return redirect()->back();
    }

}
