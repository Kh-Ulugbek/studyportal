<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\userData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $pag = config('paginate.per_page');
        $users = User::where('role_id', '!=', 1)->orderBy('created_at', 'desc')->paginate($pag);
        $this->vars['content'] = view('admin.index_user')->with('users', $users)->render();
        return $this->renderOutput();
    }

    public function edit(){
        $user = Auth::user();
        $this->vars['content'] = view('admin.edit_user')->with('user', $user)->render();
        return $this->renderOutput();
    }

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->except(['_token', '_method']);
        $user = User::findOrFail($id);
        $user->name = $data['name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->update();

        if ($request->hasFile('avatar')){
            $user_data = userData::where('user_id', $user->id)->first();
            if (!$user_data){
                $user_data = new userData;
                $user_data->user_id = $user->id;
            }
            $file_name = $user_data->user_id. '.'.$request->avatar->getClientOriginalExtension();
            $path = $request->file('avatar')->storeAs(
                'avatars', $file_name
            );
            $user_data->image = $path;
            $user_data->save();
        }

        return redirect()->back();
    }

    public function security(Request $request){
        $user = Auth::user();
        $credentials = $request->only('password');
        $credentials['login'] = $user->login;

        if (!Auth::attempt($credentials)) {
            return redirect()->back()->withErrors(['password' => "Неправильный пароль!"])->withInput();
        }
        else {
            // password correct
            $validator = Validator::make($request->all(), [
                'login' => 'required|max:255|unique:users,login,'.$user->id,
                'newpassword' => 'required|min:8',
                'password_confirmation' => 'required|min:8|same:newpassword'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            //New password confirmed!
            $user->login = $request->login;
            $user->password = Hash::make($request->newpassword);
            $user->update();
            Auth::logout();
        }

        return redirect()->route('admin.login');
    }

}
