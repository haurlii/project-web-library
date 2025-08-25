<x-layouts.app :title="$title">
    @push('styles')
    @endpush

    <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">
        <!-- Breadcrumb Start -->
        <x-partials.breadcrumb>{{ $title }}</x-partials.breadcrumb>
        <!-- Breadcrumb End -->

        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
            <x-role-admins.stock-books.header :stocks="$stocks" />
            <x-role-admins.stock-books.table :stocks="$stocks" />
            <x-role-admins.stock-books.pagination :stocks="$stocks" />
        </div>
    </div>
    @push('scripts')
    @endpush
    </x-layout>