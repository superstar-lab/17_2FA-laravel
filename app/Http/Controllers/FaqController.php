<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class FaqController extends Controller
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
        $faqs = Faq::all();
        return view('vendor.multiauth.faqs.index',compact('faqs'));
    }


    public function create()
    {
        return view('vendor.multiauth.faqs.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        Faq::create($request->all());

        return redirect()->route('faq.index')
            ->with('success','Faq created successfully.');
    }


    public function show(Faq $faq)
    {
        return view('vendor.multiauth.faqs.show',compact('faq'));
    }


    public function edit(Faq $faq)
    {
        return view('vendor.multiauth.faqs.edit',compact('faq'));
    }


    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',

        ]);

        $faq->update($request->all());

        return redirect()->route('faq.index')
            ->with('success','Faq updated successfully');
    }


    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('faq.index')
            ->with('success','Faq deleted successfully');
    }
}
