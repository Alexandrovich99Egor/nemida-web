<?php

use App\Livewire\Chat\MessageHistory;
use App\Livewire\Chat\NewChatModal;
use App\Models\ChatMessage;
use Livewire\Livewire;

test('chat page can be visited', function () {
    $response = $this->get(route('chat'));

    $response
        ->assertOk()
        ->assertSee('Chat workspace')
        ->assertSee('data-modal="new-chat"', false)
        ->assertSee('data-modal="chat-details"', false)
        ->assertSee('wire:submit="createChat"', false)
        ->assertSee('data-testid="chat-message-history"', false)
        ->assertSee('Message history')
        ->assertSee('No messages yet.')
        ->assertSee('livewire.js', false)
        ->assertSee('/flux/flux.js', false)
        ->assertSee('New chat')
        ->assertSee('Chat details');
});

test('new chat modal handler can be called', function () {
    Livewire::test(NewChatModal::class)
        ->set('recipient', 'Taylor')
        ->set('message', 'Hello from the modal')
        ->call('createChat')
        ->assertOk();
});

test('message history shows incoming messages', function () {
    $message = ChatMessage::create([
        'chat_id' => 123,
        'recipient' => 'Taylor',
        'message' => 'History hello',
    ]);

    Livewire::test(MessageHistory::class)
        ->assertSet('messages', [
            [
                'id' => $message->id,
                'recipient' => 'Taylor',
                'message' => 'History hello',
            ],
        ])
        ->assertSee('Taylor')
        ->assertSee('History hello')
        ->assertDontSee('No messages yet.');
});

test('message history shows incoming echo payloads', function () {
    $component = Livewire::test(MessageHistory::class)
        ->assertSee('No messages yet.');

    $message = ChatMessage::create([
        'chat_id' => 456,
        'recipient' => 'Echo user',
        'message' => 'Echo hello',
    ]);

    $component
        ->dispatch('message-received', payload: [
            'recipient' => 'Echo user',
            'message' => 'Echo hello',
        ])
        ->assertSet('messages', [
            [
                'id' => $message->id,
                'recipient' => 'Echo user',
                'message' => 'Echo hello',
            ],
        ])
        ->assertSee('Echo user')
        ->assertSee('Echo hello');
});
