<x-layouts.app :title="$title">
    @push('styles')
    <style>
        .datepicker,
        .datepicker-dropdown {
            position: absolute !important;
            z-index: 999999 !important;
        }
    </style>
    @endpush

    <div class="mx-auto max-w-(--breakpoint-3xl) p-4 md:p-6">
        <!-- Breadcrumb Start -->
        <x-partials.breadcrumb>{{ $title }}</x-partials.breadcrumb>
        <!-- Breadcrumb End -->

        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
            <x-role-users.return-books.header />
            <x-role-users.return-books.table :returnBooks="$returnBooks" :loanBooks="$loanBooks" />
            <x-role-users.return-books.pagination :returnBooks="$returnBooks" />
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <script>
        function returnBook() {
            const loanBookUrl = "{{ route('admin.loan-books.getLoanBook', ':id') }}";
            return {
                loan_id: '',
                user_id: '',
                name: '',
                book_id: '',
                title: '',
                due_date: '',

                async loanBookData() {
                    if (!this.loan_id) return;
                    let url = loanBookUrl.replace(':id', this.loan_id);
                    let res = await fetch(url);
                    let data = await res.json();
                    this.user_id = data.user_id;
                    this.name = data.name;
                    this.book_id = data.book_id;
                    this.title = data.title;
                    this.due_date = data.due_date;
                }
            }
        }
    </script>
    @endpush
</x-layouts.app>