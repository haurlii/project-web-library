{{-- Flash Message --}}
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
{{-- End Flash Message --}}

<div class="col-span-1 sm:col-span-1">
    <div class="p-5 mb-6 border border-gray-200 rounded-2xl dark:border-gray-800 lg:p-6">
        <div class="flex flex-col items-center justify-between">
            <div class="flex flex-col items-center w-full gap-6 ">
                <div class="w-32 h-w-32 overflow-hidden border border-gray-200 rounded-full dark:border-gray-800">
                    <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('assets/images/user/user-default.png') }}"
                        alt="{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}" />
                </div>
                <h4 class="mb-2 text-2xl font-semibold text-center text-gray-800 dark:text-white/90 ">
                    {{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}
                </h4>
                <div class="flex items-center text-center flex-row gap-3 xl:text-center">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ Auth::user()->username ?? 'Tidak tersedia' }}
                    </p>
                    <div class="h-3.5 w-px bg-gray-300 dark:bg-gray-700 block"></div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ Auth::user()->email ?? 'Tidak tersedia' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-span-1 sm:col-span-2">
    <div class="rounded-2xl border border-gray-200 dark:border-gray-800">
        <div class="space-y-6 border-t border-gray-200 p-5 sm:p-6 dark:border-gray-800">
            <form method="POST" action="{{ route('admin.profiles.update') }} " enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="-mx-2.5 flex flex-wrap gap-y-5">
                    <div class="w-full px-2.5">
                        <h4
                            class="border-b border-gray-200 pb-4 text-base font-medium text-gray-800 dark:border-gray-800 dark:text-white/90">
                            Personal Info
                        </h4>
                    </div>

                    <div class="w-full px-2.5 xl:w-1/2">
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Username
                        </label>
                        <input type="text" name="username" placeholder="Masukkan nama depan"
                            value="{{ old('username') ?? Auth::user()->username }}" autofocus autocomplete="off"
                            class="@error('username') bg-red-50 dark:bg-red-900/20 border-red-500 text-red-600 placeholder-red-50 focus:ring-red-500/10 focus:border-red-300 dark:text-red-500 dark:placeholder-red-500 dark:border-red-800 dark:focus:ring-red-50/10 dark:focus:border-red-800 @enderror dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                        @error('username')
                        <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full px-2.5 xl:w-1/2">
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Email
                        </label>
                        <input type="email" name="email" placeholder="Masukkan nama belakang"
                            value="{{ old('email') ?? Auth::user()->email }}" autocomplete="off"
                            class="@error('email') bg-red-50 dark:bg-red-900/20 border-red-500 text-red-600 placeholder-red-50 focus:ring-red-500/10 focus:border-red-300 dark:text-red-500 dark:placeholder-red-500 dark:border-red-800 dark:focus:ring-red-50/10 dark:focus:border-red-800 @enderror dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                        @error('email')
                        <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full px-2.5 xl:w-1/2">
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Nama Depan
                        </label>
                        <input type="text" name="firstname" placeholder="Masukkan nama depan"
                            value="{{ old('firstname') ?? Auth::user()->firstname }}" autocomplete="off"
                            class="@error('firstname') bg-red-50 dark:bg-red-900/20 border-red-500 text-red-600 placeholder-red-50 focus:ring-red-500/10 focus:border-red-300 dark:text-red-500 dark:placeholder-red-500 dark:border-red-800 dark:focus:ring-red-50/10 dark:focus:border-red-800 @enderror dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                        @error('firstname')
                        <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full px-2.5 xl:w-1/2">
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Nama Belakang
                        </label>
                        <input type="text" name="lastname" placeholder="Masukkan nama belakang"
                            value="{{ old('lastname') ?? Auth::user()->lastname }}" autocomplete="off"
                            class="@error('lastname') bg-red-50 dark:bg-red-900/20 border-red-500 text-red-600 placeholder-red-50 focus:ring-red-500/10 focus:border-red-300 dark:text-red-500 dark:placeholder-red-500 dark:border-red-800 dark:focus:ring-red-50/10 dark:focus:border-red-800 @enderror dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                        @error('lastname')
                        <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full px-2.5 xl:w-1/2">
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Tempat Lahir
                        </label>
                        <input type="text" name="city_of_birth" placeholder="Masukkan tempat lahir"
                            value="{{ old('city_of_birth') ?? Auth::user()->city_of_birth }}" autocomplete="off"
                            class="@error('city_of_birth') bg-red-50 dark:bg-red-900/20 border-red-500 text-red-600 placeholder-red-50 focus:ring-red-500/10 focus:border-red-300 dark:text-red-500 dark:placeholder-red-500 dark:border-red-800 dark:focus:ring-red-50/10 dark:focus:border-red-800 @enderror dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                        @error('city_of_birth')
                        <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full px-2.5 xl:w-1/2">
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Tanggal Lahir
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 end-0 flex items-center pe-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input type="text" datepicker datepicker-format="dd MM yyyy" name="date_of_birth"
                                placeholder="Masukkan tanggal lahir"
                                value="{{ old('date_of_birth') ?? Auth::user()->date_of_birth->format('d F Y') }}"
                                autocomplete="off"
                                class="@error('date_of_birth') bg-red-50 dark:bg-red-900/20 border-red-500 text-red-600 placeholder-red-50 focus:ring-red-500/10 focus:border-red-300 dark:text-red-500 dark:placeholder-red-500 dark:border-red-800 dark:focus:ring-red-50/10 dark:focus:border-red-800 @enderror dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                        </div>
                        @error('date_of_birth')
                        <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full px-2.5 xl:w-1/2">
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Jenis Kelamin
                        </label>
                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                            <select name="gender" id="gender" value="{{ old('gender') }}"
                                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-3 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                :class="isOptionSelected &amp;&amp; 'text-gray-500 dark:text-gray-400'"
                                @change="isOptionSelected = true">
                                <option value="" selected="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                    Silahkan Pilih Jenis Kelamin
                                </option>
                                @foreach ( \App\Enums\UserGender::cases() as $gender)
                                <option value="{{ $gender->value }}"
                                    class="text-gray-700 dark:bg-gray-900 dark:text-gray-400" @selected((old('gender')
                                    ?? Auth::user()->gender->value ) == $gender->value)>
                                    {{ $gender->value }}
                                </option>
                                @endforeach
                            </select>
                            <span
                                class="absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </div>
                        @error('gender')
                        <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full px-2.5 xl:w-1/2">
                        <label for="contact" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            No. Handphone
                        </label>
                        <input type="text" id="contact" name="contact" placeholder="Masukkan no. handphone"
                            value="{{ old('contact') ?? (Str::startsWith(Auth::user()->contact, '+62') ? Auth::user()->contact : '+62' . ltrim(Auth::user()->contact, '0')) }}"
                            autocomplete="off"
                            class="@error('contact') bg-red-50 dark:bg-red-900/20 border-red-500 text-red-600 placeholder-red-50 focus:ring-red-500/10 focus:border-red-300 dark:text-red-500 dark:placeholder-red-500 dark:border-red-800 dark:focus:ring-red-50/10 dark:focus:border-red-800 @enderror dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                        @error('contact')
                        <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full px-2.5">
                        <label for="avatar-update"
                            class=" mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Upload File
                        </label>
                        <input
                            class="@error('avatar') bg-red-50 dark:bg-red-900/20 border-red-500 text-red-600 placeholder-red-50 focus:ring-red-500/10 focus:border-red-300 dark:text-red-500 dark:placeholder-red-500 dark:border-red-800 dark:focus:ring-red-50/10 dark:focus:border-red-800 @enderror block w-full text-sm text-gray-800 border border-gray-300 rounded-lg cursor-pointer dark:text-white/90 focus:outline-none dark:bg-gray-900 dark:border-gray-700 dark:placeholder-white/30 focus:file:ring-brand-300 transition-colors file:mr-5 file:border-collapse file:cursor-pointer file:rounded-l-lg file:border-0 file:border-r file:border-solid file:border-gray-200 file:bg-gray-50 file:text-xs file:text-gray-400  dark:file:border-gray-700 dark:file:bg-gray-900 dark:file:text-white/30"
                            aria-describedby="user_avatar_help" id="avatar-update" name="avatar" type="file"
                            accept="image/*">
                        <div class="mt-1 text-xs text-gray-500 dark:text-gray-300" id="user_avatar_help">.png,
                            .jpg,
                            .jpeg</div>
                        @error('avatar')
                        <p class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror

                        <div class="w-full px-2.5">
                            <div class="mt-4 flex items-center justify-end gap-3">
                                <button type="submit"
                                    class="bg-brand-500 hover:bg-brand-600 flex items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>