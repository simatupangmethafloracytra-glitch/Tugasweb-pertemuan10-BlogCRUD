@props(['title' => null])

<div {{ $attributes->merge(['class' => 'rounded-xl border border-slate-800 bg-slate-900 p-5']) }}>
    @if ($title)
        <h2 class="mb-2 text-lg font-semibold text-pink-400">{{ $title }}</h2>
    @endif
    {{ $slot }}
</div>
