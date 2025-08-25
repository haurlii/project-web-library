{{-- Success Flash Message --}}
@if (Session::has("message"))
<div x-data="{isFlashMessageSuccess: true}" x-effect="setTimeout(() => isFlashMessageSuccess = false, 3000)"
    x-show="isFlashMessageSuccess"
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
{{-- End Success Flash Message --}}

{{-- Error Flash Message --}}
@if (Session::has("error"))
<div x-data="{isFlashError: true}" x-effect="setTimeout(() => isFlashError = false, 3000)" x-show="isFlashError"
    class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto modal z-99999" style="">
    <div class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
    <div @click.outside="isFlashError = false"
        class="relative w-full max-w-[600px] rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10">
        <!-- close btn -->
        <button @click="isFlashError = false"
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
                <svg class="fill-error-50 dark:fill-error-500/15" width="90" height="90" viewBox="0 0 90 90" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M34.364 6.85053C38.6205 -2.28351 51.3795 -2.28351 55.636 6.85053C58.0129 11.951 63.5594 14.6722 68.9556 13.3853C78.6192 11.0807 86.5743 21.2433 82.2185 30.3287C79.7862 35.402 81.1561 41.5165 85.5082 45.0122C93.3019 51.2725 90.4628 63.9451 80.7747 66.1403C75.3648 67.3661 71.5265 72.2695 71.5572 77.9156C71.6123 88.0265 60.1169 93.6664 52.3918 87.3184C48.0781 83.7737 41.9219 83.7737 37.6082 87.3184C29.8831 93.6664 18.3877 88.0266 18.4428 77.9156C18.4735 72.2695 14.6352 67.3661 9.22531 66.1403C-0.462787 63.9451 -3.30193 51.2725 4.49185 45.0122C8.84391 41.5165 10.2138 35.402 7.78151 30.3287C3.42572 21.2433 11.3808 11.0807 21.0444 13.3853C26.4406 14.6722 31.9871 11.951 34.364 6.85053Z"
                        fill="" fill-opacity=""></path>
                </svg>

                <span class="absolute -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
                    <svg class="fill-error-600 dark:fill-error-500" width="38" height="38" viewBox="0 0 38 38"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M9.62684 11.7496C9.04105 11.1638 9.04105 10.2141 9.62684 9.6283C10.2126 9.04252 11.1624 9.04252 11.7482 9.6283L18.9985 16.8786L26.2485 9.62851C26.8343 9.04273 27.7841 9.04273 28.3699 9.62851C28.9556 10.2143 28.9556 11.164 28.3699 11.7498L21.1198 18.9999L28.3699 26.25C28.9556 26.8358 28.9556 27.7855 28.3699 28.3713C27.7841 28.9571 26.8343 28.9571 26.2485 28.3713L18.9985 21.1212L11.7482 28.3715C11.1624 28.9573 10.2126 28.9573 9.62684 28.3715C9.04105 27.7857 9.04105 26.836 9.62684 26.2502L16.8771 18.9999L9.62684 11.7496Z"
                            fill=""></path>
                    </svg>
                </span>
            </div>

            <h4 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white/90 sm:text-title-sm">
                Peringatan!
            </h4>
            <p class="text-sm leading-6 text-gray-500 dark:text-gray-400">
                {{ Session::get('error') }}
            </p>
        </div>
    </div>
</div>
@endif
{{-- End Error Flash Message --}}

