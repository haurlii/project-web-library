{{-- Pagination --}}
<nav class="space-y-3 lg:space-y-0 px-4 py-6">
    {{ $loans->onEachSide(0)->links() }}
</nav>
{{-- End Pagination --}}