<?php

test('guests are redirected to the Filament login page', function () {
    $response = $this->get('/admin');

    $response->assertRedirect('/admin/login');
});

test('the Filament login page can be rendered', function () {
    $response = $this->get('/admin/login');

    $response
        ->assertOk()
        ->assertSee('Увійдіть у свій акаунт')
        ->assertSee('favicon.ico');
});

test('the not found page uses the dox.sh brand', function () {
    $response = $this->get('/missing-page');

    $response
        ->assertNotFound()
        ->assertSee('dox.sh')
        ->assertSee('Не знайдено')
        ->assertSee('dox-sh.png')
        ->assertSee('favicon.ico');
});

test('the application locale is Ukrainian', function () {
    expect(app()->getLocale())->toBe('uk')
        ->and(config('app.fallback_locale'))->toBe('uk')
        ->and(config('app.faker_locale'))->toBe('uk_UA');
});
