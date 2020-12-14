<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Section;
use App\Models\Tourism;
use Illuminate\Http\Request;

class TourismController extends MainController
{
    public function __construct()
    {
        parent::__construct();
        $this->path = '/images/regions/';
    }

    public function index()
    {
        $this->template = 'page_index';
        $this->vars['page_title'] = $this->vars['company']->name;
        $image = Section::where('name', 'tourism_banner')->first()->image;
        $regions = Region::orderBy('created_at', 'desc')->take(4)->get();
        $section = Tourism::first();
        $content = [
            'banner' => view('tourism_banner')->with(['path' => $this->path, 'image' => $image, 'regions' => $regions])->render(),
            'content' => view('tourism_content')->with('section', $section)->render()
        ];

        $this->vars['content'] = view('tourism_index')->with($content)->render();
        return $this->renderOutput();
    }

    public function region($slug){
        $region = Region::where('slug', $slug)->first();
        $this->template = 'page_index';
        $this->vars['page_title'] = $region->name;
        $others = $regions = Region::where('id', '!=', $region->id)->orderBy('created_at', 'desc')->take(3)->get();
        $content = [
            'region' => $region,
            'others' => $others,
            'path' => $this->path,
        ];
        $this->vars['content'] = view('region_content')->with($content)->render();

        return $this->renderOutput();
    }

}
