<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function edit()
    {
        # code...
        return view('settings.profile', [
            'user' => auth()->user()
        ]);
    }
    public function update(ProfileUpdateRequest $request)
    {
        # code...
        $request->user()->update($request->validated());
        return back()->with('message', 'Profile has been updated successfully!');
    }
}
