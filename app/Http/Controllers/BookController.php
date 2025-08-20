<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Enums\BookStatus;
use App\Models\Publisher;
use App\Enums\BookLanguage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = Book::latest()->with(['author', 'publisher', 'category', 'stock'])->paginate(7);

        $author = Author::orderBy('name', 'asc')->get();
        $publisher = Publisher::orderBy('name', 'asc')->get();
        $category = Category::orderBy('name', 'asc')->get();

        return view(
            'role-admin.book.index',
            [
                'title' => 'Buku',
                'books' => $book,
                'authors' => $author,
                'publishers' => $publisher,
                'categories' => $category,
            ]
        );
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
        $validate_book = $request->validate([
            'title' => 'required|string|min:3',
            'isbn' => 'nullable|integer:strict|min_digits:4',
            'publication_year' => 'nullable|integer:strict|max_digits:4',
            'language' => ['nullable', new Enum(BookLanguage::class)],
            'number_of_pages' => 'nullable|integer:strict',
            'price' => 'required|integer:strict',
            'author_id' => 'required|string|integer:strict|exists:authors,id',
            'publisher_id' => 'required|string|integer:strict|exists:publishers,id',
            'category_id' => 'required|string|integer:strict|exists:categories,id',
            'synopsis' => 'nullable|string|min:10',
        ]);

        $validate_stock_book = $request->validate([
            'total' => 'nullable|integer:strict',
        ]);

        // Book code
        $validate_book['book_code'] = Str::of('BK-' . Str::random(9))->upper();
        // Book slug
        $validate_book['slug'] = Str::of(Str::slug($validate_book['title']) . '-' . Str::random(4))->lower();
        // Book status
        $validate_book['status'] = $validate_stock_book['total'] > 0 ? BookStatus::AVAILABLE->value : BookStatus::UNAVAILABLE->value;
        // Book cover
        if ($request->cover) {
            $newPath = Str::after($request->cover, 'tmp/');
            Storage::disk('public')->move($request->cover, "img/books/$newPath");
            $validate_book['cover'] = "img/books/$newPath";
        }

        $book = Book::create($validate_book);

        $book->stock()->create([
            'total' => $total = $validate_stock_book['total'],
            'available' => $total,
        ]);

        return Redirect::route('admin.books.index')->with(['message' => 'Berhasil menambahkan data buku baru']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validate_book = $request->validate([
            'title' => 'required|string|min:3',
            'isbn' => 'nullable|integer:strict|min:4',
            'publication_year' => 'nullable|integer:strict|max_digits:4',
            'language' => ['nullable', new Enum(BookLanguage::class)],
            'number_of_pages' => 'nullable|integer:strict',
            'price' => 'nullable|integer:strict',
            'author_id' => 'required|string|integer:strict|exists:authors,id',
            'publisher_id' => 'required|string|integer:strict|exists:publishers,id',
            'category_id' => 'required|string|integer:strict|exists:categories,id',
            'synopsis' => 'nullable|string|min:10',
        ]);

        $validate_stock_book = $request->validate([
            'total' => 'nullable|integer:strict|min:' . $book->stock->total,
        ]);

        $validate_book['status'] = $validate_stock_book['total'] > 0 ? BookStatus::AVAILABLE->value : BookStatus::UNAVAILABLE->value;

        if ($request->cover) {
            if (!empty($book->cover)) {
                Storage::disk('public')->delete($book->cover);
            }
            $newPath = Str::after($request->cover, 'tmp/');

            Storage::disk('public')->move($request->cover, "img/books/$newPath");

            $validate_book['cover'] = "img/books/$newPath";
        }

        $book->update($validate_book);

        return Redirect::route('admin.books.index')->with(['message' => 'Berhasil mengubah data buku yang sudah ada']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if (!empty($book->cover)) {
            Storage::disk('public')->delete($book->cover);
        }
        $book->delete();

        return Redirect::route('admin.books.index')->with(['message' => 'Berhasil menghapus data buku yang tidak terpakai']);
    }
}
