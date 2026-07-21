<?php

namespace App\Livewire\Chat;

use App\Events\MessageSend;
use App\Models\ChatMessage;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class NewChatModal extends Component
{
    public string $recipient = '';

    public string $message = '';

    public string $incomingMessages = '';

    /**
     * @var array<int, string>
     */
    private array $messages = [];

    public function render(): View
    {
        return view('livewire.chat.new-chat-modal');
    }

    public function createChat(): void
    {

        $messages = ChatMessage::create([
            'chat_id' => random_int(10000000, 99999999),
            'recipient' => $this->recipient,
            'message' => $this->message,
        ]);

        event(new MessageSend([
            'chat_id' => $messages->chat_id,
            'message' => $messages->message,
            'recipient' => $messages->recipient,
        ]));
    }

    #[On('message-received')]
    /**
     * @param  array{recipient?: string, message?: string}  $payload
     */
    public function messageReceived(array $payload = [], ?string $recipient = null, ?string $message = null): void
    {
        $recipient ??= $payload['recipient'] ?? null;
        $message ??= $payload['message'] ?? null;

        $this->messages[] = filled($recipient)
            ? "{$recipient}: {$message}"
            : (string) $message;

        $this->incomingMessages = implode(PHP_EOL, $this->messages);
    }
}
