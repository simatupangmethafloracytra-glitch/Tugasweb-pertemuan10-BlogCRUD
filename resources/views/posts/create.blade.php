@extends('layouts.app')

@section('title', 'Tulis artikel')

@section('content')
    <x-card title="Tulis artikel baru">
        @include('posts._form', [
            'post'   => new \App\Models\Post,
            'action' => route('posts.store'),
            'method' => 'POST',
            'tombol' => 'Simpan',
        ])
    </x-card>
@endsection
