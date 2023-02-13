<?php

namespace App\Http\Controllers;

use App\Blacklist;
use App\CardCategory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardCategoriesController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->adminModel = config('multiauth.models.admin');
    }

    public function index()
    {
        $card_categories = CardCategory::paginate(5);

        return view('multiauth::card-category.index',compact('card_categories'));
    }

    public function create()
    {
        return view('multiauth::card-category.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'slug'  => 'required|string',
            'image'  => 'required|image'
        ]);

        $random_string = md5(microtime());
        $image = 'empty';


        if($file=$request->file('image')){

            if($file->getClientOriginalExtension() === 'jpg' || $file->getClientOriginalExtension() === 'png' || $file->getClientOriginalExtension() === 'jpeg' || $file->getClientOriginalExtension() === 'JPG' || $file->getClientOriginalExtension() === 'JPEG' || $file->getClientOriginalExtension() === 'PNG') {
                $name = $random_string . '.' . $file->getClientOriginalExtension();
                $file->storeAs(
                    'image', $name
                );
                $image=$name;
            }
        }

        CardCategory::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $image
        ]);

        return redirect()->route('card-category.index')
            ->with('success','Card Category created successfully.');
    }

    public function edit(CardCategory $card_category)
    {
        return view('multiauth::card-category.edit',compact('card_category'));
    }

    public function update(Request $request,CardCategory $card_category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'image'
        ]);

        $random_string = md5(microtime());
        $image = null;

        if($file=$request->file('image')){

            if($file->getClientOriginalExtension() === 'jpg' || $file->getClientOriginalExtension() === 'png' || $file->getClientOriginalExtension() === 'jpeg' || $file->getClientOriginalExtension() === 'JPG' || $file->getClientOriginalExtension() === 'JPEG' || $file->getClientOriginalExtension() === 'PNG') {
                $name = $random_string . '.' . $file->getClientOriginalExtension();
                $file->storeAs(
                    'image', $name
                );
                $image=$name;
            }
        }

        $card_category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $image ?? $card_category->image
        ]);

        return redirect()->route('card-category.index')
            ->with('success','Card Category updated successfully');
    }

    public function destroy(CardCategory $cardCategory)
    {
        $cardCategory->delete();

        return redirect()->route('card-category.index')
            ->with('success','Card Category Deleted successfully');
    }


}
