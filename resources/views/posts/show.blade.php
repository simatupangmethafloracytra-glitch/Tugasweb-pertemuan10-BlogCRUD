@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <x-card :title="$post->title">
        <p class="mb-4 text-sm text-slate-500">Dibuat {{ $post->created_at->format('d M Y H:i') }}</p>
        <p class="whitespace-pre-line leading-relaxed">{{ $post->body }}</p>
    </x-card>
    <div class="mt-4 flex gap-4 text-sm">
        <a href="{{ route('posts.index') }}" class="text-slate-400 hover:underline">Kembali</a>
        <a href="{{ route('posts.edit', $post) }}" class="text-sky-400 hover:underline">Edit</a>
    </div>
@endsection
