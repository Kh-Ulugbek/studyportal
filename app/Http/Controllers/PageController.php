<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Country;
use App\Models\Duration;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\ProgramTypes;
use App\Models\Section;
use App\Models\studentsReview;
use App\Models\University;
use App\Models\userData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PageController extends MainController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function articleShow($id){

        $article = Article::findOrFail($id);

        $this->template = 'ambassador_index';
        $this->vars['page_title'] = $article->title;

        $vars['article'] = $article;
        $banner_image = Section::where('name', 'ambassador_banner')->first();
        $vars['banner'] = view('ambassador_banner')->with(['image' => $banner_image, 'title' => $vars['article']->title])->render();
        $review = studentsReview::latest()->first();
        $review->image = json_decode($review->image);

        $vars['video'] = view('ambassador_video')->with('review', $review)->render();
        $this->vars['content'] = view('ambassador_post')->with($vars)->render();

        return $this->renderOutput();
    }


    public function getVideo($id){
        $review = studentsReview::findOrFail($id);

        if (Storage::exists($review->video)){
            $file=Storage::get($review->video);
        }
        else {
            $file=Storage::get('uservideos/test.mp4');
        }

        $response = Response::make($file, 200);
        $fileType = explode(".", strtolower($review->video))[1];
        $response->header('Content-Type', 'video/'.$fileType);
        return $response;
    }

    public function getAvatar(){
        $user_data = userData::where('user_id', Auth::user()->id)->first();
        if (!$user_data) {
            $user_data = new userData();
            $user_data->user_id = Auth::user()->id;
            $user_data->save();
        }
        if (Storage::exists($user_data->image)){
            $file=Storage::get($user_data->image);
        }
        else {
            $file=Storage::get('avatars/no-avatar.png');
        }

        $response = Response::make($file, 200);
        $response->header('Content-Type', 'image/*');
        return $response;
    }



    public function getUserAvatar($id){
        $user_data = userData::where('user_id', $id)->first();
        if (!$user_data) {
            $user_data = new userData;
            $user_data->user_id = Auth::user()->id;
            $user_data->save();
        }
        if (Storage::exists($user_data->image)){
            $file=Storage::get($user_data->image);
        }
        else {
            $file=Storage::get('avatars/no-avatar.png');
        }

        $response = Response::make($file, 200);
        $response->header('Content-Type', 'image/*');
        return $response;
    }

    public function videoByCountry($slug = null){
        if ($slug) {
            $ids = [];
            $countryId = Country::select('id')->where('slug', $slug)->first()->id;
            $usersIds = userData::select('user_id')->where('country_id', $countryId)->get();
            if ($usersIds->count() > 0) {
                foreach ($usersIds as $usersId) {
                    $ids[] = $usersId->user_id;
                }
                $reviews = studentsReview::whereIn('user_id', $ids)->orderBy('created_at', 'desc')->get();
                if ($reviews->count() > 0) {
                    $this->jsonImages($reviews);
                    return view('reviews_filter')->with('reviews', $reviews)->render();
                }
            }
        } else {
            $reviews = studentsReview::orderBy('created_at', 'desc')->get();
            if ($reviews->count() > 0) {
                $this->jsonImages($reviews);
                return view('reviews_filter')->with('reviews', $reviews)->render();
            }
        }
        return [];
    }

    public function filterResult(Request $request){

        $data = [];
        $data['countries'] = explode(',', $request->countries);
        $data['programs'] = explode(',', $request->programms);
        $data['faculties'] = explode(',', $request->faculties);

        $countryIds = [];
        $countries = Country::select('id')->whereIn('name', $data['countries'])->get();
        if ($countries->count() > 0) {
            foreach ($countries as $country) {
                $countryIds[] = $country->id;
            }
        }
        $facultyIds = [];
        $faculties = Faculty::select('id')->whereIn('name', $data['faculties'])->get();
        if ($faculties->count() > 0) {
            foreach ($faculties as $faculty) {
                $facultyIds[] = $faculty->id;
            }
        }

        $typeIds = [];
        $types = ProgramTypes::select('id')->whereIn('name', $data['programs'])->get();
        if ($types->count() > 0) {
            foreach ($types as $type) {
                $typeIds[] = $type->id;
            }
        }

        $programs = Program::whereIn('program_type_id', $typeIds)
            ->whereIn('faculty_id', $facultyIds)
            ->get();

        $universityIds = [];
        if (count($programs) > 0) {
            foreach ($programs as $program) {
              $universityIds[] = $program->university_id;
            }
        }

        $universities = University::whereIn('id', $universityIds)->whereIn('country_id', $countryIds)->get();
        $path = '/images/partners/';
        $html = view('filter_result')->with(['universities' => $universities, 'path' => $path])->render();
        return $html;
    }




}
