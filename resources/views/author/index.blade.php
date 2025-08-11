<x-layout :title="$title">
    @push('styles')
    {{--
    <link rel="stylesheet" href="sweetalert2.min.css"> --}}
    @endpush
    {{-- <p>This is {{ $title }} Page</p> --}}

    <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">
        <!-- Breadcrumb Start -->
        <x-breadcrumb>{{ $title }}</x-breadcrumb>
        <!-- Breadcrumb End -->

        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
            <x-authors.search-and-add-data :authors="$authors" />
            <x-authors.table :authors="$authors" />
            <x-authors.pagination :authors="$authors" />
        </div>
    </div>
    @push('scripts')
    <script>
        //     const input = document.querySelector('#avatar');
    // const previewPhoto = () => {
    //     const file = input.files;
    //     if (file) {
    //         const fileReader = new FileReader();
    //         const preview = document.querySelector('#avatar-preview');
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
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (Session::has('message'))
    <script>
        // document.addEventListener('DOMContentLoaded', function() {
            const isDark = JSON.parse(localStorage.getItem('darkMode')) === true;
            console.log(isDark);
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ Session::get('message') }}',
                background: isDark ? '#1f2937' : '#fff',
                color: isDark ? '#f9fafb' : '#374151',  
                iconColor: isDark ? '#34d399' : '#10b981',
                confirmButtonColor: isDark ? '#2563eb' : '#3b82f6',
                timer: 4500,
                showConfirmButton: true,
            })
        // })
    </script>
    @endif --}}
    @endpush
</x-layout>