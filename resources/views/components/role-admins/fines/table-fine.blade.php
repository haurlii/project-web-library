<div
    class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6">
    <div class="flex flex-col gap-2 mb-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                Total Denda Terbanyak
            </h3>
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
                                #
                            </p>
                        </div>
                    </th>
                    <th class="py-3">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-xs dark:text-gray-400">
                                Siswa
                            </p>
                        </div>
                    </th class="py-3">
                    <th class="py-3">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-xs dark:text-gray-400">
                                Denda
                            </p>
                        </div>
                    </th>
                </tr>
            </thead>
            <!-- table header end -->

            <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                @foreach ($userFines as $userFine)
                <tr>
                    <td class="py-3">
                        <div class="flex items-center">
                            <p class="text-gray-500 text-sm dark:text-gray-400">
                                {{ $loop->iteration }}
                            </p>
                        </div>
                    </td>
                    <td class="py-3">
                        <div class="flex items-center">
                            <p class="text-gray-500 text-sm dark:text-gray-400">
                                {{ $userFine->firstname . ' ' . $userFine->lastname }}
                            </p>
                        </div>
                    </td>
                    <td class="py-3">
                        <div class="flex items-center">
                            <p class="text-gray-500 text-sm dark:text-gray-400">
                                {{ 'Rp ' . number_format($userFine->total_fee, 0, ',', '.') }}
                            </p>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>