<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\Checklist;
use App\Models\Faculty;
use App\Models\studentsReview;
use App\Models\University;
use App\Models\userData;
use App\Models\UserFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ProfileController extends MainController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function saveName(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'surname' => 'required|max:50',
        ]);

        if ($validator->fails()) {
           return $validator->errors();
        }
        $user = Auth::user();
        $user->name = $request->name;
        $user->last_name = $request->surname;
        $user->update();
        return 'success';
    }

    public function saveAvatar(Request $request){
        $user_data = userData::where('user_id', Auth::user()->id)->first();
        if (!$user_data){
            $user_data = new userData;
            $user_data->user_id = Auth::user()->id;
        }
        $validator = Validator::make($request->all(), [
            'avatar' => 'required|image|max:1024',
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $file_name = $user_data->user_id. '.'.$request->avatar->getClientOriginalExtension();
        $path = $request->file('avatar')->storeAs(
            'avatars', $file_name
        );

        $user_data->image = $path;
        $user_data->save();
        return redirect()->back();

    }

    public function deleteAlert($id){
        $alert = Alert::findOrFail($id);
        $alert->delete();
        return "Alert deleted!";
    }

    public function readAllAlert(){
        $alerts = Alert::where(['user_id' => Auth::user()->id, 'viewed' => false])->get();
        foreach ($alerts as $alert){
            $alert->viewed = true;
            $alert->update();
        }

        return "Alerts changed!";
    }

    public function readAlert($id){
        $alert = Alert::findOrFail($id);
        $alert->viewed = true;
        $alert->update();
        return response()->json($alert, 200);
    }

    public function addBookmark($id){
        $bookmark = University::findOrFail($id);
        $user = Auth::user();
        if ($user->bookmarks->contains($bookmark))
            return $bookmark->name . " уже в закладках.";
        $user->bookmarks()->attach($bookmark);
        return $bookmark->name . " добавлен в закладки.";
    }

    public function removeBookmark($id){
        $bookmark = University::findOrFail($id);
        $user = Auth::user();
        if ($user->bookmarks->contains($bookmark)){
            $user->bookmarks()->detach($bookmark);
            return $bookmark->name . " удален из закладок.";
        }
        else return $bookmark->name . " нет в закладках.";
    }

    public function loadFile(Request $request){
        $validator = Validator::make($request->all(), [
            'userfile' => 'required|mimes:doc,docx,pdf,jpg,jpeg,png|max:10240',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        if ($request->hasFile('userfile')){
            $user_id = Auth::user()->id;
            $type = strtoupper($request->userfile->getClientOriginalExtension());
            $name = $request->userfile->getClientOriginalName();
            $path = $request->file('userfile')->storeAs('userfiles/'. $user_id, $name);
            $size = Storage::size($path);

            $userFile = new UserFile;
            $userFile->user_id = $user_id;
            $userFile->name  = $name;
            $userFile->type  = $type;
            $userFile->size = $size;
            $userFile->path = $path;
            $userFile->save();

            return response()->json($userFile, 200);
        }
        else return "Что-то пошло не так.";
    }

    public function showFile($id){
        $file = UserFile::findOrFail($id);
        return Storage::download($file->path);
    }

    public function storeUniversity(Request $request){
        $user_data = userData::where('user_id', Auth::user()->id)->first();
        if (!$user_data) {
            $user_data = new userData;
            $user_data->user_id = Auth::user()->id;
        }
        $university = University::findOrFail($request->university_id);
        $faculty = Faculty::findOrFail($request->faculty_id);

        $user_data->study = $university->name;
        $user_data->from = $university->city;
        $user_data->country_id = $university->country_id;
        $user_data->direction = $faculty->name;

        $user_data->save();
        return redirect()->back();
    }

    public function checklistChecked($id){
        $checklist = Checklist::findOrFail($id);
        $checklist->checked = true;
        $checklist->update();
        return "checklistChecked";
    }

    public function checklistDelete($id){
        $checklist = Checklist::findOrFail($id);
        $checklist->delete();
        return "checklistDeleted";
    }

    public function  uploadVideo(Request $request){
        $path = public_path()."/images/video-reviews/";
        $review = new studentsReview;
        $review->user_id = Auth::user()->id;
        $review->title = $request->title;
        $review->description = $request->description;
        $image = [
            'photo1' => '',
            'photo2' => '',
            'videobg' => '',
        ];

        if ($request->hasFile('video')) {
            $name = date('d_m_Y_Hms', time()) . rand(0, 100) . $request->video->getClientOriginalName();
            $review->video = $request->file('video')->storeAs('uservideos/' . $review->user_id, $name);
        }

        if ($request->hasFile('photo1')) {
            $newfile = $request->file('photo1'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = date('d_m_Y_Hms', time()) . rand(0, 1000) . '.' . $request->photo1->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $image['photo1'] = $newFileName;
        }
        else   return "Видео не загружено!";

        if ($request->hasFile('photo2')) {
            $newfile = $request->file('photo2'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = date('d_m_Y_Hms', time()) . rand(0, 1000) . '.' . $request->photo2->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $image['photo2'] = $newFileName;
        }

        if ($request->hasFile('videobg')) {
            $newfile = $request->file('videobg'); // Временно сохраняем пришедший файл
            // Генерируем название новому файлу
            $newFileName = date('d_m_Y_Hms', time()) . rand(0, 1000) . '.' . $request->videobg->getClientOriginalExtension();
            // Перемешаем новый файл на диск
            $newfile->move($path, $newFileName);
            // Обновляем название файла в модели
            $image['videobg'] = $newFileName;
        }

        $review->image = json_encode($image);
        $review->save();
            return "Видео загружено!";
    }

    public function deleteVideo($id){
        $review = studentsReview::findOrFail($id);
        $review->image  = json_decode($review->image);
        $path = public_path() . '/images/video-reviews/';

        if (file_exists($path . $review->image->photo1)){
            File::delete($path . $review->image->photo1); // Удаляем старый файл с диска
        }
        if (file_exists($path . $review->image->photo2)){
            File::delete($path . $review->image->photo2); // Удаляем старый файл с диска
        }
        if (file_exists($path . $review->image->videobg)){
            File::delete($path . $review->image->videobg); // Удаляем старый файл с диска
        }
        if (Storage::exists($review->video)) Storage::delete($review->video);
        $review->delete(); // Удаляем запись в БД
        return redirect()->back();
    }




}
