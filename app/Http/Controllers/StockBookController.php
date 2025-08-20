<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\StockBook;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;

class StockBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stock = StockBook::latest()->with(['book'])->paginate(7);
        return view('role-admin.stock-book.index', ['title' => 'Stok Buku', 'stocks' => $stock]);
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
        // 
    }

    /**
     * Display the specified resource.
     */
    public function show(StockBook $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StockBook $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StockBook $stock_book)
    {
        $validated = $request->validate([
            'total' => 'required|integer:strict|min:' . $stock_book->total,
            'available' => 'required|integer:strict|min:' . $stock_book->available,
            'loan' => 'required|integer:strict|min:' . $stock_book->loan,
            'damage' => 'required|integer:strict|min:' . $stock_book->damage,
            'lost' => 'required|integer:strict|min:' . $stock_book->lost,
        ]);

        // Total sebelumnya
        $previous_total = $stock_book->available + $stock_book->loan + $stock_book->damage + $stock_book->lost;

        // Total baru
        $new_total = $validated['total'];

        // Selisih total
        $difference_total = $new_total - $previous_total;

        $validated['available'] = $previous_total + $difference_total;

        $validated['book_id'] = $stock_book->book->id;

        $stock_book->update($validated);

        return Redirect::route('admin.stock-books.index')->with(['message' => 'Berhasil mengubah data stok buku']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StockBook $stock)
    {
        //
    }
}
