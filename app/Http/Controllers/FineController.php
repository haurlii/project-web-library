<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Fine;
use App\Models\User;
use Illuminate\Http\Request;
use App\Enums\ReturnBookStatus;
use App\Enums\FinePaymentStatus;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class FineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fines = Fine::latest()->with(['user', 'returnBook.book', 'returnBook.loanBook'])->where('total_fee', '>', 0)->whereHas('returnBook', function ($query) {
            $query->where('status', ReturnBookStatus::RETURNED->value);
        })->paginate(7);

        // dd($fines->pluck('user.firstname', 'user.lastname'));

        // Count day
        $countDay = Fine::where('total_fee', '>', 0)->whereBetween('fine_date', [now()->format('Y-m-d'), now()->format('Y-m-d')])->count();
        // Count week
        $countWeek = Fine::where('total_fee', '>', 0)->whereBetween('fine_date', [now()->startOfWeek()->format('Y-m-d'), now()->endOfWeek()->format('Y-m-d')])->count();
        // Count month
        $countMonth = Fine::where('total_fee', '>', 0)->whereBetween('fine_date', [now()->startOfMonth()->format('Y-m-d'), now()->endOfMonth()->format('Y-m-d')])->count();
        // Count year
        $countYear = Fine::where('total_fee', '>', 0)->whereBetween('fine_date', [now()->startOfYear()->format('Y-m-d'), now()->endOfYear()->format('Y-m-d')])->count();
        // Count success
        $countSuccess = Fine::where('payment_status', FinePaymentStatus::SUCCESS->value)->sum('total_fee');
        // Count pending
        $countPending = Fine::where('payment_status', FinePaymentStatus::PENDING->value)->sum('total_fee');
        // Count all
        $userFine = User::withSum(['fines as total_fee' => function ($query) {
            $query->where('total_fee', '>', 0)
                ->whereHas('returnBook', function ($q) {
                    $q->where('status', ReturnBookStatus::RETURNED->value);
                });
        }], 'total_fee')->having('total_fee', '>', 0)->orderByDesc('total_fee')->take(5)->get();

        // $search = request('search');
        // if ($search) {
        //     $fine->where(function ($query) use ($search) {
        //         $query->whereHas('user', fn($q) => $q->where('name', 'like', "%{$search}%"))
        //             ->orWhereHas('returnBook', fn($q) => $q->where('title', 'like', "%{$search}%"));
        //     });
        // }

        return view('role-admin.fine.index', [
            'title' => 'Laporan Denda',
            'fines' => $fines,
            'day' => $countDay,
            'week' => $countWeek,
            'month' => $countMonth,
            'year' => $countYear,
            'userFines' => $userFine,
            'countSuccess' => $countSuccess,
            'countPending' => $countPending,
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Fine $fine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fine $fine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fine $fine)
    {
        $request->validate([
            'return_book_id' => 'required|integer|exists:return_books,id'
        ]);

        $fine->update([
            'payment_status' => FinePaymentStatus::SUCCESS->value,
        ]);

        return Redirect::route('admin.fines.index')->with(['message' => 'Berhasil membayar denda']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fine $fine)
    {
        //
    }
}
