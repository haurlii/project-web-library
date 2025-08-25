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

    <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">
        <!-- Breadcrumb Start -->
        <x-partials.breadcrumb>{{ $title }}</x-partials.breadcrumb>
        <!-- Breadcrumb End -->

        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
            <x-role-admins.loan-books.header :loans="$loans" :users="$users" :books="$books" />
            <x-role-admins.loan-books.table :loans="$loans" :users="$users" :books="$books" />
            <x-role-admins.loan-books.pagination :loans="$loans" />
        </div>
    </div>
    @push('scripts')
    @endpush
    </x-layout>