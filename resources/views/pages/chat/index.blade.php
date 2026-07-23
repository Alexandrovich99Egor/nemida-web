@extends('layouts.app.app')
@section('content')

    <flux:card>
        @livewire('chat.send-message')
        @guest
            @livewire('chat.register-user')
        @endguest
    </flux:card>

@endsection
