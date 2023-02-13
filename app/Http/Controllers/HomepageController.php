<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Trade;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function about(){
        $about = About::where('id',1)->first();
        dd($about);
        return view('about-us',compact('about'));
    }
    public function trade(){
        $trade = Trade::where('id',1)->first();
        dd($trade);
        return view('how-to-trade',compact('trade'));
    }

    public function blogs(){
        $blogs = Blog::orderByDesc('updated_at')->where('online', true)->get();
        return view('all-blogs',compact('blogs'));
    }
    public function blogshow($param)
    {
        //seach by id or the slug
        $articleFound = Blog::where('id', $param)
            ->orWhere('slug', $param)
            ->firstOrFail();
        if ($articleFound->online){
            //if article is published, go to article page
            return view('single-blog', ['blog' => $articleFound]);
        }

        //if article not published, redirect to articles.index page
        return redirect()->route('all.blogs');
    }
}
