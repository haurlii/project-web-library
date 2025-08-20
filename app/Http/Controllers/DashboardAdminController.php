<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\LoanBook;
use App\Models\ReturnBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil tanggal 7 hari terakhir
        $dates = LoanBook::select(DB::raw('DATE(created_at) as date'))
            ->distinct()
            ->orderBy('date')
            ->take(7)
            ->pluck('date')
            ->toArray();

        $loanData = array_map(
            fn($date) => LoanBook::whereDate('loan_date', $date)->count(),
            $dates
        );

        $returnData = array_map(
            fn($date) => ReturnBook::whereDate('return_date', $date)->count(),
            $dates
        );

        $loanBook = LoanBook::latest()->with(['user', 'book', 'returnBook'])->paginate(5);
        $returnBook = ReturnBook::latest()->with(['user', 'book'])->paginate(5);
        $user = User::count();
        $book = Book::count();
        $loan = LoanBook::count();
        $return = ReturnBook::count();

        return view('role-admin.dashboard.index', [
            'dates' => $dates,
            'title' => 'Dashboard',
            'loanData' => $loanData,
            'returnData' => $returnData,
            'loans' => $loanBook,
            'returns' => $returnBook,
            'user' => $user,
            'book' => $book,
            'loan' => $loan,
            'return' => $return,
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
