<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $pag = config('paginate.per_page');
        $subscribes = Subscribe::orderBy('created_at', 'desc')->paginate($pag);
        $this->vars['content'] = view('admin.index_subscribe')->with('subscribes', $subscribes)->render();

        return $this->renderOutput();
    }

    public function subscribeRead($id){
        $subscribe = Subscribe::findOrFail($id);
        $subscribe->viewed = true;
        $subscribe->update();
        return "Status changed!";
    }

    public function destroy($id){
        $subscribe = Subscribe::findOrFail($id);
        $subscribe->delete();
        return redirect()->back();
    }


}
