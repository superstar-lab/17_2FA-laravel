<?php

namespace App\Http\Controllers;


use App\Term;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Bitfumes\Multiauth\Http\Middleware\redirectIfAuthenticatedAdmin;
use Illuminate\Http\Request;


class TermsController extends Controller
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
        $terms = Term::where('id',1)->first();
        //return the view passing the list of articles
        return view ('terms.show', ['terms' => $terms]);
    }


    public function edit()
    {
        $terms = Term::where('id',1)->first();
        return view('terms.edit',compact('terms'));
    }

    public function store(Request $request)
    {
        //I'm just validating the presence of the title, but you can validate more fields
        $request->validate([
            'text'=> 'required',
        ]);

        //create new Article instance and assign values
        $terms = Term::where('id',1)->first();
        $terms->text = $request->text;

        //save article
        $terms->update();

        return redirect()->route('terms.index')->with('success','Terms and Conditions  Updated Successfully');
    }
}
