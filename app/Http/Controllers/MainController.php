<?php

namespace App\Http\Controllers;

use App\Http\Middleware\SetLocale;
use App\Models\Company;
use App\Models\Country;
use App\Models\Footer;
use App\Models\ProgramTypes;
use App\Models\SocialIcons;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    protected $template;
    protected $vars = [];
    protected $path;

    public function __construct()
    {
        $this->vars['company'] = Company::first();
        $this->vars['social_icons'] = SocialIcons::all();
        $this->addMenu();
        $this->addFooter();
    }

    protected function renderOutput(){

        return view($this->template)->with($this->vars);
    }

    protected function jsonImages($collection){

        $collection->transform(function($item){
            $obj = json_decode($item->image);
            if (is_object($obj))
            $item->image = $obj;
            return $item;
        });
    }

    protected function addFooter(){
        $availableLocales = ['ru', 'en', 'uz'];
        $locale = Session::get('locale');
        if (!in_array($locale, $availableLocales)){
            $locale = config('app.locale');
        }
        Session::put('locale', $locale);
        App::setLocale($locale);

        $footer = Footer::first();
        $footer->col1 = json_decode($footer->col1);
        $footer->col2 = json_decode($footer->col2);
        $footer->col3 = json_decode($footer->col3);
        $this->vars['footer'] = view('footer')->
        with(['company' => $this->vars['company'], 'social_icons' => $this->vars['social_icons'], 'footer' => $footer])
            ->render();
    }

    protected function addMenu(){

        $availableLocales = ['ru', 'en', 'uz'];
        $locale = Session::get('locale');
        if (!in_array($locale, $availableLocales)){
            $locale = config('app.locale');
        }
        Session::put('locale', $locale);
        App::setLocale($locale);

        $mob_menu_items = Menu::where('type', 'mobile')->orderBy('sort')->get();
        $this->vars['mob_menu'] = view('mob_menu')->with('mob_menu_items', $mob_menu_items)->render();
        $burgers = Menu::where('type', 'burger')->orderBy('sort')->get();
        $countries = Country::all();
        $categories = Menu::where(['type'=> 'main', 'parent' => 0])->orderBy('sort')->get();
        $menu['burgers'] = $burgers;
        $menu['categories'] = $categories;
        $menu['countries'] = $countries;
        $menu['programTypes'] = ProgramTypes::all();
        $this->vars['menu'] = view('menu')->with($menu)->render();
    }

}

