<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class PostCreateForm extends Component
{
    public bool $open;

    public Post $post;

    /**
     * Validation rules
     *
     * @var array<string, string>
     */
    protected $rules = [
        'post.title' => 'required|string|min:6',
        'post.content' => 'required|string|max:500',
    ];

    /**
     * Mount lifecycle event
     *
     * @return void
     */
    public function mount()
    {
        $this->open = false;

        $this->post = new Post;
    }

    /**
     * Render function
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.posts.post-create-form');
    }

    /**
     * Save method. Creates a new post
     *
     * @return void
     */
    public function save()
    {
        $this->validate();

        $this->post->fill([
            'user_id' => auth()->user()->id,
        ])->save();

        $this->post = new Post;

        $this->open = false;

        $this->emit('postCreated');
    }
}
