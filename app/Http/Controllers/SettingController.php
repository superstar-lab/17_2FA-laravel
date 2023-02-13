<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SettingController extends Controller
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
        return view('vendor.multiauth.settings.index');
    }

    public function update(Request $request)
    {

            $keys = $request->except('_token');


            foreach ($keys as $key => $value)
            {
                Home::set($key, $value);
            }

        return back()->with('success', 'Homepage Updated Successfully');
    }
}
