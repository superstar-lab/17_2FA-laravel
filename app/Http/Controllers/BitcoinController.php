<?php

namespace App\Http\Controllers;


use App\Bitcoin;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class BitcoinController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
        $this->adminModel = config('multiauth.models.admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show()
    {
        $bitcoin = Bitcoin::where('id',1)->first();
        return view('vendor.multiauth.bitcoin.index',compact('bitcoin'));
    }

    public function showUsdt()
    {
        $bitcoin = Bitcoin::where('id',2)->first();
        return view('vendor.multiauth.usdt.index',compact('bitcoin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }



    public function update(Request $request)
    {
        $bitcoin = Bitcoin::where('id',1)->first();
        $request->validate([
            'address' => 'required',
            'rate' => 'required',
        ]);

        $bitcoin->update($request->all());

        return back()
            ->with('success','Bitcoin details updated successfully');
    }

    public function updateUsdt(Request $request)
    {
        $bitcoin = Bitcoin::where('id',2)->first();
        $request->validate([
            'address' => 'required',
            'rate' => 'required',
        ]);

        $bitcoin->update($request->all());

        return back()
            ->with('success','Usdt details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
