<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Comment;
use App\Models\Connect;
use Illuminate\Http\Request;
use App\Models\Lang;
use App\Models\Main;
use App\Models\News;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Query;
use App\Models\Translation;

class WebController extends Controller
{
    public function index()
    {
        $lang = \App::getLocale();
        $langs = Lang::all();
        // $button = Translation::query()->where('key','=','first')->get();
        $translations = Translation::all();
        $projects = Project::with('projectImage')->take(3)->get();
        $news = News::all()->take(6);
        $partners = Partner::all()->take(4);;
        $banners = Banner::all();
        $comments = Comment::all()->take(4);
        $querys = Query::all()->take(4);
        $mains = Main::all();
        $about = About::query()->orderByDesc('id')->first();
        return view('index',compact(
            'lang',
            'langs',
            'translations',
            'projects',
            'news',
            'partners',
            'banners',
            'comments',
            'querys',
            'mains',
            'about'
        ));
    }

    public function news(Request $request, $id)
    {
        $new = News::latest()->findOrFail($id);
        $lang = \App::getLocale();
        $langs = Lang::all();
        $translations = Translation::all();
        $mains = Main::all();
        $about = About::query()->orderByDesc('id')->first();
        return view('news_inner',compact(
            'lang',
            'langs',
            'translations',
            'about',
            'new',
            'mains'
        ));
    }

    public function projects($id)
    {
        $project = Project::query()->with('projectImage')->findOrFail($id);
        $projects = Project::with('projectImage')->get();
        $about = About::query()->orderByDesc('id')->first();
        $lang = \App::getLocale();
        $langs = Lang::all();
        $translations = Translation::all();
        $mains = Main::all();
        return view('portfolio-detail',compact(
            'lang',
            'langs',
            'translations',
            'about',
            'project',
            'projects',
            'mains'
        ));
    }


    public function news_inner(){
        $news = News::all();
        $lang = \App::getLocale();
        $langs = Lang::all();
        $translations = Translation::all();
        $mains = Main::all();
        $about = About::query()->orderByDesc('id')->first();
        return view('news_page',compact(
            'lang',
            'langs',
            'translations',
            'about',
            'news',
            'mains'
        ));
    }

    public function signup()
    {
        $lang = \App::getLocale();
        $langs = Lang::all();
        $translations = Translation::all();
        return view('signup',compact(
            'lang',
            'langs',
            'translations'
        ));
    }

    public function registration()
    {
        $lang = \App::getLocale();
        $langs = Lang::all();
        $translations = Translation::all();
        return view('registration',compact(
            'lang',
            'langs',
            'translations'
        ));
    }

    public function order(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'name' => 'required'
        ]);

        $data = $request->all();
        $data['text'] = $request->text;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['message'] = $request->message;
        Connect::create($data);

        return back()->with([
            'success' => true,
            'message' => 'We will contact you soon!'
        ]);
    }
}
