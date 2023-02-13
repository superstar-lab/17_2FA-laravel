<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Giftcard;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class SellingCardController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth:admin');
       
        $this->adminModel = config('multiauth.models.admin');
    }


    public function index()
    {
        $cards = Giftcard::all();
        return view('vendor.multiauth.sellingcard.index',compact('cards'));
    }


    public function create()
    {
        return view('vendor.multiauth.sellingcard.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'rate' => 'required|numeric|max:999999',
        ]);







        Giftcard::create([
            'name' => $data['name'],
            'rate' => $data['rate'],
        ]);

        return redirect()->route('selling-cards.index')
            ->with('success','Card created successfully.');

    }


    public function show(Giftcard $selling_card)
    {
        $card = $selling_card;
        return view('vendor.multiauth.sellingcard.show',compact('card'));
    }


    public function edit(Giftcard $selling_card)
    {
        $card = $selling_card;
        return view('vendor.multiauth.sellingcard.edit',compact('card'));
    }


    public function update(Request $request, Giftcard $selling_card)
    {
        $card = $selling_card;
        $data = $request->validate([
            'name' => 'required',
            'rate' => 'required|numeric|max:999999',
        ]);

            $card->update([
                'name' => $data['name'],
                'rate' => $data['rate'],
            ]);

        return redirect()->route('selling-cards.index')
            ->with('success','Card updated successfully');
    }
    
    
    
    public function toggle(Request $request,$id)
    {
        $card = Giftcard::find($id);
        
        ($card->status == 0) ? $card->status = 1 : $card->status = 0;
        
        $card->save();
        
    
        return redirect()->back()
            ->with('success','Card updated successfully');
         
    }


    public function destroy(Giftcard $selling_card)
    {
        $card = $selling_card;
        $card->delete();

        return redirect()->route('selling-cards.index')
            ->with('success','Card deleted successfully');
    }
}
