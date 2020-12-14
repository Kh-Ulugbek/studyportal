<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FileController extends HomeController
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
        $users = User::where('role_id', '!=', 1)->get();
        $userFiles = UserFile::where('isOwn', false)->orderBy('created_at', 'desc')->paginate(20);
        $this->vars['content'] = view('admin.index_file')->with(['users' => $users, 'userFiles' => $userFiles])->render();
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
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric',
            'file' => 'required|mimes:doc,docx,pdf,jpg,jpeg,png|max:10240',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        if ($request->hasFile('file')){
            $user_id = $request->user_id;
            $type = strtoupper($request->file->getClientOriginalExtension());
            $name = $request->file->getClientOriginalName();
            $path = $request->file('file')->storeAs('userfiles/'. $user_id, $name);
            $size = Storage::size($path);

            $userFile = new UserFile;
            $userFile->user_id = $user_id;
            $userFile->name  = $name;
            $userFile->type  = $type;
            $userFile->size = $size;
            $userFile->path = $path;
            $userFile->isOwn = 0;
            $userFile->save();
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
