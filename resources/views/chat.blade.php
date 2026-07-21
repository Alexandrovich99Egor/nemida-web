<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head', ['title' => __('Chats')])
        @livewireStyles
    </head>
    <body class="min-h-screen bg-white text-zinc-950 antialiased dark:bg-zinc-900 dark:text-white">
        <main class="mx-auto flex min-h-screen w-full max-w-5xl flex-col gap-8 px-6 py-10">
            <section class="flex flex-col gap-6 rounded-xl border border-zinc-200 bg-zinc-50 p-6 dark:border-zinc-700 dark:bg-zinc-800 sm:p-8">
                <div class="flex flex-col gap-3">
                    <flux:badge color="zinc" class="w-fit">{{ __('Chats') }}</flux:badge>

                    <div class="flex flex-col gap-2">
                        <flux:heading size="xl">{{ __('Chat workspace') }}</flux:heading>
                        <flux:text>
                            {{ __('A lightweight screen for chat actions and contact details.') }}
                        </flux:text>
                    </div>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row">
                    <flux:modal.trigger name="new-chat">
                        <flux:button variant="primary" icon="chat-bubble-left-right">
                            {{ __('New chat') }}
                        </flux:button>
                    </flux:modal.trigger>

                    <flux:modal.trigger name="chat-details">
                        <flux:button variant="filled" icon="information-circle">
                            {{ __('Chat details') }}
                        </flux:button>
                    </flux:modal.trigger>
                </div>
            </section>

            <section class="grid gap-4 md:grid-cols-2">
                <flux:card class="space-y-3">
                    <flux:heading size="lg">{{ __('Recent conversations') }}</flux:heading>
                    <flux:text>{{ __('Open a modal to start a chat or review conversation information.') }}</flux:text>
                </flux:card>

                <flux:card class="space-y-3">
                    <flux:heading size="lg">{{ __('Team inbox') }}</flux:heading>
                    <flux:text>{{ __('This page is ready for frontend chat interactions without backend logic.') }}</flux:text>
                </flux:card>
            </section>

            <section>
                <livewire:chat.message-history />
            </section>
        </main>

        <livewire:chat.new-chat-modal />

        <flux:modal name="chat-details" class="md:w-[28rem]">
            <div class="space-y-6">
                <div class="space-y-2">
                    <flux:heading size="lg">{{ __('Chat details') }}</flux:heading>
                    <flux:text>{{ __('Conversation settings and quick context for the selected chat.') }}</flux:text>
                </div>

                <div class="grid gap-3">
                    <div class="flex items-center justify-between gap-4 rounded-lg border border-zinc-200 p-3 dark:border-zinc-700">
                        <flux:text>{{ __('Status') }}</flux:text>
                        <flux:badge color="green">{{ __('Active') }}</flux:badge>
                    </div>

                    <div class="flex items-center justify-between gap-4 rounded-lg border border-zinc-200 p-3 dark:border-zinc-700">
                        <flux:text>{{ __('Notifications') }}</flux:text>
                        <flux:switch checked />
                    </div>
                </div>

                <div class="flex justify-end">
                    <flux:modal.close>
                        <flux:button variant="primary">{{ __('Done') }}</flux:button>
                    </flux:modal.close>
                </div>
            </div>
        </flux:modal>

        @livewireScripts
        @fluxScripts
    </body>
</html>
