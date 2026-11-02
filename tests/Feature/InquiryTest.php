<?php

use App\Models\Inquiry;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

function inquiryData(array $changes = []): array
{
    return array_replace([
        'name' => 'A visitor',
        'email' => 'visitor@example.com',
        'service' => 'Photography',
        'message' => 'I would like to discuss an event shoot.',
    ], $changes);
}

test('contact accepts an inquiry and shows a confirmation without exposing it publicly', function () {
    post('/contact', inquiryData(['read_at' => now(), 'is_admin' => true]))
        ->assertRedirect('/contact#inquiry-form')->assertSessionHas('inquiry_status');
    $inquiry = Inquiry::firstOrFail();
    expect($inquiry->name)->toBe('A visitor')->and($inquiry->email)->toBe('visitor@example.com')->and($inquiry->read_at)->toBeNull();
    get('/contact')->assertOk()->assertSee('Your inquiry has been received.')->assertDontSee('I would like to discuss an event shoot.');
});

test('invalid inquiry input is rejected and retained for correction', function () {
    post('/contact', inquiryData(['name' => '', 'email' => 'not-email', 'service' => 'Invalid service', 'message' => '']))
        ->assertSessionHasErrors(['name', 'email', 'service', 'message'])->assertSessionHasInput('email', 'not-email');
    post('/contact', inquiryData(['email' => 'test@test']))->assertSessionHasErrors('email');
    post('/contact', inquiryData(['email' => str_repeat('a', 250).'@example.com']))->assertSessionHasErrors('email');
    post('/contact', inquiryData(['message' => str_repeat('x', 2001)]))->assertSessionHasErrors('message');
    expect(Inquiry::count())->toBe(0);
});

test('all offered service categories are accepted', function () {
    foreach (['Photography', 'Video Editing', 'App/Website', 'Other'] as $service) {
        post('/contact', inquiryData(['service' => $service]))->assertSessionHasNoErrors();
    }
    expect(Inquiry::count())->toBe(4);
});
