<?php

namespace App\Livewire\Chat;

use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SendMessage extends Component
{
    public $message;

    public $messages;

    public string|null $success = '';

    public function render()
    {
        return view('livewire.chat.send-message', [
            'messages' => $this->messages,
        ]);
    }

    public function mount()
    {
        $this->loadMessages();
    }

    private function loadMessages()
    {
        $this->messages = ChatMessage::latest()->get();
    }

    /**
     * @return void|null
     */
    public function sendMessage(int $userId)
    {
        $user = Auth::user();

        if (! $user) {
            return;
        }
        try {
            ChatMessage::create([
                'recipient' => $user->name,
                'message' => $this->message,
                'chat_id' => random_int(1000, 9999),
            ]);

            $this->success = 'Бля иди нахуй';
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }
    }
}
