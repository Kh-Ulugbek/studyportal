<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LibraryController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
        $this->imgdir = '/images/books/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $this->vars['content'] = view('admin.index_book')->with(['books' => $books, 'path' => $this->imgdir])->render();
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
        $book = new Book;

        $validator = validator::make($request->all(), [
            'name' => 'required|max:255',
            'author' => 'required|max:255',
            'publishing_house' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image',
            'file' => 'required|file',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')){

            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $book->image = $newFileName;
        }

        if ($request->hasFile('file')){
            //$newfile = $request->file('file'); // Временно сохраняем пришедший файл
            $newFileName = $this->generateFilename().'.'.$request->file->getClientOriginalExtension();
            $fpath = $request->file('file')->storeAs('books',$newFileName);
            //Storage::disk('local')->putFile($newFileName, $newfile);
            $book->size = round(Storage::size($fpath)/1048576, 2);
            $book->file_name = $fpath;
            $book->file_type = strtoupper($request->file->getClientOriginalExtension());
        }

        $data = $request->except(['_token', '_method']);
        $book->name = $data['name'];
        $book->name_en = $data['name_en'];
        $book->name_uz = $data['name_uz'];
        $book->author = $data['author'];
        $book->author_en = $data['author_en'];
        $book->author_uz = $data['author_uz'];
        $book->publishing_house = $data['publishing_house'];
        $book->publishing_house_en = $data['publishing_house_en'];
        $book->publishing_house_uz = $data['publishing_house_uz'];
        $book->description = $data['description'];
        $book->description_en = $data['description_en'];
        $book->description_uz = $data['description_uz'];
        $book->save();

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
        $book = Book::findOrFail($id);

        dd($book);
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
        $book = Book::findOrFail($id);

        $validator = validator::make($request->all(), [
            'name' => 'required|max:255',
            'author' => 'required|max:255',
            'publishing_house' => 'required|max:255',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')){
            $this->deleteOldFile($path.$book->image); // Удаляем старый файл с диска
            $newfile = $request->file('image'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = $this->generateFilename().'.'.$request->image->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $book->image = $newFileName;
        }

        $data = $request->except(['_token', '_method']);
        $book->name = $data['name'];
        $book->name_en = $data['name_en'];
        $book->name_uz = $data['name_uz'];
        $book->author = $data['author'];
        $book->author_en = $data['author_en'];
        $book->author_uz = $data['author_uz'];
        $book->publishing_house = $data['publishing_house'];
        $book->publishing_house_en = $data['publishing_house_en'];
        $book->publishing_house_uz = $data['publishing_house_uz'];
        $book->description = $data['description'];
        $book->description_en = $data['description_en'];
        $book->description_uz = $data['description_uz'];
        $book->save();

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
        $book = Book::findOrFail($id);
        $this->deleteOldFile($path.$book->image); // Удаляем старый файл с диска
        Storage::delete($book->file_name);
        $book->delete();

        return redirect()->back();
    }
}
