<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdvantageController extends HomeController
{

    public function __construct()
    {
        parent::__construct();
        $this->imgdir = '/images/icons/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advantages = Advantage::all();
        $this->vars['content'] = view('admin.index_advantage')->with(['advantages' => $advantages, 'path' => $this->imgdir])->render();
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
        $path = public_path().$this->imgdir;
        $validator = Validator::make($request->all(), [
            'text' => 'required',
            'image' => 'required|max:255',
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

        $advantage = new Advantage;
        $advantage->text = $data['text'];
        $advantage->text_en = $data['text_en'];
        $advantage->text_uz = $data['text_uz'];
        $advantage->image = $data['image'];
        $advantage->save();
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
        $path = public_path().$this->imgdir;
        $advantage = Advantage::find($id);
        if (!$advantage) abort('404');

        $validator = Validator::make($request->all(), [
            'text' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except('_token');
        $data['image'] = '';

        if ($request->hasFile('image')){
            if (file_exists($path.$advantage->image)){
                File::delete($path.$advantage->image); // Удаляем старый файл с диска
            }

            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $data['image'] = $newFileName;
            $advantage->image = $data['image'];
        }
        $advantage->text = $data['text'];
        $advantage->text_en = $data['text_en'];
        $advantage->text_uz = $data['text_uz'];
        $advantage->update();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advantage $advantage)
    {
        if (!$advantage) abort('404');
        $path = public_path().$this->imgdir;
        if (file_exists($path.$advantage->image)){
            File::delete($path.$advantage->image); // Удаляем файл с диска
        }
        $advantage->delete(); // Удаляем запись в БД
        return redirect()->back();
    }
}
