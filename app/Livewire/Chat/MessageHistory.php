<?php

namespace App\Livewire\Chat;

use App\Models\ChatMessage;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class MessageHistory extends Component
{
    /**
     * @var array<int, array{id: int, recipient: string, message: string}>
     */
    public array $messages = [];

    public ?int $chatId = null;

    public function mount(?int $chatId = null): void
    {
        $this->chatId = $chatId;
        $this->loadMessages();
    }

    public function render(): View
    {
        return view('livewire.chat.message-history');
    }

    /**
     * @param  array{recipient?: string|null, message?: string|null}  $payload
     */
    #[On('message-received')]
    public function refreshMessages(array $payload = [], ?string $recipient = null, ?string $message = null): void
    {
        $this->loadMessages();
    }

    private function loadMessages(): void
    {
        $this->messages = ChatMessage::query()
            ->when($this->chatId !== null, fn ($query) => $query->where('chat_id', $this->chatId))
            ->orderByDesc('id')
            ->get(['id', 'recipient', 'message'])
            ->map(fn (ChatMessage $message): array => [
                'id' => $message->id,
                'recipient' => $message->recipient,
                'message' => $message->message,
            ])
            ->all();
    }
}
