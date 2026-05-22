<?php

use App\Models\User;
use Flux\Flux;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

new class extends Component {
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public function save(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
        ]);

        $validated['password'] = Hash::make(str()->random(16));

        User::create($validated);

        $this->reset(['name', 'email', 'password']);

        $this->dispatch('user-created');

        Flux::modal('create-user')->close();

        Flux::toast(
            text: 'User has been created.',
            heading: 'User created',
            variant: 'success',
        );
    }
};
?>

<flux:modal name="create-user" flyout variant="floating" class="md:w-lg" :dismissible="false">
    <form wire:submit="save" class="space-y-6">
        <flux:heading size="lg">Create user</flux:heading>

        <flux:input label="Email" name="email" type="email" wire:model="email" />

        <flux:input label="Name" name="name" wire:model="name" />

        <div class="flex">
            <flux:spacer />

            <flux:button type="submit" variant="primary">
                Save
            </flux:button>
        </div>
    </form>
</flux:modal>
