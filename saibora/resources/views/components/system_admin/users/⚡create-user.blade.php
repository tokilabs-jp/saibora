<?php

use App\Models\User;
use Flux\Flux;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

new class extends Component {
    public string $name = '';

    public string $email = '';

    public array $roles = [];

    public function save(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'roles' => ['required', 'array', 'min:1'],
            'roles.*' => ['required', Rule::exists('roles', 'name')],
        ]);

        $validated['password'] = Hash::make(str()->random(16));

        $user = User::create($validated);
        $user->assignRole($validated['roles']);

        $this->reset(['name', 'email', 'roles']);

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

<flux:modal name="create-user" flyout variant="floating" class="w-xl md:w-lg" :dismissible="false">
    <form wire:submit="save" class="space-y-6">
        <flux:heading size="lg">Create user</flux:heading>

        <flux:input label="Email" name="email" type="email" wire:model="email"/>

        <flux:input label="Name" name="name" wire:model="name"/>

        <flux:separator/>

        <flux:checkbox.group wire:model="roles" label="Role">
            @foreach(\App\Enums\UserRole::selectableRoles() as $role)
                <flux:checkbox
{{--                    name="roles[{{ $role->value }}]"--}}
                    value="{{ $role->value }}"
                    label="{{ $role->label() }}"
                    description="{{ $role->description() }}"
                />
            @endforeach
        </flux:checkbox.group>

        <div class="flex">
            <flux:spacer/>

            <flux:button type="submit" variant="primary">
                Save
            </flux:button>
        </div>
    </form>
</flux:modal>
