<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::latest()->paginate(7);
        return view('category.index', ['title' => 'Kategori Buku', 'categories' => $category]);
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
            'cover' => 'nullable|image|max:10000',
        ]);

        $validated['slug'] = Str::slug($request->name) . Str::random(6);

        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->store('img/categories', 'public');
            $validated['cover'] = $path;
        };

        Category::create($validated);

        return redirect('/categories')->with(['message' => 'Success Add Data Category']);
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
            'cover' => 'nullable|image|max:10000',
        ]);

        if ($request->name != $category->name) {
            $validated['slug'] = Str::slug($request->name) . Str::random(6);
        }

        if ($request->hasFile('cover')) {
            if (!empty($category->cover)) {
                Storage::disk('public')->delete($category->cover);
            }
            $path = $request->file('cover')->store('img/categories', 'public');
            $validated['cover'] = $path;
        };

        $category->update($validated);

        return redirect('/categories')->with('message', 'Success Edit Data Category');
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

        return redirect('/categories')->with(['message' => 'Success Delete Data Category']);
    }
}
