<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Blog') - Blog CRUD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-950 text-slate-200">
    <nav class="border-b border-slate-800">
        <div class="mx-auto flex max-w-3xl items-center justify-between px-4 py-4">
            <a href="{{ route('posts.index') }}" class="font-bold text-pink-500">Blog CRUD</a>
            <a href="{{ route('posts.create') }}" class="rounded-lg bg-pink-600 px-4 py-2 text-sm font-semibold text-white hover:bg-pink-500">Tulis artikel</a>
        </div>
    </nav>

    <main class="mx-auto max-w-3xl px-4 py-8">
        {{-- Flash message sukses / gagal --}}
        @if (session('success'))
            <x-alert type="success">{{ session('success') }}</x-alert>
        @endif
        @if (session('error'))
            <x-alert type="error">{{ session('error') }}</x-alert>
        @endif

        @yield('content')
    </main>
</body>
</html>
