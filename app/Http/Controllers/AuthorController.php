<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $author = Author::latest()->paginate(7);
        return view('role-admin.author.index', ['title' => 'Penulis Buku', 'authors' => $author]);
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
        ]);

        $validated['slug'] = Str::slug($validated['name']) . '-' . Str::random(6);

        if ($request->avatar) {
            $newPath = Str::after($request->avatar, 'tmp/');

            Storage::disk('public')->move($request->avatar, "img/authors/$newPath");

            $validated['avatar'] = "img/authors/$newPath";
        }

        Author::create($validated);

        return Redirect::route('admin.authors.index')->with(['message' => 'Berhasil menambahkan data penulis buku']);
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
        ]);

        if ($request->name != $author->name) {
            $validated['slug'] = Str::slug($request->name) . '-' . Str::random(6);
        }

        if ($request->avatar) {
            if (!empty($author->avatar)) {
                Storage::disk('public')->delete($author->avatar);
            }
            $newPath = Str::after($request->avatar, 'tmp/');

            Storage::disk('public')->move($request->avatar, "img/authors/$newPath");

            $validated['avatar'] = "img/authors/$newPath";
        }

        $author->update($validated);

        return Redirect::route('admin.authors.index')->with('message', 'Berhasil mengubah data penulis buku');
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

        return Redirect::route('admin.authors.index')->with(['message' => 'Berhasil menghapus data penulis buku']);
    }
}
