<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::latest()->paginate(7);
        return view('role-admin.category.index', ['title' => 'Kategori Buku', 'categories' => $category]);
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
            'name' => 'required|string|min:3',
            'description' => 'nullable|string|min:10',
        ]);

        $validated['slug'] = Str::slug($request->name) . Str::random(6);

        if ($request->cover) {
            $newPath = Str::after($request->cover, 'tmp/');

            Storage::disk('public')->move($request->cover, "img/categories/$newPath");

            $validated['cover'] = "img/categories/$newPath";
        }

        Category::create($validated);

        return Redirect::route('admin.categories.index')->with(['message' => 'Berhasil menambahkan data kategori buku']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'description' => 'nullable|string|min:10',
        ]);

        if ($request->name != $category->name) {
            $validated['slug'] = Str::slug($request->name) . Str::random(6);
        }

        if ($request->cover) {
            if (!empty($category->cover)) {
                Storage::disk('public')->delete($category->cover);
            }
            $newPath = Str::after($request->cover, 'tmp/');

            Storage::disk('public')->move($request->cover, "img/categories/$newPath");

            $validated['cover'] = "img/categories/$newPath";
        }

        $category->update($validated);

        return Redirect::route('admin.categories.index')->with('message', 'Berhasil mengubah data kategori buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (!empty($category->cover)) {
            Storage::disk('public')->delete($category->cover);
        }
        $category->delete();

        return Redirect::route('admin.categories.index')->with(['message' => 'Berhasil menghapus data kategori buku']);
    }
}
