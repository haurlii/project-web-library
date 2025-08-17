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
            <x-return-books.search-and-add-data :loanBooks="$loanBooks" />
            <x-return-books.table :returnBooks="$returnBooks" :loanBooks="$loanBooks" />
            <x-return-books.pagination :returnBooks="$returnBooks" />
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

    function returnBook() {
        return {
            loan_id: '',
            user_id: '',
            name: '',
            book_id: '',
            title: '',
            due_date: '',

            async loanBookData() {
                if (!this.loan_id) return;
                let res = await fetch(`/loan-books/${this.loan_id}`);
                let data = await res.json();
                this.user_id = data.user_id;
                this.name = data.name;
                this.book_id = data.book_id;
                this.title = data.title;
                this.due_date = data.due_date;
            }

            // loanBookData() {
            //     if (this.loan_id) {
            //         fetch(`/loan-books/${this.loan_id}`)
            //             .then(res => res.json())
            //             .then(data => {
            //                 this.user_id = data.user_id;
            //                 this.firstname = data.firstname;
            //                 this.lastname = data.lastname;
            //                 this.book_id = data.book_id;
            //                 this.book_title = data.book_title;
            //                 this.due_date = data.due_date;
            //             });
            //     }
            // }
        }
    }

    </script>

    @endpush
</x-layout>