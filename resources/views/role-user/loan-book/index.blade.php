<x-layouts.app :title="$title">
    @push('styles')
    @endpush

    <div class="mx-auto max-w-(--breakpoint-3xl) p-4 md:p-6">
        <!-- Breadcrumb Start -->
        <x-partials.breadcrumb>{{ $title }}</x-partials.breadcrumb>
        <!-- Breadcrumb End -->

        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
            <x-role-users.loan-books.header />
            <x-role-users.loan-books.table :loans="$loans" />
            <x-role-users.loan-books.pagination :loans="$loans" />
        </div>
    </div>
    @push('scripts')
    @endpush
</x-layouts.app>