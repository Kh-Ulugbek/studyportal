<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alert;
use App\Models\AlertLog;
use App\Models\AlertType;
use App\Models\User;
use Illuminate\Http\Request;

class AlertController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $pag = config('paginate.per_page');
        $alerts = AlertLog::orderBy('created_at', 'desc')->paginate($pag);
        $types = AlertType::all();
        $users = User::where('role_id', '!=', 1)->get();
        $this->vars['content'] = view('admin.index_alert')
            ->with([
                'alerts' => $alerts,
                'types' => $types,
                'users' => $users,
            ])->render();
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
        if ($request->alertTo != 0) {

            $alert = new Alert;
            $alert->user_id = $request->alertTo;
            $alert->title = $request->title;
            $alert->text = $request->text;
            $alert->type_id = $request->type;
            $alert->save();

            $alertLog = new AlertLog;
            $alertLog->title = $request->title;
            $alertLog->text = $request->text;
            $alertLog->type = AlertType::where('id', $request->type)->first()->name;
            $user = User::where('id', $request->alertTo)->first();
            $alertLog->recipient = $user->name. ' '.$user->last_name;
            $alertLog->save();
        } else {
            $users = User::select('id')->where('role_id', '!=', 1)->get();
            foreach ($users as $user) {
                $alert = new Alert;
                $alert->user_id = $user->id;
                $alert->title = $request->title;
                $alert->text = $request->text;
                $alert->type_id = $request->type;
                $alert->save();
            }
            $alertLog = new AlertLog;
            $alertLog->title = $request->title;
            $alertLog->text = $request->text;
            $alertLog->type = AlertType::where('id', $request->type)->first()->name;
            $alertLog->recipient = "Всем!";
            $alertLog->save();
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
