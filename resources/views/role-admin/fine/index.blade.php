<x-layouts.app :title="$title">
    @push('styles')
    @endpush

    <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">
        <!-- Breadcrumb Start -->
        <x-partials.breadcrumb>{{ $title }}</x-partials.breadcrumb>
        <!-- Breadcrumb End -->

        <div class="grid grid-cols-12 gap-4 md:gap-6">
            <div class="col-span-12 space-y-6 xl:col-span-12">
                <!-- Metric Group One -->
                <x-role-admins.dashboard.grid-info :user="$user" :book="$book" :loan="$loan" :return="$return" />
                <!-- Metric Group One -->
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
            <x-role-admins.books.search-and-add-data :books="$books" :authors="$authors" :publishers="$publishers"
                :categories="$categories" />
            <x-role-admins.books.table :books="$books" :authors="$authors" :publishers="$publishers"
                :categories="$categories" />
            <x-role-admins.books.pagination :books="$books" />
        </div>
    </div>
    @push('scripts')
    @endpush
    </x-layout>