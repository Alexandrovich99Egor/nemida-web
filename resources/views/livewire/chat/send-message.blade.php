<div>
    <flux:card class="space-y-4 p-4 mb-10">
        @forelse($messages as $message)
            <div class="flex gap-3 border-b border-zinc-200 dark:border-zinc-700 pb-4 last:border-0">
                <div class="flex-1">
                    <div class="flex items-center justify-between">
                        <h3 class="font-semibold">
                            {{ $message->recipient }}
                        </h3>
                        <span class="text-xs text-zinc-500">
                        {{ $message->created_at->diffForHumans() }}
                    </span>
                    </div>

                    <p class="mt-1 text-sm text-zinc-700 dark:text-zinc-300">
                        {{ $message->message }}
                    </p>
                </div>
            </div>
        @empty
            <div class="text-center py-8 text-zinc-500">
                Пока никто ничего не написал 😔
            </div>
        @endforelse
    </flux:card>

    <flux:textarea
        wire:model="message"
        label="Чат одинокий гэй"
        required
        placeholder="Давай пидарок напиши что то сюда"
    >
    </flux:textarea>
    <flux:modal.trigger name="send-message">
        <flux:button wire:click="sendMessage({{\Illuminate\Support\Facades\Auth::user()->id}})" type="submit"
                     class="mt-5 cursor-pointer">Высрать
        </flux:button>
    </flux:modal.trigger>

    @if($success)
        <div class="mt-5">
            <flux:callout variant="success">
                {{ $success }}
            </flux:callout>
        </div>

    @endif
</div>
