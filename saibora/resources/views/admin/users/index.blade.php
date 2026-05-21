<x-layouts::admin :title="__('Users')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl inline">Users</h1>
            @include('admin.users._search-form')
        </div>
        @include('admin.users._list')
    </div>
</x-layouts::admin>
