{{-- Flash Message Success --}}
@if (Session::has("message"))
<div x-data="{isFlashMessageSuccess: true}" x-show="isFlashMessageSuccess"
    class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto modal z-99999" style="display: none;">
    <div class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
    <div @click.outside="isFlashMessageSuccess = false"
        class="relative w-full max-w-[600px] rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10">
        <!-- close btn -->
        <button @click="isFlashMessageSuccess = false"
            class="absolute right-3 top-3 z-999 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-100 text-gray-400 transition-colors hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white sm:right-6 sm:top-6 sm:h-11 sm:w-11">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M6.04289 16.5413C5.65237 16.9318 5.65237 17.565 6.04289 17.9555C6.43342 18.346 7.06658 18.346 7.45711 17.9555L11.9987 13.4139L16.5408 17.956C16.9313 18.3466 17.5645 18.3466 17.955 17.956C18.3455 17.5655 18.3455 16.9323 17.955 16.5418L13.4129 11.9997L17.955 7.4576C18.3455 7.06707 18.3455 6.43391 17.955 6.04338C17.5645 5.65286 16.9313 5.65286 16.5408 6.04338L11.9987 10.5855L7.45711 6.0439C7.06658 5.65338 6.43342 5.65338 6.04289 6.0439C5.65237 6.43442 5.65237 7.06759 6.04289 7.45811L10.5845 11.9997L6.04289 16.5413Z"
                    fill="currentColor"></path>
            </svg>
        </button>

        <div class="text-center">
            <div class="relative flex items-center justify-center z-1 mb-7">
                <svg class="fill-success-50 dark:fill-success-500/15" width="90" height="90" viewBox="0 0 90 90"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M34.364 6.85053C38.6205 -2.28351 51.3795 -2.28351 55.636 6.85053C58.0129 11.951 63.5594 14.6722 68.9556 13.3853C78.6192 11.0807 86.5743 21.2433 82.2185 30.3287C79.7862 35.402 81.1561 41.5165 85.5082 45.0122C93.3019 51.2725 90.4628 63.9451 80.7747 66.1403C75.3648 67.3661 71.5265 72.2695 71.5572 77.9156C71.6123 88.0265 60.1169 93.6664 52.3918 87.3184C48.0781 83.7737 41.9219 83.7737 37.6082 87.3184C29.8831 93.6664 18.3877 88.0266 18.4428 77.9156C18.4735 72.2695 14.6352 67.3661 9.22531 66.1403C-0.462787 63.9451 -3.30193 51.2725 4.49185 45.0122C8.84391 41.5165 10.2138 35.402 7.78151 30.3287C3.42572 21.2433 11.3808 11.0807 21.0444 13.3853C26.4406 14.6722 31.9871 11.951 34.364 6.85053Z"
                        fill="" fill-opacity=""></path>
                </svg>

                <span class="absolute -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
                    <svg class="fill-success-600 dark:fill-success-500" width="38" height="38" viewBox="0 0 38 38"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.9375 19.0004C5.9375 11.7854 11.7864 5.93652 19.0014 5.93652C26.2164 5.93652 32.0653 11.7854 32.0653 19.0004C32.0653 26.2154 26.2164 32.0643 19.0014 32.0643C11.7864 32.0643 5.9375 26.2154 5.9375 19.0004ZM19.0014 2.93652C10.1296 2.93652 2.9375 10.1286 2.9375 19.0004C2.9375 27.8723 10.1296 35.0643 19.0014 35.0643C27.8733 35.0643 35.0653 27.8723 35.0653 19.0004C35.0653 10.1286 27.8733 2.93652 19.0014 2.93652ZM24.7855 17.0575C25.3713 16.4717 25.3713 15.522 24.7855 14.9362C24.1997 14.3504 23.25 14.3504 22.6642 14.9362L17.7177 19.8827L15.3387 17.5037C14.7529 16.9179 13.8031 16.9179 13.2173 17.5037C12.6316 18.0894 12.6316 19.0392 13.2173 19.625L16.657 23.0647C16.9383 23.346 17.3199 23.504 17.7177 23.504C18.1155 23.504 18.4971 23.346 18.7784 23.0647L24.7855 17.0575Z"
                            fill=""></path>
                    </svg>
                </span>
            </div>

            <h4 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white/90 sm:text-title-sm">
                Success!
            </h4>
            <p class="text-sm leading-6 text-gray-500 dark:text-gray-400">
                {{ Session::get("message") }}
            </p>
        </div>
    </div>
</div>
@endif
{{-- End Flash Message Success --}}

