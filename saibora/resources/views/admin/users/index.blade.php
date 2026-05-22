<x-layouts::admin :title="__('Users')" xmlns:flux="http://www.w3.org/1999/html">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl inline">Users</h1>
            <span class="flex justify-end">
                <flux:modal.trigger name="create-user">
                    <flux:button variant="primary">Create user</flux:button>
                </flux:modal.trigger>
            </span>
        </div>
        @include('admin.users._search-form')
        @include('admin.users._list')
    </div>
    @livewire('admin.users.create-user')
</x-layouts::admin>
