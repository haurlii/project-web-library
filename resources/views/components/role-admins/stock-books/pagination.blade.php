@if ($stocks->hasPages())
<nav class="space-y-3 lg:space-y-0 px-4 py-6">
    {{ $stocks->onEachSide(0)->links() }}
</nav>
@endif