@if ($errors->any())
<div x-data="{isFlashMessageError: true}" x-effect="setTimeout(() => isFlashMessageError = false, 3000)"
    x-show="isFlashMessageError"
    class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto modal z-99999" style="">
    <div class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
    <div @click.outside="isFlashMessageError = false"
        class="relative w-full max-w-[600px] rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10">
        <!-- close btn -->
        <button @click="isFlashMessageError = false"
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
                <svg class="fill-error-50 dark:fill-error-500/15" width="90" height="90" viewBox="0 0 90 90" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M34.364 6.85053C38.6205 -2.28351 51.3795 -2.28351 55.636 6.85053C58.0129 11.951 63.5594 14.6722 68.9556 13.3853C78.6192 11.0807 86.5743 21.2433 82.2185 30.3287C79.7862 35.402 81.1561 41.5165 85.5082 45.0122C93.3019 51.2725 90.4628 63.9451 80.7747 66.1403C75.3648 67.3661 71.5265 72.2695 71.5572 77.9156C71.6123 88.0265 60.1169 93.6664 52.3918 87.3184C48.0781 83.7737 41.9219 83.7737 37.6082 87.3184C29.8831 93.6664 18.3877 88.0266 18.4428 77.9156C18.4735 72.2695 14.6352 67.3661 9.22531 66.1403C-0.462787 63.9451 -3.30193 51.2725 4.49185 45.0122C8.84391 41.5165 10.2138 35.402 7.78151 30.3287C3.42572 21.2433 11.3808 11.0807 21.0444 13.3853C26.4406 14.6722 31.9871 11.951 34.364 6.85053Z"
                        fill="" fill-opacity=""></path>
                </svg>

                <span class="absolute -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
                    <svg class="fill-error-600 dark:fill-error-500" width="38" height="38" viewBox="0 0 38 38"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M9.62684 11.7496C9.04105 11.1638 9.04105 10.2141 9.62684 9.6283C10.2126 9.04252 11.1624 9.04252 11.7482 9.6283L18.9985 16.8786L26.2485 9.62851C26.8343 9.04273 27.7841 9.04273 28.3699 9.62851C28.9556 10.2143 28.9556 11.164 28.3699 11.7498L21.1198 18.9999L28.3699 26.25C28.9556 26.8358 28.9556 27.7855 28.3699 28.3713C27.7841 28.9571 26.8343 28.9571 26.2485 28.3713L18.9985 21.1212L11.7482 28.3715C11.1624 28.9573 10.2126 28.9573 9.62684 28.3715C9.04105 27.7857 9.04105 26.836 9.62684 26.2502L16.8771 18.9999L9.62684 11.7496Z"
                            fill=""></path>
                    </svg>
                </span>
            </div>

            <h4 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white/90 sm:text-title-sm">
                Error!
            </h4>
            <p class="text-sm leading-6 text-gray-500 dark:text-gray-400">
                Data yang di input tidak sesuai dengan aturan yang ada!
            </p>
        </div>
    </div>
</div>
@endif

