<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Bitfumes\Multiauth\Http\Middleware\redirectIfAuthenticatedAdmin;
use Illuminate\Http\Request;
use GitDown;

class BlogController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth:admin');

        $this->adminModel = config('multiauth.models.admin');
    }
    public function index()
    {
        //query the database
        $articles = Blog::orderByDesc('updated_at')->get();
        //return the view passing the list of articles
        return view ('articles.index', ['articles' => $articles]);
    }
    public function show($param)
    {
        //seach by id or the slug
        $articleFound = Blog::where('id', $param)
            ->orWhere('slug', $param)
            ->firstOrFail();

            //if article is published, go to article page
            return view('articles.show', ['article' => $articleFound]);

    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        //I'm just validating the presence of the title, but you can validate more fields
        $request->validate([
            'title'=> 'required',
            'body' => 'required',
            'summary' => 'required'
        ]);
        $random_string = md5(microtime());
        $image = 'empty';


        if($file=$request->file('image')){

            $name=$random_string.'.'.$file->getClientOriginalExtension();
            $file->move('image',$name);
            $image=$name;

        }

        //create new Article instance and assign values
        $article = new Blog;
        $article->title = $request->title;
        $article->body_md = $request->body;
        $article->summary_md = $request->summary;
        $article->meta_description = $request->meta_description;
        $article->online = $request->online;
        //generate article slug for nice URLs
        $article->slug = str_slug($article->title, '-');
        $article->image = $image;

        //parse body and summary to HTML via GitHub API
        $article->body_html = GitDown::parseAndCache($request->body) ;
        $article->summary_html = GitDown::parseAndCache($request->summary);

        //save article
        $article->save();

        return redirect()->route('blogs.index');
    }

    public function edit($param)
    {
        $article = Blog::where('slug',$param)->first();
        return view('articles.edit',compact('article'));
    }

    public function update(Request $request, $param)
    {
        //I'm just validating the presence of the title, but you can validate more fields
        $request->validate([
            'title'=> 'required',
        ]);

        $random_string = md5(microtime());
        $article = Blog::where('slug',$param)->first();
        $img = $article->image;

        if($file=$request->file('image')){

            $name=$random_string.'.'.$file->getClientOriginalExtension();
            $file->move('image',$name);
            $img=$name;

        }

        //create new Article instance and assign values

        $article->title = $request->title;
        $article->body_md = $request->body;
        $article->summary_md = $request->summary;
        $article->meta_description = $request->meta_description;
        $article->online = $request->online;
        //generate article slug for nice URLs
        $article->slug = str_slug($article->title, '-');
        $article->image = $img;

        //parse body and summary to HTML via GitHub API
        $article->body_html = GitDown::parseAndCache($request->body) ;
        $article->summary_html = GitDown::parseAndCache($request->summary);

        //save article
        $article->update();

        return redirect()->route('blogs.index')->with('success','Blogs Updated Successfully');
    }
    public function destroy($param)
    {
        $blog = Blog::where('id',$param)->first();
        $blog->delete();

        return redirect()->route('blogs.index')
            ->with('success','blog deleted successfully');
    }


}
