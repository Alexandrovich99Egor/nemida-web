<?php

test('guests are redirected to the Filament login page', function () {
    $response = $this->get('/admin');

    $response->assertRedirect('/admin/login');
});

test('the Filament login page can be rendered', function () {
    $response = $this->get('/admin/login');

    $response->assertOk();
});
