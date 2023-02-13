<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
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
        $announcements = Announcement::all();
        return view('vendor.multiauth.announcement.index',compact('announcements'));
    }

    public function create()
    {
        return view('vendor.multiauth.announcement.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'announcement' => 'required',
        ]);

        Announcement::create($request->all());

        return redirect()->route('announcement.index')
            ->with('success','Announcement created successfully.');
    }


    public function show(Announcement $announcement)
    {
        return view('vendor.multiauth.announcement.show',compact('announcement'));
    }


    public function edit(Announcement $announcement)
    {
        return view('vendor.multiauth.announcement.edit',compact('announcement'));
    }


    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'announcement' => 'required',

        ]);

        $announcement->update($request->all());

        return redirect()->route('announcement.index')
            ->with('success','announcement updated successfully');
    }


    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()->route('announcement.index')
            ->with('success','announcement deleted successfully');
    }
}