{{-- Table --}}
<div class="overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-4 py-4">#</th>
                <th scope="col" class="px-8 py-3">Kode Peminjaman</th>
                <th scope="col" class="px-8 py-3">Nama Siswa</th>
                <th scope="col" class="px-8 py-3">Judul Buku</th>
                <th scope="col" class="px-8 py-3">Tanggal Peminjaman</th>
                <th scope="col" class="px-8 py-3">Batas Peminjaman</th>
                <th scope="col" class="px-8 py-3">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
            <tr class="border-b dark:border-gray-700">
                <th scope="row"
                    class="px-4 py-3 font-medium text-gray-900 max-w-lg truncate whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}</th>
                <td class="px-8 py-3">
                    <div class="flex items-center mr-3 whitespace-nowrap max-w-xl">
                        {{ $loan->loan_code }}
                    </div>
                </td>
                <td class="px-8 py-3">
                    <div class="flex items-center mr-3 whitespace-nowrap max-w-2xl">
                        {{ Str::of($loan->user->firstname . ' ' . $loan->user->lastname)->limit(50) }}
                    </div>
                </td>
                <td class="px-8 py-3">
                    <div class="flex items-center mr-3 whitespace-nowrap max-w-2xl">
                        {{ Str::of($loan->book->title)->limit(50) }}
                    </div>
                </td>
                <td class="px-8 py-3">
                    <div class="flex items-center mr-3 whitespace-nowrap max-w-xl">
                        {{ $loan->loan_date->format('d F Y') }}
                    </div>
                </td>
                <td class="px-8 py-3">
                    <div class="flex items-center mr-3 whitespace-nowrap max-w-xl">
                        {{ $loan->due_date->format('d F Y') }}
                    </div>
                </td>
                <td class="px-8 py-3">
                    <div class="flex items-center mr-3 whitespace-nowrap max-w-lg">
                        @if ($loan->returnBook?->status->value == \App\Enums\ReturnBookStatus::RETURNED->value)
                        <span
                            class="inline-flex items-center justify-center gap-1 rounded-full bg-success-50 px-3 py-1 text-sm font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
                            {{ $loan->returnBook?->status }}
                        </span>
                        @elseif ($loan->returnBook?->status->value == \App\Enums\ReturnBookStatus::CHECKED->value)
                        <span
                            class="inline-flex items-center justify-center gap-1 rounded-full bg-warning-50 px-3 py-1 text-sm font-medium text-warning-600 dark:bg-warning-500/15 dark:text-orange-400">
                            {{ $loan->returnBook?->status }}
                        </span>
                        @else
                        <span
                            class="inline-flex items-center justify-center gap-1 rounded-full bg-brand-50 px-3 py-1 text-sm font-medium text-brand-600 dark:bg-brand-500/15 dark:text-brand-500">
                            {{ \App\Enums\LoanBookStatus::LOAN->value }}
                        </span>
                        @endif
                    </div>
                </td>
            </tr>

            <!-- Return Modal -->
            <div id="returnBookModal-{{ $loan->id }}"
                class="hidden fixed inset-0 items-center justify-center p-5 overflow-y-auto modal z-999999">
                <div data-modal-target="returnBookModal-{{ $loan->id }}"
                    data-modal-toggle="returnBookModal-{{ $loan->id }}"
                    class="modal-close-btn fixed inset-0 h-full w-full bg-gray-300/50 backdrop-blur-[3rem]"></div>
                <div class="relative w-full max-w-[680px] rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10">
                    <!-- close btn -->
                    <button data-modal-target="returnBookModal-{{ $loan->id }}"
                        data-modal-toggle="returnBookModal-{{ $loan->id }}"
                        class="group absolute right-3 top-3 z-999 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-200 text-gray-500 transition-colors hover:bg-gray-300 hover:text-gray-500 dark:bg-gray-800 dark:hover:bg-gray-700 sm:right-6 sm:top-6 sm:h-11 sm:w-11">
                        <svg class="transition-colors fill-current group-hover:text-gray-600 dark:group-hover:text-gray-200"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6.04289 16.5413C5.65237 16.9318 5.65237 17.565 6.04289 17.9555C6.43342 18.346 7.06658 18.346 7.45711 17.9555L11.9987 13.4139L16.5408 17.956C16.9313 18.3466 17.5645 18.3466 17.955 17.956C18.3455 17.5655 18.3455 16.9323 17.955 16.5418L13.4129 11.9997L17.955 7.4576C18.3455 7.06707 18.3455 6.43391 17.955 6.04338C17.5645 5.65286 16.9313 5.65286 16.5408 6.04338L11.9987 10.5855L7.45711 6.0439C7.06658 5.65338 6.43342 5.65338 6.04289 6.0439C5.65237 6.43442 5.65237 7.06759 6.04289 7.45811L10.5845 11.9997L6.04289 16.5413Z"
                                fill=""></path>
                        </svg>
                    </button>

                    <form action="{{ route('user.return-books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h4 class="mb-6 text-lg font-medium text-gray-800 dark:text-white/90">
                            Mengembalikan Buku
                        </h4>

                        <div class="grid grid-cols-1 gap-x-6 gap-y-5 sm:grid-cols-4">
                            <div class="col-span-1 sm:col-span-4">
                                <label for="loan_id"
                                    class=" mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Loan Code
                                </label>
                                <input type="text" name="loan_code" id="loan_id" value="{{ $loan->loan_code }}"
                                    placeholder="Enter the user" autocomplete="off" readonly
                                    class="h-11 w-full rounded-lg border px-4 py-2.5 text-sm shadow-theme-xs @error('loan_id') bg-red-50 dark:bg-red-900/20 border-red-500 text-red-600 placeholder-red-50 focus:ring-red-500/10 focus:border-red-300 dark:text-red-500 dark:placeholder-red-500 dark:border-red-800 dark:focus:ring-red-50/10 dark:focus:border-red-800 @enderror border-gray-300 text-gray-800 placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                                <input type="hidden" name="loan_id" id="loan_id" value="{{ $loan->id }}"
                                    placeholder="Enter the user" autocomplete="off" />
                                @error('loan_id')
                                <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-1 sm:col-span-4">
                                <label for="user_id"
                                    class=" mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Nama Siswa
                                </label>
                                <input type="text" name="name" id="user_id"
                                    value="{{ old('name') ?? Auth::user()->firstname . ' ' . Auth::user()->lastname}}"
                                    readonly
                                    class="h-11 w-full rounded-lg border px-4 py-2.5 text-sm shadow-theme-xs @error('user_id') bg-red-50 dark:bg-red-900/20 border-red-500 text-red-600 placeholder-red-50 focus:ring-red-500/10 focus:border-red-300 dark:text-red-500 dark:placeholder-red-500 dark:border-red-800 dark:focus:ring-red-50/10 dark:focus:border-red-800 @enderror border-gray-300 text-gray-800 placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                                <input type="hidden" name="user_id" id="user_id"
                                    value="{{ old('user_id') ?? Auth::user()->id }}" placeholder="Enter the user"
                                    autocomplete="off" />
                                @error('user_id')
                                <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-1 sm:col-span-4">
                                <label for="title"
                                    class=" mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Judul Buku
                                </label>
                                <input type="text" name="title" id="title" value="{{ $loan->book->title }}" readonly
                                    class="h-11 w-full rounded-lg border px-4 py-2.5 text-sm shadow-theme-xs @error('book_id') bg-red-50 dark:bg-red-900/20 border-red-500 text-red-600 placeholder-red-50 focus:ring-red-500/10 focus:border-red-300 dark:text-red-500 dark:placeholder-red-500 dark:border-red-800 dark:focus:ring-red-50/10 dark:focus:border-red-800 @enderror border-gray-300 text-gray-800 placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                                <input type="hidden" name="book_id" id="book_id" value="{{ $loan->book->id }}"
                                    placeholder="Enter the book title" autocomplete="off" />
                                @error('book_id')
                                <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-1 sm:col-span-4">
                                <label for="return_date_{{ $loan->id }}"
                                    class=" mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Tanggal Pengembalian
                                </label>
                                <div class="relative max-w-auto">
                                    <div class="absolute inset-y-0 end-0 flex items-center pe-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input id="return_date_{{ $loan->id }}" datepicker datepicker-format="dd MM yyyy"
                                        type="text" name="return_date"
                                        value="{{ old('return_date') ?? \Carbon\Carbon::now()->format('d F Y') }}"
                                        readonly
                                        class="@error('return_date') bg-red-50 dark:bg-red-900/20 border-red-500 text-red-600 placeholder-red-50 focus:ring-red-500/10 focus:border-red-300 dark:text-red-500 dark:placeholder-red-500 dark:border-red-800 dark:focus:ring-red-50/10 dark:focus:border-red-800 @enderror dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                        placeholder="Select date">
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end w-full gap-3 mt-6">
                            <button data-modal-target="returnBookModal-{{ $loan->id }}"
                                data-modal-toggle="returnBookModal-{{ $loan->id }}" type="button"
                                class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-theme-xs transition-colors hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 sm:w-auto">
                                Close
                            </button>
                            <button type="submit"
                                class="flex justify-center w-full px-4 py-3 text-sm font-medium text-white rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600 sm:w-auto">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Update Modal -->

            @endforeach
        </tbody>
    </table>
</div>
{{-- End Table --}}