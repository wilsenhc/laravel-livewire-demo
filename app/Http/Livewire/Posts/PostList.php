<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Component;

class PostList extends Component
{
    public Collection $posts;

    protected $listeners = ['postCreated' => 'getPosts'];

    /**
     * Gets the post and corresponding users from the database
     *
     * @return void
     */
    public function getPosts()
    {
        $this->posts = Post::query()
            ->with(['user'])
            ->latest()
            ->get();
    }

    /**
     * Mount lifecycle event
     *
     * @return void
     */
    public function mount()
    {
        $this->getPosts();
    }

    /**
     * Render function
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.posts.post-list');
    }
}
