<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $author = Author::latest()->paginate(7);
        return view('author.index', ['title' => 'Penulis Buku', 'authors' => $author]);
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
            'avatar' => 'image|max:10000',
        ]);

        $validated['slug'] = Str::slug($validated['name']) . Str::random(6);

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('img/authors', 'public');
            $validated['avatar'] = $path;
        };

        Author::create($validated);

        return redirect('/authors')->with(['message' => 'Success Add Data Author']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:5',
            'avatar' => 'image|max:10000',
        ]);

        if ($request->name != $author->name) {
            $validated['slug'] = Str::slug($request->name) . Str::random(6);
        }

        if ($request->hasFile('avatar')) {
            if (!empty($author->avatar)) {
                Storage::disk('public')->delete($author->avatar);
            }
            $path = $request->file('avatar')->store('img/authors', 'public');
            $validated['avatar'] = $path;
        };

        $author->update($validated);

        return redirect('/authors')->with('message', 'Success Edit Data Author');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        if (!empty($author->avatar)) {
            Storage::disk('public')->delete($author->avatar);
        }
        $author->delete();

        return redirect('/authors')->with(['message' => 'Success Delete Data Author']);
    }
}
