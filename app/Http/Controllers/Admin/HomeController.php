<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Book;
use App\Models\CallBack;
use App\Models\Country;
use App\Models\Message;
use App\Models\News;
use App\Models\Subscribe;
use App\Models\University;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\Admin\AdminMenu;
use Illuminate\Support\Facades\File;


class HomeController extends Controller
{
    protected $template;
    protected $vars = [];
    protected $menu_contents;
    protected $imgdir = '/images/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->template = 'admin.home';
        $this->vars['company'] = Company::first();
        $this->menu_contents = AdminMenu::where('parent', 0)->orderBy('sort')->get();
        $this->vars['menu_content'] = view('admin.menu_content')->with('menu_contents', $this->menu_contents);
        $this->vars['new_subscribers'] = Subscribe::select('id')->where('viewed', false)->get()->count();
        $this->vars['new_callback'] = CallBack::select('id')->where('viewed', false)->get()->count();
        $this->vars['new_messages'] = Message::select('id')->where('viewed', false)->get()->count();

    }

    protected function renderOutput(){
        return view($this->template)->with($this->vars);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role->name != 'admin') abort(403);
        $this->vars['content'] = view('admin.index_content')->render();

        return $this->renderOutput();
    }

    protected function generateFilename(){
        return date('d_m_Y_Hms', time()).rand(0,1000);
    }

    protected function deleteOldFile($path){
        if (file_exists($path)){
            File::delete($path); // Удаляем старый файл с диска
        }
    }

    public function analytics(){
        $step = 1;
        $cnt = 30;
        if (Auth::user()->role->name != 'admin') abort(403);
        $vars = [
            'subscribers_cnt' => Subscribe::select('id')->get()->count(),
            'users_cnt' => User::select('id')->where('role_id', '!=', 1)->get()->count(),
            'university_cnt' => University::select('id')->get()->count(),
            'country_cnt' => Country::select('id')->get()->count(),
            'book_cnt' => Book::select('id')->get()->count(),
            'news_cnt' => News::select('id')->get()->count(),
            'post_cnt' => Article::select('id')->get()->count(),
        ];

        $vars['subscribers_data'] = implode(",", $this->analyticData(new Subscribe, $step, $cnt));
        $vars['users_data'] = implode(",", $this->analyticData(new User, $step, $cnt));
        $vars['university_data'] = implode(",", $this->analyticData(new University, $step, $cnt));
        $vars['country_data'] = implode(",", $this->analyticData(new Country, $step, $cnt));
        $vars['book_data'] = implode(",", $this->analyticData(new Book, $step, $cnt));
        $vars['news_data'] = implode(",", $this->analyticData(new News, $step, $cnt));
        $vars['post_data'] = implode(",", $this->analyticData(new Article, $step, $cnt));

        $this->vars['content'] = view('admin.index_analytics')->with($vars)->render();

        return $this->renderOutput();
    }

    protected function analyticData(Model $model, $perDay = 1, $count){
        $data = [];
        $cnt = $count;
        for($i = $perDay * $cnt - $perDay; $i>=0; $i -= $perDay)
        {
            if ($model instanceof User)
                $data[] = $model::select('id')->where('role_id', '!=', 1)->where('created_at', '<=', Carbon::now()->subDays($i))->get()->count();
            else
                $data[] = $model::select('id')->where('created_at', '<=', Carbon::now()->subDays($i))->get()->count();
        }

        return $data;
    }



}
