<?php

namespace App\Http\Controllers;


use App\Models\Testimonial;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;


class TestimonialController extends Controller
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
        $testimonials = Testimonial::all();
        return view('vendor.multiauth.testimonial.index',compact('testimonials'));
    }


    public function create()
    {
        return view('vendor.multiauth.testimonial.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'text' => 'required',
        ]);

        Faq::create($request->all());

        return redirect()->route('testimonial.index')
            ->with('success','Testimonial created successfully.');
    }


    public function show(Testimonial $testimonial)
    {
        return view('vendor.multiauth.testimonial.show',compact('testimonial'));
    }


    public function edit(Testimonial $testimonial)
    {
        return view('vendor.multiauth.testimonial.edit',compact('testimonial'));
    }


    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required',
            'text' => 'required',

        ]);

        $testimonial->update($request->all());

        return redirect()->route('testimonial.index')
            ->with('success','Testimonial updated successfully');
    }


    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('testimonial.index')
            ->with('success','Testimonial deleted successfully');
    }
}
