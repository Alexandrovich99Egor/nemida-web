<?php

namespace App\Livewire\Chat;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class RegisterUser extends Component
{
    public string $name;

    public string $email;

    public function render()
    {
        return view('livewire.chat.register-user');
    }

    public function save()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
        ], [
            'email.unique' => 'Такой поц уже есть',
        ]);

        $plainPassword = Str::password(12);

        try {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($plainPassword),
            ]);

            Auth::login($user);
        } catch (\Exception $exception) {
            $this->addError('error', $exception->getMessage());
        }

    }


}
