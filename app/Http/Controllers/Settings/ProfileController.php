<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth','verified');
    }
    public function edit()
    {
        # code...
        return view('settings.profile', [
            'user' => auth()->user()
        ]);
    }
    public function update()
    {
        # code...
    }
}
