<x-layout :title="$title">
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/yearpicker.css') }}">
    <style>
        .datepicker,
        .datepicker-dropdown {
            position: absolute !important;
            z-index: 999999 !important;
        }
    </style>
    @endpush

    <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">
        <!-- Breadcrumb Start -->
        <x-breadcrumb>{{ $title }}</x-breadcrumb>
        <!-- Breadcrumb End -->

        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
            <x-loan-books.search-and-add-data :loans="$loans" :users="$users" :books="$books" />
            <x-loan-books.table :loans="$loans" :users="$users" :books="$books" />
            <x-loan-books.pagination :loans="$loans" />
        </div>
    </div>
    @push('scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/yearpicker.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <script>
        document.querySelectorAll('input[type="file"][data-preview-target]').forEach(function (input) {
        input.addEventListener('change', function (e) {
            const previewId = input.getAttribute('data-preview-target');
            const preview = document.getElementById(previewId);
            const file = e.target.files[0];

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    });

    const input = document.getElementById("return_date");
        if (input) {
            new Datepicker(input, {
                format: "dd MM yyyy"
            });
        }

    $('.yearpicker').yearpicker();

    </script>

    @endpush
</x-layout>