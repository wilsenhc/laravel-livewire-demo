<?php

use App\Http\Livewire\Posts\PostList;
use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = User::factory()->create();
});

test('posts are loaded correctly', function () {
    Post::factory()->count($postsCount = 10)->create();

    Livewire::actingAs($this->user)
        ->test(PostList::class)
        ->assertCount('posts', $postsCount);
});

test('posts are loaded with user data', function () {
    Post::factory()
        ->for(User::factory()->create(['name' => 'Wilsen H.']))
        ->create();

    Livewire::actingAs($this->user)
        ->test(PostList::class)
        ->assertSet('posts.0.user.name', 'Wilsen H.');
});
