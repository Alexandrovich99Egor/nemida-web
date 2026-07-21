<?php

namespace App\Livewire\Chat;

use App\Events\MessageSend;
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
        event(new MessageSend([
            'recipient' => $this->recipient,
            'message' => $this->message,
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
