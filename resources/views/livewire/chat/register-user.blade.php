<flux:modal name="send-message" class="md:w-96">
    <form name="form" wire:submit="save">
        <div class="mb-8">
            <flux:field>
                <flux:input wire:model="name" name="name" label="Имя" type="text" placeholder="Имя"/>
                <flux:input wire:model="email" name="email" label="Мейл" type="email" placeholder="Имейл бля"/>
            </flux:field>
        </div>

        <div class="space-y-2">
            <flux:button type="submit" variant="primary" class="w-full">Рега</flux:button>
        </div>
    </form>

</flux:modal>

