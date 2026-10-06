@extends('layouts.app')

@section('title', 'Daftar artikel')

@section('content')
    <form method="GET" action="{{ route('posts.index') }}" class="mb-6 flex gap-2">
        <input type="search" name="q" value="{{ $q }}" placeholder="Cari judul artikel"
               class="flex-1 rounded-lg border border-slate-700 bg-slate-900 px-3 py-2">
        <button class="rounded-lg bg-slate-700 px-4 py-2 hover:bg-slate-600">Cari</button>
    </form>

    <div class="space-y-4">
        @forelse ($posts as $post)
            <x-card :title="$post->title">
                <p class="mb-3 text-slate-400">{{ \Illuminate\Support\Str::limit($post->body, 120) }}</p>
                <div class="flex items-center gap-3 text-sm">
                    <a href="{{ route('posts.show', $post) }}" class="text-emerald-400 hover:underline">Baca</a>
                    <a href="{{ route('posts.edit', $post) }}" class="text-sky-400 hover:underline">Edit</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST"
                          onsubmit="return confirm('Hapus artikel ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-400 hover:underline">Hapus</button>
                    </form>
                    <span class="ml-auto text-slate-500">{{ $post->created_at->format('d M Y') }}</span>
                </div>
            </x-card>
        @empty
            <x-card>Belum ada artikel{{ $q !== '' ? ' yang cocok dengan pencarian' : '' }}.</x-card>
        @endforelse
    </div>

    <div class="mt-6">{{ $posts->links() }}</div>
@endsection
