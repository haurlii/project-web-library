<x-layout :title="$title">
    @push('styles')
    @endpush

    <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">
        <!-- Breadcrumb Start -->
        <x-breadcrumb>{{ $title }}</x-breadcrumb>
        <!-- Breadcrumb End -->

        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
            <x-stock-books.search-and-add-data :stocks="$stocks" />
            <x-stock-books.table :stocks="$stocks" />
            <x-stock-books.pagination :stocks="$stocks" />
        </div>
    </div>
    @push('scripts')
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
    </script>
    @endpush
</x-layout>