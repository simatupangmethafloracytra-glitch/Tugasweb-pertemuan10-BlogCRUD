<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private function aturan(): array
    {
        return [
            'title' => 'required|string|min:3|max:150',
            'body'  => 'required|string|min:10',
        ];
    }

    private function pesan(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'min'      => ':attribute minimal :min karakter.',
            'max'      => ':attribute maksimal :max karakter.',
        ];
    }

    private function nama(): array
    {
        return ['title' => 'Judul', 'body' => 'Isi artikel'];
    }

    // Daftar post + pencarian + pagination
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        $posts = Post::when($q !== '', fn ($query) => $query->where('title', 'like', "%{$q}%"))
            ->latest()
            ->paginate(6)
            ->withQueryString();

        return view('posts.index', compact('posts', 'q'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->aturan(), $this->pesan(), $this->nama());

        try {
            Post::create($data);
        } catch (\Throwable $e) {
            return back()->withInput()->with('error', 'Gagal menyimpan artikel.');
        }

        return redirect()->route('posts.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    // Route Model Binding: Laravel otomatis mencari Post berdasarkan {post} di URL
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate($this->aturan(), $this->pesan(), $this->nama());

        try {
            $post->update($data);
        } catch (\Throwable $e) {
            return back()->withInput()->with('error', 'Gagal memperbarui artikel.');
        }

        return redirect()->route('posts.show', $post)->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        try {
            $post->delete();
        } catch (\Throwable $e) {
            return redirect()->route('posts.index')->with('error', 'Gagal menghapus artikel.');
        }

        return redirect()->route('posts.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
