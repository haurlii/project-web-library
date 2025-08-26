<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\LoanBook;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Enums\ReturnBookStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class LoanBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loan = LoanBook::latest()->with(['book', 'returnBook', 'user'])->paginate(7);

        $user = User::orderBy('firstname', 'asc')->get();
        $book = Book::orderBy('title', 'asc')->get();

        return view(
            'role-admin.loan-book.index',
            [
                'title' => 'Peminjaman Buku',
                'loans' => $loan,
                'users' => $user,
                'books' => $book,
            ]
        );
    }

    public function store(Request $request)
    {
        $loan = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'book_id' => 'required|integer|exists:books,id',
            'loan_date' => 'nullable|date',
            'due_date' => 'nullable|date',
        ]);

        // Cek buku sudah pinjam atau belum
        $previous_loan = LoanBook::where(['user_id' => $loan['user_id'], 'book_id' => $loan['book_id']])->whereDoesntHave('returnBook')->exists();
        if ($previous_loan) {
            return Redirect::route('admin.loan-books.index')->with(['error' => 'Siswa sudah meminjam buku dengan judul yang sama!']);
        }

        // Fullname user
        $user = User::where('id', $loan['user_id'])->first();
        $name = $user->firstname . ' ' . $user->lastname;
        $user_code = collect(explode(' ', trim($name)))->map(fn($word) => strtoupper(substr($word, 0, 1)))->implode('');

        // Book title
        $book = Book::where('id', $loan['book_id'])->first();
        $book_code = collect(explode(' ', trim($book->title)))->map(fn($word) => strtoupper(substr($word, 0, 1)))->implode('');

        // Loan code
        $loan['loan_code'] = Str::of('LN-' . $user_code . '-' . $book_code . '-' . Str::random(6))->upper();

        // Loan Date dan Due Date
        $loan['loan_date'] = Carbon::parse($loan['loan_date'])->format('Y-m-d');
        $loan['due_date'] = Carbon::parse($loan['due_date'])->format('Y-m-d');

        LoanBook::create($loan);

        // Update book stock
        $stock_available = $book->stock->available - 1;
        $stock_loan = $book->stock->loan + 1;

        $book->stock()->update([
            'available' => $stock_available,
            'loan' => $stock_loan,
        ]);

        return Redirect::route('admin.loan-books.index')->with(['message' => 'Berhasil meminjam buku']);
    }
}
