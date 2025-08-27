<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Enums\UserRole;
use App\Models\LoanBook;
use App\Enums\UserStatus;
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
        $dates = collect(range(0, 13))
            ->map(fn($i) => now()->subDays($i)->format('Y-m-d'))
            ->reverse()->toArray();

        $loanData = collect($dates)->map(
            fn($date) =>
            LoanBook::whereDate('loan_date', $date)->count()
        )->toArray();

        $returnData = collect($dates)->map(
            fn($date) =>
            ReturnBook::whereDate('return_date', $date)->count()
        )->toArray();

        // Loan
        $loanBooks = LoanBook::latest()->with(['user', 'book'])->paginate(5);
        $loanCount = LoanBook::count();
        $loanCountPerWeekly = LoanBook::where('loan_date', '>=', now()->startOfWeek())->where('loan_date', '<=', now()->endOfWeek())->count();

        // Return
        $returnBooks = ReturnBook::latest()->with(['user', 'book'])->paginate(5);
        $returnCount = ReturnBook::count();
        $returnCountPerWeekly = ReturnBook::where('return_date', '>=', now()->startOfWeek())->where('return_date', '<=', now()->endOfWeek())->count();

        // User and Book
        $user = User::where([
            'user_role' => UserRole::USER->value,
            'user_status' => UserStatus::ISACTIVE->value,
        ])->count();
        $book = Book::count();

        return view('role-admin.dashboard.index', [
            'title' => 'Dashboard',
            'dates' => array_values(collect($dates)->map(fn($d) => Carbon::parse($d)->format('d M'))->toArray()),
            'loanData' => array_values($loanData),
            'returnData' => array_values($returnData),
            'loanBooks' => $loanBooks,
            'loanCount' => $loanCount,
            'loanCountPerWeekly' => $loanCountPerWeekly,
            'returnBooks' => $returnBooks,
            'returnCount' => $returnCount,
            'returnCountPerWeekly' => $returnCountPerWeekly,
            'user' => $user,
            'book' => $book,
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
