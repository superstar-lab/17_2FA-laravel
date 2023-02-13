<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Giftcard;
use App\Operator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class OperatorController extends Controller
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
        $cards = Operator::all();
        return view('vendor.multiauth.operators.index',compact('cards'));
    }


    public function create()
    {
        return view('vendor.multiauth.operators.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'rate' => 'required|numeric|max:999999',
        ]);







        Operator::create([
            'name' => $data['name'],
            'rate' => $data['rate'],
        ]);

        return redirect()->route('operators.index')
            ->with('success','Card created successfully.');

    }


    public function show(Operator $operator)
    {
        $card = $operator;
        return view('vendor.multiauth.operators.show',compact('card'));
    }


    public function edit(Operator $operator)
    {
        $card = $operator;
        return view('vendor.multiauth.operators.edit',compact('card'));
    }


    public function update(Request $request, Operator $operator)
    {
        $card = $operator;
        $data = $request->validate([
            'name' => 'required',
            'rate' => 'required|numeric|max:999999',
        ]);

            $card->update([
                'name' => $data['name'],
                'rate' => $data['rate'],
            ]);

        return redirect()->route('operators.index')
            ->with('success','Card updated successfully');
    }
    
    public function toggle(Request $request,$id)
    {
        $card = Operator::find($id);
        
        ($card->status == 0) ? $card->status = 1 : $card->status = 0;
        
        $card->save();
        
    
        return redirect()->back()
            ->with('success','Operator updated successfully');
         
    }
    


    public function destroy(Operator $operator)
    {
        $card = $operator;
        $card->delete();

        return redirect()->route('operators.index')
            ->with('success','Card deleted successfully');
    }
}
