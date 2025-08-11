<x-layout :title="$title">
    {{-- @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/filepond.css') }}">
    @endpush --}}
    {{-- <p>This is {{ $title }} Page</p> --}}

    <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">
        <!-- Breadcrumb Start -->
        <x-breadcrumb>{{ $title }}</x-breadcrumb>
        <!-- Breadcrumb End -->

        {{--
        <x-author.table /> --}}

        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <x-categories.search-and-add-data :categories="$categories" />
            <x-categories.table :categories="$categories" />
            <x-categories.pagination :categories="$categories" />
        </div>
    </div>
    @push('scripts')
    <script>
        //     const input = document.getAttribute('data-preview-target');
    // const previewPhoto = () => {
    //     const file = input.files;
    //     if (file) {
    //         const fileReader = new FileReader();
    //         const preview = document.getElementById('image-preview');
    //         fileReader.onload = function(event) {
    //             preview.setAttribute('src', event.target.result);
    //         }
    //         fileReader.readAsDataURL(file[0]);
    //     }
    // }
    // input.addEventListener("change", previewPhoto);

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
    {{-- <script src="{{ asset('assets/js/filepond.js') }}"></script> --}}
    @endpush
</x-layout>