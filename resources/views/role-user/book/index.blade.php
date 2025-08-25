<x-layouts.app :title="$title">
    @push('styles')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet" />
    @endpush

    <div class="mx-auto max-w-(--breakpoint-3xl) p-4 md:p-6">
        <!-- Breadcrumb Start -->
        <x-partials.breadcrumb>{{ $title }}</x-partials.breadcrumb>
        <!-- Breadcrumb End -->

        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
            <x-role-users.books.header />
            <x-role-users.books.table :books="$books" :authors="$authors" :publishers="$publishers"
                :categories="$categories" />
            <x-role-users.books.pagination :books="$books" />
        </div>
    </div>

    @push('scripts')
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.registerPlugin(FilePondPluginFileValidateType);
        FilePond.registerPlugin(FilePondPluginFileValidateSize);
        FilePond.registerPlugin(FilePondPluginImageTransform);
        FilePond.registerPlugin(FilePondPluginImageResize);

        const inputElement = document.querySelector('#cover-create');
        const pond = FilePond.create(inputElement, {
            acceptedFileTypes: ['image/*'],
            maxFileSize: '5MB',
            imageResizeTargetWidth: 600,
            imageResizeTargetHeight: 600,
            imageResizeMode: 'cover',
            imageResizeUpscale: false,
            server: {
                url: '{{ route('admin.upload.cover') }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            },
        });

        document.querySelectorAll('input[id^="cover-update-"]').forEach((input) => {
            const categoryId = input.id.split('-')[2];

            FilePond.create(input, {
                acceptedFileTypes: ['image/*'],
                maxFileSize: '5MB',
                imageResizeTargetWidth: 600,
                imageResizeTargetHeight: 600,
                imageResizeMode: 'cover',
                imageResizeUpscale: false,
                server: {
                    process: {
                        url: '{{ route('admin.upload.cover') }}',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        onload: (response) => {
                            document.querySelector(`#cover-hidden-${categoryId}`).value = response;
                            return response;
                        }
                    },
                },
            });
        });
    </script>
    @endpush
</x-layouts.app>