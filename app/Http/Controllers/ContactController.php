<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class ContactController extends MainController
{
    public function __construct()
    {
        parent::__construct();
        $this->path = '/images/books/';
    }

    public function index()
    {
        $this->template = 'page_index';
        $this->vars['page_title'] = $this->vars['company']->name;

        $banner = Section::where('name', 'contact_banner')->first()->image;
        $section = Section::where('name', 'book_world')->first();
        $content = [
            'banner' => view('contact_banner')->with('image', $banner)->render(),
            'content' => view('contact_content')->with('company', $this->vars['company'])->render(),
            'world' => view('book_world')->with('section', $section)->render(),
        ];

        $this->vars['content'] = view('contact_index')->with($content)->render();
        return $this->renderOutput();
    }

    public function privacy(){
        $this->template = 'privacy_index';
        $this->vars['page_title'] = $this->vars['company']->name;

        $this->vars['content'] = view('privacy_content')->render();
        return $this->renderOutput();

    }
}
