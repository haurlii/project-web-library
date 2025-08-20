<?php

namespace App\Http\Controllers;

use App\Models\FineSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FineSettingController extends Controller
{
    public function index()
    {
        $fineSetting = FineSetting::first();

        return view('role-admin.fine-setting.index', ['title' => 'Pengaturan Denda', 'fineSetting' => $fineSetting]);
    }

    public function update(Request $request, FineSetting $fineSetting)
    {
        $fine = $request->validate([
            'late_fee_per_day' => 'required|integer',
            'damage_fee_percentage' => 'required|integer|min:0|max:100',
            'lost_fee_percentage' => 'required|integer|min:0|max:100',
        ]);

        $fineSetting->update($fine);

        return Redirect::route('admin.fine-settings.index')->with(['message' => 'Berhasil mengubah setingan denda']);
    }
}
