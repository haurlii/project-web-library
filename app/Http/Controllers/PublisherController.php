<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publisher = Publisher::latest()->paginate(7);
        return view('publisher.index', ['title' => 'Penerbit Buku', 'publishers' => $publisher]);
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
            'logo' => 'nullable|image|max:10000',
        ]);

        $validated['slug'] = Str::slug($request->name) . Str::random(6);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('img/publishers', 'public');
            $validated['logo'] = $path;
        };

        Publisher::create($validated);

        return redirect('/publishers')->with(['message' => 'Success Add Data Publisher']);
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
            'logo' => 'nullable|image|max:10000',
        ]);

        if ($request->name != $publisher->name) {
            $validated['slug'] = Str::slug($request->name) . Str::random(6);
        }

        if ($request->hasFile('logo')) {
            if (!empty($publisher->logo)) {
                Storage::disk('public')->delete($publisher->logo);
            }
            $path = $request->file('logo')->store('img/publishers', 'public');
            $validated['logo'] = $path;
        };

        $publisher->update($validated);

        return redirect('/publishers')->with('message', 'Success Edit Data Publisher');
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

        return redirect('/publishers')->with(['message' => 'Success Delete Data Publisher']);
    }
}
