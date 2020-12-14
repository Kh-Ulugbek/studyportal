<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CallBack;
use Illuminate\Http\Request;

class CallBackController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $pag = config('paginate.per_page');
        $callbacks = CallBack::orderBy('created_at', 'desc')->paginate($pag);
        $this->vars['content'] = view('admin.index_callback')->with('callbacks', $callbacks)->render();

        return $this->renderOutput();
    }

    public function callbackRead($id){
        $callback = CallBack::findOrFail($id);
        $callback->viewed = true;
        $callback->update();
        return redirect()->back();
    }

    public function destroy($id){
        $callback = CallBack::findOrFail($id);
        $callback->delete();
        return redirect()->back();
    }


}
