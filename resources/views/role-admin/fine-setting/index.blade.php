<x-layout :title="$title">
    @push('styles')
    @endpush

    <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">
        <!-- Breadcrumb Start -->
        <x-breadcrumb>{{ $title }}</x-breadcrumb>
        <!-- Breadcrumb End -->

        <div class="bg-white dark:bg-gray-800/40 relative shadow-md sm:rounded-lg">
            <x-role-admins.fine-settings.form :fineSetting="$fineSetting" />
        </div>
    </div>
    @push('scripts')
    @endpush
</x-layout>