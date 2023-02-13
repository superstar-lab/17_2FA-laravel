<?php

namespace App\Http\Controllers;

use App\Blacklist;
use App\Models\Card;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->adminModel = config('multiauth.models.admin');
    }


    public function index(Request $request)
    {
        if($request->has('search') && $request->search){
            $cards = Card::where('name','LIKE','%'.$request->search.'%')->paginate(1000);
        }else{
            $cards = Card::paginate(10);
        }


        return view('vendor.multiauth.card.index',compact('cards'));
    }


    public function create()
    {
        return view('vendor.multiauth.card.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'rate' => 'required|numeric|max:999999',
            'category' => 'required'
        ]);

        Card::create([
            'name' => $data['name'],
            'rate' => $data['rate'],
            'image' => 'empty',
            'card_category_id' => $data['category']
        ]);

        return redirect()->route('cards.index')
            ->with('success','Card created successfully.');

    }


    public function show(Card $card)
    {
        return view('vendor.multiauth.card.show',compact('card'));
    }


    public function edit(Card $card)
    {
        return view('vendor.multiauth.card.edit',compact('card'));
    }


    public function update(Request $request, Card $card)
    {
        $data = $request->validate([
            'name' => 'required',
            'rate' => 'required|numeric|max:999999',
            'category' => 'required'
        ]);




        $card->update([
            'name' => $data['name'],
            'rate' => $data['rate'],
            'card_category_id' => $data['category']
        ]);

        return redirect()->route('cards.index')
            ->with('success','Card updated successfully');
    }

    public function toggle(Request $request,$id)
    {
        $card = Card::find($id);

        ($card->status == 0) ? $card->status = 1 : $card->status = 0;

        $card->save();


        return redirect()->back()
            ->with('success','Card updated successfully');

    }


    public function destroy(Card $card)
    {
        $card->delete();

        return redirect()->route('cards.index')
            ->with('success','Card deleted successfully');
    }
}
