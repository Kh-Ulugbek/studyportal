<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\User;
use App\Models\UserFile;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends MainController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if (Auth::check())
           return redirect()->route('user.show', Auth::user()->id);
        else
           return redirect()->route('login');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) abort(404);
        if (Auth::user()->id != $user->id) {Auth::logout(); abort(403);}
        // Если Админ то перенаправляем в админ панель
        if ($user->role->name == 'admin') return redirect()->route('admin.user.edit');

        if (!request()->session()->has('visited')) {
            request()->session()->put('visited', rand());
            $user->visited = Carbon::now();
            $user->update();
        }

        $this->template = 'profile';
        $this->vars['page_title'] = $user->name;

        $usedSpace = UserFile::where('user_id', $user->id)->sum('size')/1024;
        $totalSpace = env('USER_SPACE', 1) * 1024;
        $totalDisk = env('TOTAL_SPACE', 1) * 1024;
        $usedDisk = UserFile::select('*')->sum('size')/1024;
        $universities = University::orderBy('name')->get();
        $this->vars['content'] = view('profile_show')->with([
            'user' => $user,
            'usedSpace' => $usedSpace,
            'totalSpace' => $totalSpace,
            'totalDisk' => $totalDisk,
            'usedDisk' => $usedDisk,
            'universities' => $universities
        ]);

        return $this->renderOutput();
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
