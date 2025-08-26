<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\LoanBook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();

        View::composer('*', function ($view) {
            if (Auth::check()) {
                $notifications = LoanBook::with(['book'])
                    ->where('user_id', Auth::user()->id)
                    ->whereDoesntHave('returnBook')
                    ->get()
                    ->map(function ($loan) {
                        $today = Carbon::parse(Carbon::now()->format('Y-m-d'));
                        $daysLeft = $today->diffInDays($loan->due_date, false);

                        if ($daysLeft < 0) {
                            $status = "Terlambat " . abs($daysLeft) . " hari";
                        } elseif ($daysLeft == 0) {
                            $status = "Hari ini batas peminjaman";
                        } elseif ($daysLeft <= 1) {
                            $status = "Besok adalah hari terakhir untuk batas peminjaman ";
                        } else {
                            $status = null;
                        }

                        return [
                            'book_title' => $loan->book->title,
                            'message' => $status,
                            'time' => $loan->created_at->diffForHumans(),
                        ];
                    })
                    ->filter(fn($notif) => $notif['message'] !== null);

                $view->with('notifications', $notifications);
            }
        });
    }
}
