@props(['type' => 'success'])

@php
    $warna = $type === 'success'
        ? 'border-emerald-500 bg-emerald-500/10 text-emerald-300'
        : 'border-red-500 bg-red-500/10 text-red-300';
@endphp

<div {{ $attributes->merge(['class' => "mb-4 rounded-lg border px-4 py-3 text-sm $warna"]) }}>
    {{ $slot }}
</div>
