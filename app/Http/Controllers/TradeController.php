<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Trade;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Bitfumes\Multiauth\Http\Middleware\redirectIfAuthenticatedAdmin;
use Illuminate\Http\Request;
use GitDown;

class TradeController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
        $this->adminModel = config('multiauth.models.admin');
    }
    public function index()
    {
        //query the database
        $article = Trade::where('id',1)->first();
        //return the view passing the list of articles
        return view ('trade.show', ['article' => $article]);
    }
    
    

    public function edit()
    {
        $article = Trade::where('id',1)->first();
        return view('trade.edit',compact('article'));
    }

    public function store(Request $request)
    {
        //I'm just validating the presence of the title, but you can validate more fields
        $request->validate([
            'body'=> 'required',
        ]);

        //create new Article instance and assign values
        $article = Trade::where('id',1)->first();
        $article->body_md = $request->body;
        //parse body and summary to HTML via GitHub API
        $article->body_html = GitDown::parseAndCache($request->body) ;
        //save article
        $article->update();

        return redirect()->route('trade.index')->with('success','How to Trade Page Updated Successfully');
    }
}
