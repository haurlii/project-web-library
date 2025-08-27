<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-1">
    <article
        class="flex items-center gap-5 rounded-2xl border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-white/3">
        <div
            class="inline-flex h-20 w-20 items-center justify-center rounded-xl bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-white/90">
            <svg width="36" height="36" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                transform="rotate(0 0 0)">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M3.9104 6.27879C2.71011 6.60041 1.99779 7.83416 2.31941 9.03446L4.75231 18.1016V18.4998C4.75231 19.7424 5.75967 20.7498 7.00231 20.7498H20.0023C21.2449 20.7498 22.2523 19.7424 22.2523 18.4998V9.82408C22.2523 8.59588 21.2682 7.59753 20.0455 7.57448L19.2231 4.50513C18.9015 3.30483 17.6677 2.59252 16.4674 2.91414L3.9104 6.27879ZM20.7523 10.8172V9.82408C20.7523 9.40986 20.4165 9.07408 20.0023 9.07408H7.00231C6.58809 9.07408 6.25231 9.40986 6.25231 9.82408V10.8172H20.7523ZM4.75231 12.3186V9.82408C4.75231 8.58143 5.75967 7.57408 7.00231 7.57408H18.4925L17.7742 4.89336C17.667 4.49326 17.2558 4.25582 16.8557 4.36303L4.29863 7.72768C3.89853 7.83488 3.6611 8.24613 3.7683 8.64623L4.75231 12.3186ZM6.25231 13.6145H20.7523V18.4998C20.7523 18.914 20.4165 19.2498 20.0023 19.2498H7.00231C6.5881 19.2498 6.25231 18.914 6.25231 18.4998V13.6145Z"
                    fill="currentColor" />
            </svg>

        </div>
        <div>
            <div class="flex items-center justify-start gap-3 mb-1">
                <div>
                    <p class="text-theme-md text-gray-700 dark:text-gray-400">
                        Denda sudah dibayar
                    </p>
                </div>
            </div>
            <h4 class="text-3xl font-bold text-gray-800 dark:text-white/90">
                {{ 'Rp ' . number_format($countSuccess, 0, ',', '.') }}
            </h4>
        </div>
    </article>
    <article
        class="flex items-center gap-5 rounded-2xl border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-white/3">
        <div
            class="inline-flex h-20 w-20 items-center justify-center rounded-xl bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-white/90">
            <svg width="36" height="36" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                transform="rotate(0 0 0)">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M3.9104 6.27879C2.71011 6.60041 1.99779 7.83416 2.31941 9.03446L4.75231 18.1016V18.4998C4.75231 19.7424 5.75967 20.7498 7.00231 20.7498H20.0023C21.2449 20.7498 22.2523 19.7424 22.2523 18.4998V9.82408C22.2523 8.59588 21.2682 7.59753 20.0455 7.57448L19.2231 4.50513C18.9015 3.30483 17.6677 2.59252 16.4674 2.91414L3.9104 6.27879ZM20.7523 10.8172V9.82408C20.7523 9.40986 20.4165 9.07408 20.0023 9.07408H7.00231C6.58809 9.07408 6.25231 9.40986 6.25231 9.82408V10.8172H20.7523ZM4.75231 12.3186V9.82408C4.75231 8.58143 5.75967 7.57408 7.00231 7.57408H18.4925L17.7742 4.89336C17.667 4.49326 17.2558 4.25582 16.8557 4.36303L4.29863 7.72768C3.89853 7.83488 3.6611 8.24613 3.7683 8.64623L4.75231 12.3186ZM6.25231 13.6145H20.7523V18.4998C20.7523 18.914 20.4165 19.2498 20.0023 19.2498H7.00231C6.5881 19.2498 6.25231 18.914 6.25231 18.4998V13.6145Z"
                    fill="currentColor" />
            </svg>

        </div>
        <div>
            <div class="flex items-center justify-start gap-3 mb-1">
                <div>
                    <p class="text-theme-md text-gray-700 dark:text-gray-400">
                        Denda belum dibayar
                    </p>
                </div>
            </div>
            <h4 class="text-3xl font-bold text-gray-800 dark:text-white/90">
                {{ 'Rp ' . number_format($countPending, 0, ',', '.') }}
            </h4>
        </div>
    </article>
</div>