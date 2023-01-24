<?php

use App\Http\Livewire\Posts\PostCreateForm;
use App\Http\Livewire\Posts\PostList;
use App\Models\User;

use function Pest\Laravel\actingAs;

beforeEach(function () {
    $this->user = User::factory()->create();
});

test('post create form component is present', function () {
    actingAs($this->user)
        ->get(route('posts.index'))
        ->assertSeeLivewire(PostCreateForm::class);
});

test('post list component is present', function () {
    actingAs($this->user)
        ->get(route('posts.index'))
        ->assertSeeLivewire(PostList::class);
});
