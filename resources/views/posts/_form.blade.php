{{-- Variabel: $post, $action, $method (POST / PUT), $tombol --}}
<form action="{{ $action }}" method="POST" class="space-y-4">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif

    <div>
        <label for="title" class="mb-1 block text-sm text-slate-400">Judul</label>
        <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}"
               class="w-full rounded-lg border bg-slate-950 px-3 py-2 @error('title') border-red-500 @else border-slate-700 @enderror">
        @error('title')
            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="body" class="mb-1 block text-sm text-slate-400">Isi artikel</label>
        <textarea id="body" name="body" rows="7"
                  class="w-full rounded-lg border bg-slate-950 px-3 py-2 @error('body') border-red-500 @else border-slate-700 @enderror">{{ old('body', $post->body) }}</textarea>
        @error('body')
            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center gap-4">
        <button class="rounded-lg bg-pink-600 px-5 py-2 font-semibold text-white hover:bg-pink-500">{{ $tombol }}</button>
        <a href="{{ route('posts.index') }}" class="text-slate-400 hover:underline">Batal</a>
    </div>
</form>
