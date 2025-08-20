<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\LoanBook;
use App\Models\ReturnBook;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Enums\ReturnBookStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ReturnBookUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $returnBook = ReturnBook::latest()
            ->with(['loanBook', 'book', 'user', 'returnBookCheck', 'fineBook'])
            ->where('user_id', Auth::user()->id)
            ->paginate(7);

        $loanBook = LoanBook::orderBy('loan_code', 'asc')->with(['user', 'book', 'returnBook'])->get();

        return view('role-user.return-book.index', [
            'title' => 'Pengembalian Buku',
            'returnBooks' => $returnBook,
            'loanBooks' => $loanBook
        ]);
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
        $returnBook = $request->validate([
            'loan_id' => 'required|integer|exists:loan_books,id',
            'user_id' => 'required|integer|exists:users,id',
            'book_id' => 'required|integer|exists:books,id',
            'return_date' => 'nullable|date',
            'name' => 'nullable',
            'title' => 'nullable',
        ]);

        // Fullname user
        $name = $returnBook['name'];
        $user_code = collect(explode(' ', trim($name)))->map(fn($word) => strtoupper(substr($word, 0, 1)))->implode('');
        // Title book
        $book_title = $returnBook['title'];
        $book_code = collect(explode(' ', trim($book_title)))->map(fn($word) => strtoupper(substr($word, 0, 1)))->implode('');
        // Return code
        $returnBook['return_code'] = Str::of('RTN-' . $user_code . '-' . $book_code . '-' . Str::random(6))->upper();

        // Return date
        $returnBook['return_date'] = Carbon::parse($returnBook['return_date'])->format('Y-m-d');

        // Status Return
        $returnBook['status'] = ReturnBookStatus::CHECKED->value;

        $return = ReturnBook::create([
            'return_code' => $returnBook['return_code'],
            'loan_id' => $returnBook['loan_id'],
            'user_id' => $returnBook['user_id'],
            'book_id' => $returnBook['book_id'],
            'return_date' => $returnBook['return_date'],
            'status' => $returnBook['status'],
        ]);

        return Redirect::route('user.loan-books.index')->with(['message' => 'Berhasil mengembalikan buku']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
