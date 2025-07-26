@php
    // current product records
    $product_record = $getRecord();
    $color = $product_record?->color->name ?? '#facc15';
@endphp

{{-- Show Hello in background == product color --}}
<div class="rounded-md p-3 text-white font-bold text-center" style="background-color: {{ $color }}">
    Hello {{ $product_record->name ?? 'Product' }}
</div>
