@extends('layouts.app')

@section('title', 'Edit artikel')

@section('content')
    <x-card title="Edit artikel">
        @include('posts._form', [
            'post'   => $post,
            'action' => route('posts.update', $post),
            'method' => 'PUT',
            'tombol' => 'Simpan perubahan',
        ])
    </x-card>
@endsection
