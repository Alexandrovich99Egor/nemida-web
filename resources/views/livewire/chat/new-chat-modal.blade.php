<flux:modal name="new-chat" class="md:w-96">
    <form wire:submit="createChat" class="space-y-6">
        <div class="space-y-2">
            <flux:heading size="lg">{{ __('Start a new chat') }}</flux:heading>
            <flux:text>{{ __('Choose a teammate and draft the first message.') }}</flux:text>
        </div>

        <div class="space-y-4">
            <flux:input wire:model="recipient" label="{{ __('Recipient') }}" placeholder="{{ __('Name or email') }}"/>
            <flux:textarea wire:model="message" label="{{ __('Message') }}"
                           placeholder="{{ __('Write a short message') }}" rows="4"/>
            <flux:textarea label="{{ __('Incoming messages') }}" placeholder="{{ __('Messages will appear here') }}"
                           rows="4" readonly>{{ $incomingMessages }}</flux:textarea>
        </div>

        <div class="flex justify-end gap-2">
            <flux:modal.close>
                <flux:button variant="ghost">{{ __('Cancel') }}</flux:button>
            </flux:modal.close>

            <flux:button variant="primary" type="submit">{{ __('Create chat') }}</flux:button>
        </div>
    </form>
</flux:modal>
