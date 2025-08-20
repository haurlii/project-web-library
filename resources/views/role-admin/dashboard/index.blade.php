<x-layout :title="$title">
    {{-- <p>This is {{ $title }} Page</p> --}}

    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
        <div class="grid grid-cols-12 gap-4 md:gap-6">
            <div class="col-span-12 space-y-6 xl:col-span-12">
                <!-- Metric Group One -->
                <x-role-admins.dashboard.grid-info :user="$user" :book="$book" :loan="$loan" :return="$return" />
                <!-- Metric Group One -->

                <!-- ====== Chart One Start -->
                <x-role-admins.dashboard.bar-chart />
                <!-- ====== Chart One End -->
            </div>

            <div class="col-span-12 xl:col-span-6">
                <!-- ====== Table One Start -->
                <x-role-admins.dashboard.table-one :loans="$loans" />
                <!-- ====== Table One End -->
            </div>

            <div class="col-span-12 xl:col-span-6">
                <!-- ====== Table One Start -->
                <x-role-admins.dashboard.table-two :returns="$returns" />
                <!-- ====== Table One End -->
            </div>

            {{-- <div class="col-span-12 xl:col-span-5">
                <!-- ====== Map One Start -->
                <include src="./partials/map-01.html" />
                <!-- ====== Map One End -->
            </div> --}}
        </div>
    </div>
    @push('scripts')
    <script>
        window.chartData = {
        dates: @json($dates ?? []),
        loanData: @json($loanData ?? []),
        returnData: @json($returnData ?? [])
    };
    </script>
    @endpush
</x-layout>