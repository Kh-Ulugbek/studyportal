<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $pag = config('paginate.per_page');
        $messages = Message::orderBy('created_at', 'desc')->paginate($pag);
        $this->vars['content'] = view('admin.index_message')->with('messages', $messages)->render();
        return $this->renderOutput();
    }

    public function read($id){
        $message = Message::findOrFail($id);
        $message->viewed = true;
        $message->update();
        return redirect()->back();
    }

    public function destroy($id){
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->back();
    }
}
