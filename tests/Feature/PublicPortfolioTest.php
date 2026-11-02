<?php

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

function publicPostData(array $changes = []): array
{
    return array_replace([
        'title' => 'My first project',
        'excerpt' => 'A short introduction.',
        'body' => 'The story behind the project.',
        'is_published' => true,
        'is_featured' => true,
    ], $changes);
}

test('only published posts are public and only featured published posts appear on home', function () {
    $featured = Post::create(publicPostData(['title' => 'Selected example']));
    $regular = Post::create(publicPostData(['title' => 'Regular example', 'is_featured' => false]));
    $draft = Post::create(publicPostData(['title' => 'Private draft', 'is_published' => false]));

    get('/blog')->assertOk()->assertSee('Selected example')->assertSee('Regular example')->assertDontSee('Private draft');
    get('/home')->assertOk()->assertSee('Selected example')->assertDontSee('Regular example')->assertDontSee('Private draft');
    get('/blog/'.$featured->id)->assertOk()->assertSee('The story behind the project.');
    get('/blog/'.$regular->id)->assertOk();
    get('/blog/'.$draft->id)->assertNotFound();
    get('/blog/99999')->assertNotFound();
});

test('public pages have useful empty states', function () {
    get('/blog')->assertOk()->assertSee('No posts published yet.');
    get('/home')->assertOk()->assertSee('No selected work yet.');
});

test('home selects exactly the latest three eligible posts', function () {
    foreach (range(1, 5) as $number) {
        Post::create(publicPostData(['title' => 'Eligible post '.$number]));
    }
    Post::create(publicPostData(['title' => 'Newest draft', 'is_published' => false]));
    Post::create(publicPostData(['title' => 'Newest regular', 'is_featured' => false]));
    get('/home')->assertSeeInOrder(['Eligible post 5', 'Eligible post 4', 'Eligible post 3'])
        ->assertDontSee('Eligible post 2')->assertDontSee('Eligible post 1')
        ->assertDontSee('Newest draft')->assertDontSee('Newest regular');
});

test('blog post bodies render markdown links while keeping html escaped', function () {
    $post = Post::create(publicPostData([
        'body' => 'Read [my project](https://example.com/project) or https://example.org.'."\n\n".'**Bold** text.'."\n\n".'<script>alert(3)</script>',
    ]));

    get('/blog/'.$post->id)
        ->assertOk()
        ->assertSee('<a href="https://example.com/project">my project</a>', false)
        ->assertSee('<a href="https://example.org">https://example.org</a>', false)
        ->assertSee('<strong>Bold</strong>', false)
        ->assertSee('&lt;script&gt;alert(3)&lt;/script&gt;', false)
        ->assertDontSee('<script>alert(3)</script>', false);
});
