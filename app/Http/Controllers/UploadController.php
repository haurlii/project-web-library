<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;

class UploadController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('tmp', 'public');
        }
        return $path;
    }

    public function uploadCover(Request $request)
    {
        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->store('tmp', 'public');
        }
        return $path;
    }

    public function uploadLogo(Request $request)
    {
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('tmp', 'public');
        }
        return $path;
    }
}
