<div>
    <flux:card class="min-h-80 space-y-4" data-testid="chat-message-history">
        <div class="space-y-2">
            <flux:heading size="lg">{{ __('Message history') }}</flux:heading>
            <flux:text>{{ __('Conversation messages will appear here.') }}</flux:text>
        </div>

        <div class="min-h-56 space-y-3 rounded-lg border border-dashed border-zinc-300 p-4 dark:border-zinc-600">
            @forelse ($messages as $message)
                <div wire:key="message-history-{{ $message['id'] }}" class="rounded-lg border border-zinc-200 bg-white p-3 dark:border-zinc-700 dark:bg-zinc-900">
                    @if (filled($message['recipient']))
                        <flux:text class="font-medium">{{ $message['recipient'] }}</flux:text>
                    @endif

                    <flux:text>{{ $message['message'] }}</flux:text>
                </div>
            @empty
                <div class="flex min-h-48 items-center justify-center text-center">
                    <flux:text>{{ __('No messages yet.') }}</flux:text>
                </div>
            @endforelse
        </div>
    </flux:card>
</div>
