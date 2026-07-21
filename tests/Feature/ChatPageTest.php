<?php

use App\Events\MessageSend;
use App\Livewire\Chat\NewChatModal;
use Illuminate\Support\Facades\Event;
use Livewire\Livewire;

test('chat page can be visited', function () {
    $response = $this->get(route('chat'));

    $response
        ->assertOk()
        ->assertSee('Chat workspace')
        ->assertSee('data-modal="new-chat"', false)
        ->assertSee('data-modal="chat-details"', false)
        ->assertSee('wire:submit="createChat"', false)
        ->assertSee('Incoming messages')
        ->assertSee('livewire.js', false)
        ->assertSee('/flux/flux.js', false)
        ->assertSee('New chat')
        ->assertSee('Chat details');
});

test('new chat modal handler can be called', function () {
    Event::fake();

    Livewire::test(NewChatModal::class)
        ->set('recipient', 'Taylor')
        ->set('message', 'Hello from the modal')
        ->call('createChat')
        ->assertOk();

    Event::assertDispatched(MessageSend::class, function (MessageSend $event): bool {
        return $event->message === [
            'recipient' => 'Taylor',
            'message' => 'Hello from the modal',
        ];
    });
});

test('new chat modal shows incoming messages', function () {
    Livewire::test(NewChatModal::class)
        ->dispatch('message-received', recipient: 'Taylor', message: 'Incoming hello')
        ->assertSet('incomingMessages', 'Taylor: Incoming hello')
        ->assertSee('Incoming hello');
});

test('new chat modal shows incoming echo payloads', function () {
    Livewire::test(NewChatModal::class)
        ->dispatch('message-received', payload: [
            'recipient' => 'Echo user',
            'message' => 'Echo hello',
        ])
        ->assertSet('incomingMessages', 'Echo user: Echo hello')
        ->assertSee('Echo hello');
});
