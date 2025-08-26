<div
    class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6">
    <div class="flex flex-col gap-2 mb-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                Transaksi Peminjaman Terbaru
            </h3>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('admin.loan-books.index') }}"
                class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                See all
            </a>
        </div>
    </div>

    <div class="w-full overflow-x-auto">
        <table class="min-w-full">
            <!-- table header start -->
            <thead>
                <tr class="border-gray-100 border-y dark:border-gray-800">
                    <th class="py-3">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-xs dark:text-gray-400">
                                Pengguna
                            </p>
                        </div>
                    </th>
                    <th class="py-3">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-xs dark:text-gray-400">
                                Judul Buku
                            </p>
                        </div>
                    </th class="py-3">
                    <th class="py-3">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-xs dark:text-gray-400">
                                Tanggal Pinjam
                            </p>
                        </div>
                    </th>
                </tr>
            </thead>
            <!-- table header end -->

            <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                @foreach ($loanBooks as $loan)
                <tr>
                    <td class="py-3">
                        <div class="flex items-center">
                            <div class="flex items-center gap-3">
                                <div class="h-[50px] w-[50px] overflow-hidden rounded-md">
                                    <img src="{{ $loan->user->avatar ? asset('storage/' . $loan->user->avatar) :
                                    asset('assets/images/user/user-default.png') }}"
                                        alt="{{ $loan->user->first . ' ' . $loan->user->lastname }}" />
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800 text-sm dark:text-white/90">
                                        {{ $loan->user->firstname . ' ' . $loan->user->lastname }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="py-3">
                        <div class="flex items-center">
                            <p class="text-gray-500 text-sm dark:text-gray-400">
                                {{ $loan->book->title }}
                            </p>
                        </div>
                    </td>
                    <td class="py-3">
                        <div class="flex items-center">
                            <p class="text-gray-500 text-sm dark:text-gray-400">
                                {{ $loan->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>