{{-- Table --}}
<div class="overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-4 py-4">#</th>
                <th scope="col" class="px-8 py-3 whitespace-nowrap mr-3 max-w-lg">Nama Siswa</th>
                <th scope="col" class="px-8 py-3 whitespace-nowrap mr-3 max-w-lg">Judul Buku</th>
                <th scope="col" class="px-8 py-3 whitespace-nowrap mr-3 max-w-lg">Tanggal Peminjaman</th>
                <th scope="col" class="px-8 py-3 whitespace-nowrap mr-3 max-w-lg">Batas Peminjaman</th>
                <th scope="col" class="px-8 py-3 whitespace-nowrap mr-3 max-w-lg">Tanggal Pengembalian</th>
                <th scope="col" class="px-8 py-3 whitespace-nowrap mr-3 max-w-lg">Denda Terlambat</th>
                <th scope="col" class="px-8 py-3 whitespace-nowrap mr-3 max-w-lg">Denda Lainnya</th>
                <th scope="col" class="px-8 py-3 whitespace-nowrap mr-3 max-w-lg">Total Denda</th>
                <th scope="col" class="px-8 py-3 whitespace-nowrap mr-3 max-w-lg">Status Denda</th>
                <th scope="col" class="px-8 py-3">
                    <span class="sr-only">Actions</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fines as $fine)
            <tr class="border-b dark:border-gray-700">
                <th scope="row"
                    class="px-4 py-3 font-medium text-gray-900 max-w-lg truncate whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}</th>
                <td class="px-8 py-3">
                    <div class="flex items-center whitespace-nowrap mr-3 max-w-2xl">
                        {{ $fine->user->firstname . ' ' . $fine->user->lastname }}
                    </div>
                </td>
                <td class="px-8 py-3">
                    <div class="flex items-center whitespace-nowrap mr-3 max-w-2xl">
                        {{ $fine->returnBook->book->title }}
                    </div>
                </td>
                <td class="px-8 py-3">
                    <div class="flex items-center whitespace-nowrap mr-3">
                        {{ $fine->returnBook->loanBook->loan_date->format('d F Y') }}
                    </div>
                </td>
                <td class="px-8 py-3">
                    <div class="flex items-center whitespace-nowrap mr-3">
                        {{ $fine->returnBook->loanBook->due_date->format('d F Y') }}
                    </div>
                </td>
                <td class="px-8 py-3">
                    <div class="flex items-center whitespace-nowrap mr-3">
                        {{ $fine->returnBook->return_date->format('d F Y') }}
                    </div>
                </td>
                <td class="px-8 py-3">
                    <div class="flex items-center whitespace-nowrap mr-3">
                        {{ $fine->late_fee ? 'Rp ' . number_format($fine->late_fee, 0,
                        ',', '.') : 'Belum dicek' }}
                    </div>
                </td>
                <td class="px-8 py-3">
                    <div class="flex items-center whitespace-nowrap mr-3">
                        {{ $fine->other_fee ? 'Rp ' . number_format($fine->other_fee,
                        0,
                        ',', '.') : 'Belum dicek' }}
                    </div>
                </td>
                <td class="px-8 py-3">
                    <div class="flex items-center whitespace-nowrap mr-3">
                        {{ $fine->total_fee ? 'Rp ' . number_format($fine->total_fee,
                        0, ',', '.') : 'Belum dicek' }}
                    </div>
                </td>
                <td class="px-8 py-3 whitespace-nowrap max-w-lg">
                    @if ($fine->payment_status === \App\Enums\FinePaymentStatus::SUCCESS->value)
                    <span
                        class="inline-flex items-center justify-center gap-1 rounded-full bg-success-50 px-3 py-1 text-sm font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
                        {{ $fine->payment_status }}
                    </span>
                    @else
                    <span
                        class="inline-flex items-center justify-center gap-1 rounded-full bg-error-50 px-3 py-1 text-sm font-medium text-error-600 dark:bg-error-500/15 dark:text-error-500">
                        {{ $fine->payment_status ?? 'Belum dicek' }}
                    </span>
                    @endif
                </td>
                <td class="px-8 py-3 flex items-center space-x-4">
                    @if ($fine->payment_status !== \App\Enums\FinePaymentStatus::SUCCESS->value)
                    <button type="button" data-modal-target="finePaymentModal-{{ $fine->id }}"
                        data-modal-toggle="finePaymentModal-{{ $fine->id }}"
                        class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Bayar
                    </button>
                    @endif
                </td>
            </tr>

            <!-- Fine Payment Modal -->
            <div id="finePaymentModal-{{ $fine->id }}"
                class="fixed inset-0 hidden items-center justify-center p-5 overflow-y-auto modal z-999999">
                <div data-modal-target="finePaymentModal-{{ $fine->id }}"
                    data-modal-toggle="finePaymentModal-{{ $fine->id }}"
                    class="modal-close-btn fixed inset-0 h-full w-full bg-gray-300/50 backdrop-blur-[3rem]"></div>
                <div class="relative w-full max-w-[600px] rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10">
                    <!-- close btn -->
                    <button data-modal-target="finePaymentModal-{{ $fine->id }}"
                        data-modal-toggle="finePaymentModal-{{ $fine->id }}"
                        class="absolute right-3 top-3 z-999 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-100 text-gray-400 transition-colors hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white sm:right-6 sm:top-6 sm:h-11 sm:w-11">
                        <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6.04289 16.5413C5.65237 16.9318 5.65237 17.565 6.04289 17.9555C6.43342 18.346 7.06658 18.346 7.45711 17.9555L11.9987 13.4139L16.5408 17.956C16.9313 18.3466 17.5645 18.3466 17.955 17.956C18.3455 17.5655 18.3455 16.9323 17.955 16.5418L13.4129 11.9997L17.955 7.4576C18.3455 7.06707 18.3455 6.43391 17.955 6.04338C17.5645 5.65286 16.9313 5.65286 16.5408 6.04338L11.9987 10.5855L7.45711 6.0439C7.06658 5.65338 6.43342 5.65338 6.04289 6.0439C5.65237 6.43442 5.65237 7.06759 6.04289 7.45811L10.5845 11.9997L6.04289 16.5413Z"
                                fill=""></path>
                        </svg>
                    </button>

                    <div class="text-center">
                        <div class="relative flex items-center justify-center z-1 mb-7">
                            <svg class="fill-blue-light-50 dark:fill-blue-light-500/15" width="90" height="90"
                                viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M34.364 6.85053C38.6205 -2.28351 51.3795 -2.28351 55.636 6.85053C58.0129 11.951 63.5594 14.6722 68.9556 13.3853C78.6192 11.0807 86.5743 21.2433 82.2185 30.3287C79.7862 35.402 81.1561 41.5165 85.5082 45.0122C93.3019 51.2725 90.4628 63.9451 80.7747 66.1403C75.3648 67.3661 71.5265 72.2695 71.5572 77.9156C71.6123 88.0265 60.1169 93.6664 52.3918 87.3184C48.0781 83.7737 41.9219 83.7737 37.6082 87.3184C29.8831 93.6664 18.3877 88.0266 18.4428 77.9156C18.4735 72.2695 14.6352 67.3661 9.22531 66.1403C-0.462787 63.9451 -3.30193 51.2725 4.49185 45.0122C8.84391 41.5165 10.2138 35.402 7.78151 30.3287C3.42572 21.2433 11.3808 11.0807 21.0444 13.3853C26.4406 14.6722 31.9871 11.951 34.364 6.85053Z"
                                    fill="" fill-opacity=""></path>
                            </svg>

                            <span class="absolute -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
                                <svg class="fill-blue-light-500 dark:fill-blue-light-500" width="38" height="38"
                                    viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.85547 18.9998C5.85547 11.7396 11.7411 5.854 19.0013 5.854C26.2615 5.854 32.1471 11.7396 32.1471 18.9998C32.1471 26.2601 26.2615 32.1457 19.0013 32.1457C11.7411 32.1457 5.85547 26.2601 5.85547 18.9998ZM19.0013 2.854C10.0842 2.854 2.85547 10.0827 2.85547 18.9998C2.85547 27.9169 10.0842 35.1457 19.0013 35.1457C27.9184 35.1457 35.1471 27.9169 35.1471 18.9998C35.1471 10.0827 27.9184 2.854 19.0013 2.854ZM16.9999 11.9145C16.9999 13.0191 17.8953 13.9145 18.9999 13.9145H19.0015C20.106 13.9145 21.0015 13.0191 21.0015 11.9145C21.0015 10.81 20.106 9.91454 19.0015 9.91454H18.9999C17.8953 9.91454 16.9999 10.81 16.9999 11.9145ZM19.0014 27.8171C18.173 27.8171 17.5014 27.1455 17.5014 26.3171V17.3293C17.5014 16.5008 18.173 15.8293 19.0014 15.8293C19.8299 15.8293 20.5014 16.5008 20.5014 17.3293L20.5014 26.3171C20.5014 27.1455 19.8299 27.8171 19.0014 27.8171Z"
                                        fill=""></path>
                                </svg>
                            </span>
                        </div>

                        <h4 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white/90 sm:text-title-sm">
                            Pemberitahuan!
                        </h4>
                        <p class="text-sm leading-6 text-gray-500 dark:text-gray-400">
                            Apakah anda yakin siswa ini sudah bayar?
                        </p>

                        <div class="flex items-center justify-center w-full gap-3 mt-7">
                            <button data-modal-target="finePaymentModal-{{ $fine->id }}"
                                data-modal-toggle="finePaymentModal-{{ $fine->id }}" type="button"
                                class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-theme-xs transition-colors hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 sm:w-auto">
                                Cancel
                            </button>
                            <form action="{{ route('admin.fines.update', $fine->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="return_book_id" value="{{ $fine->returnBook->id }}">
                                <button type="submit"
                                    class="flex justify-center w-full px-4 py-3 text-sm font-medium text-white rounded-lg bg-blue-light-500 shadow-theme-xs hover:bg-blue-light-600 sm:w-auto">
                                    Bayar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Delete Modal -->

            @endforeach
        </tbody>
    </table>
</div>
{{-- End Table --}}