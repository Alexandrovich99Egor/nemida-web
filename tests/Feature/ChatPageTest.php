<?php

test('chat page can be visited', function () {
    $response = $this->get(route('chat'));

    $response
        ->assertOk()
        ->assertSee('Chat workspace')
        ->assertSee('data-modal="new-chat"', false)
        ->assertSee('data-modal="chat-details"', false)
        ->assertSee('New chat')
        ->assertSee('Chat details');
});
