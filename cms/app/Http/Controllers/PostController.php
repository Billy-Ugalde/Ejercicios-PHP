<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('posts/index', [
            'posts' => Post::with('user:id,name')
                ->latest()
                ->get(['id', 'user_id', 'title', 'image', 'created_at', 'updated_at']),
        ]);
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return to_route('posts.index');
    }
}
