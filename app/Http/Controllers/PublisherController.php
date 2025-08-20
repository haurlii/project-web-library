<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publisher = Publisher::latest()->paginate(7);
        return view('role-admin.publisher.index', ['title' => 'Penerbit Buku', 'publishers' => $publisher]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:5',
            'address' => 'nullable|string|min:5',
            'email' => 'nullable|email:dns',
            'contact' => 'nullable|string|min:9',
        ]);

        $validated['slug'] = Str::slug($request->name) . Str::random(6);

        if ($request->logo) {
            $newPath = Str::after($request->logo, 'tmp/');

            Storage::disk('public')->move($request->logo, "img/publishers/$newPath");

            $validated['logo'] = "img/publishers/$newPath";
        }

        Publisher::create($validated);

        return Redirect::route('admin.publishers.index')->with(['message' => 'Berhasil menambhkan data penerbit buku']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:5',
            'address' => 'nullable|string|min:5',
            'email' => 'nullable|email:dns',
            'contact' => 'nullable|string|min:9',
        ]);

        if ($request->name != $publisher->name) {
            $validated['slug'] = Str::slug($request->name) . Str::random(6);
        }

        if ($request->logo) {
            if (!empty($publisher->logo)) {
                Storage::disk('public')->delete($publisher->logo);
            }
            $newPath = Str::after($request->logo, 'tmp/');

            Storage::disk('public')->move($request->logo, "img/publishers/$newPath");

            $validated['logo'] = "img/publishers/$newPath";
        }

        $publisher->update($validated);

        return Redirect::route('admin.publishers.index')->with('message', 'Berhasil mengubah data penerbit buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        if (!empty($publisher->logo)) {
            Storage::disk('public')->delete($publisher->logo);
        }
        $publisher->delete();

        return Redirect::route('admin.publishers.index')->with(['message' => 'Berhasil menghapus data penerbit buku']);
    }
}
