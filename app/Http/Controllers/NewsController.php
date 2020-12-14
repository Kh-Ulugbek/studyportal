<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Section;
use Illuminate\Http\Request;

class NewsController extends MainController
{

    public function __construct()
    {
        parent::__construct();
        $this->path = '/images/news/';
    }

    public function index(){

        $this->template = 'news_index';
        $this->vars['page_title'] = $this->vars['company']->name;
        $banner_img = Section::where('name', 'news_banner')->first()->image;
        $banner = view('news_banner')->with('image', $banner_img)->render();
        $news = News::select(['id', 'title', 'title_en', 'title_uz',
            'image', 'description', 'description_en', 'description_uz', 'created_at'])
            ->orderBy('created_at', 'desc')->get();

        $section = Section::where('name', 'news_world')->first();
        $world = view('news_world')->with(['path' => $this->path, 'section' => $section])->render();
        $this->vars['content'] = view('news_content')
            ->with(['banner' => $banner, 'news' => $news, 'world_news' =>$world])
            ->render();

        return $this->renderOutput();
    }

    public function show($id){

        $news = News::findOrFail($id);
        $this->template = 'news_index';
        $this->vars['page_title'] = $this->vars['company']->name;
        $banner = Section::where('name', 'post_banner')->first()->image;
        $content['post'] = $news;
        $content['banner'] = view('post_banner')->with(['image' => $banner, 'news' => $news])->render();
        $section = Section::where('name', 'post_world')->first();
        $content['world_news'] = view('news_world')->with(['path' => $this->path, 'section' => $section])->render();
        $content['path'] = $this->path;
        $content['other_post'] =
            News::select(['id', 'title', 'title_en', 'title_uz', 'image', 'description', 'description_en', 'description_uz', 'created_at'])
                ->where('id', '!=', $news->id)->inRandomOrder()->get();
        $this->vars['content'] = view('news_show')
            ->with($content)
            ->render();

        return $this->renderOutput();
    }

}
