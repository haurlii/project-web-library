<x-layouts.app :title="$title">
    @push('styles')
    @endpush

    <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">
        <!-- Breadcrumb Start -->
        <x-partials.breadcrumb>{{ $title }}</x-partials.breadcrumb>
        <!-- Breadcrumb End -->

        <div class="grid grid-cols-12 gap-4 md:gap-6 mb-4">
            <div class="col-span-12 space-y-6 xl:col-span-12">
                <!-- Metric Group One -->
                <x-role-admins.fines.grid-count :day="$day" :week="$week" :month="$month" :year="$year" />
                <!-- Metric Group One -->
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg mb-8">
            <x-role-admins.fines.header />
            <x-role-admins.fines.table :fines="$fines" />
            <x-role-admins.fines.pagination :fines="$fines" />
        </div>

        <div class="grid grid-cols-12 gap-4 md:gap-6">
            <div class="col-span-12 space-y-6 xl:col-span-6">
                <!-- Metric Group One -->
                <x-role-admins.fines.table-fine :userFines="$userFines" />
                <!-- Metric Group One -->
            </div>
            <div class="col-span-12 space-y-6 xl:col-span-6">
                <!-- Metric Group One -->
                <x-role-admins.fines.grid-fine :countSuccess="$countSuccess" :countPending="$countPending" />
                <!-- Metric Group One -->
            </div>
        </div>
    </div>
    @push('scripts')
    @endpush
    </x-layout>