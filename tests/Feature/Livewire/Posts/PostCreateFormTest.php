<?php

use App\Http\Livewire\Posts\PostCreateForm;
use App\Models\User;
use Livewire\Livewire;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;

beforeEach(function () {
    $this->user = User::factory()->create();
});

test('open defaults to false', function () {
    Livewire::actingAs($this->user)
        ->test(PostCreateForm::class)
        ->assertSet('open', false);
});

test('post defaults is empty', function () {
    Livewire::actingAs($this->user)
        ->test(PostCreateForm::class)
        ->assertSet('post.title', '')
        ->assertSet('post.content', '')
        ->assertSet('post.exists', false);
});

test('post title and content is required', function () {
    Livewire::actingAs($this->user)
        ->test(PostCreateForm::class)
        ->set('post.title', '')
        ->set('post.content', '')
        ->call('save')
        ->assertHasErrors([
            'post.title' => 'required',
            'post.content' => 'required',
        ]);
});

test('post is correctly saved', function () {
    Livewire::actingAs($this->user)
        ->test(PostCreateForm::class)
        ->set('post.title', 'Lorem impsum')
        ->set('post.content', 'This is a new post content')
        ->call('save')
        ->assertOk();

    assertDatabaseHas('posts', [
        'title' => 'Lorem impsum',
        'content' => 'This is a new post content',
        'user_id' =>  $this->user->id,
    ]);
});

test('post is correctly reset', function () {
    Livewire::actingAs($this->user)
        ->test(PostCreateForm::class)
        ->set('post.title', 'Lorem impsum')
        ->set('post.content', 'This is a new post content')
        ->call('save')
        ->assertSet('post.title', '')
        ->assertSet('post.content', '')
        ->assertSet('post.exists', false);
});

test('open is correctly reset', function () {
    Livewire::actingAs($this->user)
        ->test(PostCreateForm::class)
        ->set('open', true)
        ->set('post.title', 'Lorem impsum')
        ->set('post.content', 'This is a new post content')
        ->call('save')
        ->assertSet('open', false);
});

test('postCreated event is correctly emitted', function () {
    Livewire::actingAs($this->user)
        ->test(PostCreateForm::class)
        ->set('post.title', 'Lorem impsum')
        ->set('post.content', 'This is a new post content')
        ->call('save')
        ->assertEmitted('postCreated');
});
