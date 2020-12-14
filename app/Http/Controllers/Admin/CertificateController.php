<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CertificateController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
        $this->imgdir = '/images/certificates/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = Certificate::all();
        $this->vars['content'] = view('admin.index_certificate')->with(['certificates' => $certificates, 'path' => $this->imgdir])->render();
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
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
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

        $certificate = new Certificate;
        $certificate->name = $data['name'];
        $certificate->image = $data['image'];
        $certificate->save();
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
        $certificate = Certificate::find($id);
        if (!$certificate) abort('404');

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except('_token');

        if ($request->hasFile('image')){
            if (file_exists($path.$certificate->image)){
                File::delete($path.$certificate->image); // Удаляем старый файл с диска
            }

            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $certificate->image = $newFileName;
        }
        $certificate->name = $data['name'];
        $certificate->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        if (!$certificate) abort('404');
        $path = public_path().$this->imgdir;
        if (file_exists($path.$certificate->image)){
            File::delete($path.$certificate->image); // Удаляем файл с диска
        }
        $certificate->delete(); // Удаляем запись в БД
        return redirect()->back();
    }
}
