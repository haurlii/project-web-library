<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Fine;
use App\Models\User;
use App\Models\LoanBook;
use App\Models\ReturnBook;
use App\Models\FineSetting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Enums\ReturnBookStatus;
use App\Models\ReturnBookCheck;
use App\Enums\FinePaymentStatus;
use App\Enums\ReturnBookCondition;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Enum;

class ReturnBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $returnBook = ReturnBook::latest()->with(['loanBook', 'book', 'user', 'returnBookCheck', 'fineBook'])->paginate(7);

        $loanBook = LoanBook::orderBy('loan_code', 'asc')->with(['user', 'book', 'returnBook'])->get();

        return view('return-book.index', [
            'title' => 'Pengembalian Buku',
            'returnBooks' => $returnBook,
            'loanBooks' => $loanBook
        ]);
    }

    public function getLoanBook(LoanBook $loan_book)
    {
        $loan_book->load(['user', 'book'])->firstOrFail();

        return response()->json([
            'loan_id' => $loan_book->id,
            'user_id' => $loan_book->user_id,
            'name' => $loan_book->user->firstname . ' ' . $loan_book->user->lastname,
            'book_id' => $loan_book->book_id,
            'title' => $loan_book->book->title,
            'due_date' => $loan_book->due_date,
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
            'condition' => ['nullable', new Enum(ReturnBookCondition::class)],
            'notes' => 'nullable|string|max:255',
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

        // //  Data loan
        // $loan = LoanBook::where('id', $return->id)->first();
        // // Harga buku
        // $price_book = $loan->book->price;
        // // Date
        // $due_date = Carbon::parse($loan->due_date->format('Y-m-d'));
        // $return_date = Carbon::parse($loan->returnBook->return_date->format('Y-m-d'));

        // // Fine Setting
        // $fine = FineSetting::first();
        // $late_fee_per_day = $fine->late_fee_per_day;

        // if ($returnBook['condition'] == ReturnBookCondition::GOOD->value) {
        //     // Kondisi buku sesuai 
        //     $other_fee = 0;
        // } elseif ($returnBook['condition'] == ReturnBookCondition::DAMAGE->value) {
        //     $damage_fee_percentage = $fine->damage_fee_percentage;
        //     // kondisi buku rusak
        //     $other_fee = $price_book * ($damage_fee_percentage / 100);
        // } else {
        //     $lost_fee_percentage = $fine->lost_fee_percentage;
        //     // kondisi buku hilang
        //     $other_fee = $price_book * ($lost_fee_percentage / 100);
        // }

        // // Denda keterlambatan 
        // $late_fee = 0;

        // if ($return_date->gt($due_date)) {
        //     // Selisih hari
        //     $diff_date = $due_date->diffInDays($return_date, true);
        //     // Denda keterlambatan
        //     $late_fee = $late_fee_per_day * $diff_date;
        // }

        // // Total fine
        // $total_fee = $late_fee + $other_fee;
        // // Status Pembayaran 
        // if ($total_fee == 0) {
        //     $payment_status = FinePaymentStatus::SUCCESS->value;
        // } else {
        //     $payment_status = FinePaymentStatus::PENDING->value;
        // }

        // ReturnBookCheck::create([
        //     'return_book_id' => $return->id,
        //     'condition' => $returnBook['condition'],
        //     'notes' => $return['notes'],
        // ]);

        // $return->update([
        //     'status' => ReturnBookStatus::RETURNED->value,
        // ]);

        // $return->book->stock->update([
        //     'available' => $return->book->stock->available + 1,
        //     'loan' => $return->book->stock->loan - 1,
        // ]);

        // // Create fine
        // $fine = Fine::create([
        //     'return_book_id' => $return->id,
        //     'user_id' => $return->user_id,
        //     'late_fee' => $late_fee,
        //     'other_fee' => $other_fee,
        //     'total_fee' => $total_fee,
        //     'payment_status' => $payment_status,
        //     'fine_date' => Carbon::now(),
        // ]);

        return redirect('/return-books')->with(['message' => 'Success Return Book']);
    }

    /**
     * Display the specified resource.
     */
    public function show(ReturnBook $return_book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReturnBook $return_book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReturnBook $return_book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReturnBook $return_book)
    {
        //
    }
}
