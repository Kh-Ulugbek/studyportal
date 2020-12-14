<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use App\Models\Article;
use App\Models\Book;
use App\Models\CallBack;
use App\Models\Certificate;
use App\Models\Country;
use App\Models\eliteEducation;
use App\Models\FaqSubject;
use App\Models\Gallery;
use App\Models\globalTrack;
use App\Models\History;
use App\Models\Message;
use App\Models\News;
use App\Models\Section;
use App\Models\Slider;
use App\Models\Step;
use App\Models\studentsReview;
use App\Models\Subscribe;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class IndexController extends MainController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->template = 'index';
        $this->vars['page_title'] = $this->vars['company']->name;
        $sliders = Slider::all();
        $this->vars['slider'] = view('slider')->with('sliders', $sliders)->render();
        $advantages = Advantage::all();
        $this->vars['advantages'] = view('advantages')->with('advantages', $advantages)->render();
        $gallery = Gallery::orderBy('created_at', 'desc')->get();
        $this->vars['gallery'] = view('gallery')->with('gallery', $gallery)->render();
        $this->vars['global_track'] = globalTrack::first();
        $elite_education = eliteEducation::first();
        $this->vars['elite_education'] = $elite_education;
        $countries = Country::all();
        $reviews = studentsReview::orderBy('created_at', 'desc')->take(3)->get();
        $this->jsonImages($reviews);
        $this->vars['student_reviews'] = view('student_reviews')->with([
            'countries' => $countries,
            'reviews' => $reviews
        ])->render();
        $articles = Article::select(['id', 'title', 'image', 'user_id', 'created_at'])->where('published',
            true)->orderBy('created_at', 'desc')->get();

        $cards_bg = Section::where('name', 'another_reviews_bg')->first()->image;
        $this->vars['cards'] = view('cards')->with(['articles' => $articles, 'bgimage' => $cards_bg])->render();

        $news = News::select([
            'id',
            'title',
            'title_en',
            'title_uz',
            'image',
            'description',
            'description_en',
            'description_uz',
            'created_at'
        ])->orderBy('created_at', 'desc')->get();
        $this->vars['news'] = view('news')->with('news', $news)->render();
        $history = History::first();
        $history->icons = json_decode($history->icons);
        $this->vars['history'] = view('history')->with('history', $history)->render();
        $certificates = Certificate::all();
        $this->vars['certificates'] = view('certificates')->with('certificates', $certificates)->render();
        $steps = Step::all();
        $this->vars['steps'] = view('steps')->with('steps', $steps)->render();
        $partners = University::select('*')->orderBy('created_at', 'desc')->get();
        $this->vars['partners'] = view('partners')->with('partners', $partners)->render();

        return $this->renderOutput();
    }

    public function country($slug)
    {
        $path = '/images/country/';
        $country = Country::where('slug', $slug)->first();
        if (!$country) {
            abort(404);
        }

        $this->template = 'page_index';
        $this->vars['page_title'] = $country->name;

        $others = Country::where('id', '!=', $country->id)->get();
        $section = Section::where('name', 'country_world')->first();
        $country_world = view('country_world')->with('section', $section)->render();

        $this->vars['content'] = view('country_show')
            ->with(['country' => $country, 'others' => $others, 'path' => $path, 'country_world' => $country_world])
            ->render();
        return $this->renderOutput();
    }

    public function country_index()
    {
        $country = Country::first();
        return $this->country($country->slug);
    }

    public function callback(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'city' => 'required|max:255',
            'phone' => 'required|max:255',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $callback = new CallBack();
        $callback->name = $request->name;
        $callback->email = $request->email;
        $callback->city = $request->city;
        $callback->phone = $request->phone;
        $callback->message = $request->message;
        $callback->save();
        return 'Спасибо, Ваша заявка принята!';
    }

    public function subscribe(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'subscribe' => 'required|email|max:50',
        ]);

        if ($validator->fails()) {
            return "Не правильный email.";
        }

        $subscriber = Subscribe::where('email', $request->subscribe)->first();
        if (!$subscriber) {
            $subscriber = new Subscribe;
            $subscriber->email = $request->subscribe;
            $subscriber->save();
            return 'Спасибо за подписку!';
        }

        return 'Вы уже были подписаны!';

    }

    public function message(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'text' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->except('_token');
        $message = new Message($data);
        $message->save();

        return 'Спасибо, Ваша сообщение принято!';

    }

    public function faqs()
    {
        $this->template = 'news_index';
        $this->vars['page_title'] = $this->vars['company']->name;
        $subjects = FaqSubject::all();

        $this->vars['content'] = view('faqs_content')->with('subjects', $subjects)->render();
        return $this->renderOutput();
    }

    public function search(Request $request)
    {
        $needle = $request->needle;
        $result = [];

        $universities = University::where('name', 'LIKE', "%{$needle}%")
            ->orWhere('description', 'LIKE', "%{$needle}%")
            ->get();
        $news = News::where('title', 'LIKE', "%{$needle}%")
            ->orWhere('description', 'LIKE', "%{$needle}%")
            ->orWhere('text', 'LIKE', "%{$needle}%")
            ->get();
        $books = Book::where('name', 'LIKE', "%{$needle}%")
            ->orWhere('description', 'LIKE', "%{$needle}%")
            ->orWhere('publishing_house', 'LIKE', "%{$needle}%")
            ->get();

        $result['universities'] = $universities;
        $result['news'] = $news;
        $result['books'] = $books;

        $this->template = 'privacy_index';
        $this->vars['page_title'] = $this->vars['company']->name;
        $this->vars['content'] = view('search_content')->with($result)->render();
        return $this->renderOutput();
    }

    public function ambassador()
    {
        $this->template = 'ambassador_index';
        $this->vars['page_title'] = $this->vars['company']->name;

        $vars['article'] = Article::latest()->first();
        $banner_image = Section::where('name', 'ambassador_banner')->first();
        $vars['banner'] = view('ambassador_banner')->with([
            'image' => $banner_image,
            'title' => $vars['article']->title
        ])->render();
        $gallery = Gallery::orderBy('created_at', 'desc')->get();
        $vars['gallery'] = view('ambassador_gallery')->with('gallery', $gallery)->render();
        $vars['video'] = view('ambassador_video')->render();

        $this->vars['content'] = view('ambassador_content')->with($vars)->render();

        return $this->renderOutput();
    }

    public function postList()
    {
        $this->template = 'ambassador_index';
        $this->vars['page_title'] = $this->vars['company']->name;
        $vars['articles'] = Article::orderBy('created_at', 'desc')->get();
        $this->vars['content'] = view('ambassador_post_list')->with($vars)->render();

        return $this->renderOutput();
    }

    public function locale($locale){

        $availableLocales = ['ru', 'en', 'uz'];
        if (!in_array($locale, $availableLocales)){
            $locale = config('app.locale');
        }
//        session(['locale' => $locale]);
        Session::put('locale', $locale);
        App::setLocale($locale);
        return redirect()->back();
    }


}
