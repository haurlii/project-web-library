<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Fine;
use App\Models\ReturnBook;
use App\Models\FineSetting;
use Illuminate\Http\Request;
use App\Enums\ReturnBookStatus;
use App\Models\ReturnBookCheck;
use App\Enums\FinePaymentStatus;
use App\Enums\ReturnBookCondition;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Facades\Redirect;

class ReturnBookCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $check = $request->validate([
            'return_book_id' => 'required|integer|exists:return_books,id',
            'user_id' => 'required|integer|exists:users,id',
            'condition' => ['required', new Enum(ReturnBookCondition::class)],
            'notes' => 'nullable|string|max:255',
        ]);

        // Return Book
        $returnBook = ReturnBook::where('id', $check['return_book_id'])->first();
        // Harga buku
        $price_book = $returnBook->book->price;
        // Date
        $due_date = Carbon::parse($returnBook->loanBook->due_date->format('Y-m-d'));
        $return_date = Carbon::parse($returnBook->return_date->format('Y-m-d'));

        // Fine Setting
        $fine = FineSetting::first();
        $late_fee_per_day = $fine->late_fee_per_day;

        // Status Pembayaran ditunda
        $payment_status = FinePaymentStatus::PENDING->value;

        if ($check['condition'] == ReturnBookCondition::GOOD->value) {
            // Kondisi buku sesuai 
            $other_fee = 0;
            // Status pembayaran lunas
            $payment_status = FinePaymentStatus::SUCCESS->value;
        } elseif ($check['condition'] == ReturnBookCondition::DAMAGE->value) {
            $damage_fee_percentage = $fine->damage_fee_percentage;
            // kondisi buku rusak
            $other_fee = $price_book * ($damage_fee_percentage / 100);
        } else {
            $lost_fee_percentage = $fine->lost_fee_percentage;
            // kondisi buku hilang
            $other_fee = $price_book * ($lost_fee_percentage / 100);
        }

        // Denda keterlambatan 
        $late_fee = 0;

        if ($return_date->gt($due_date)) {
            // Selisih hari
            $diff_date = $due_date->diffInDays($return_date, true);
            // Denda keterlambatan
            $late_fee = $late_fee_per_day * $diff_date;
        }

        // Total fine
        $total_fee = $late_fee + $other_fee;

        ReturnBookCheck::create($check);

        $returnBook->update([
            'status' => ReturnBookStatus::RETURNED->value,
        ]);

        $returnBook->book->stock->update([
            'available' => $returnBook->book->stock->available + 1,
            'loan' => $returnBook->book->stock->loan - 1,
        ]);

        // Create fine
        $fine = Fine::create([
            'return_book_id' => $check['return_book_id'],
            'user_id' => $check['user_id'],
            'late_fee' => $late_fee,
            'other_fee' => $other_fee,
            'total_fee' => $total_fee,
            'payment_status' => $payment_status,
            'fine_date' => Carbon::now(),
        ]);

        return Redirect::route('admin.return-books.index')->with(['message' => 'Berhasil cek data pengembalian buku']);
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
