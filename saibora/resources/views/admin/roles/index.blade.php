<x-layouts::admin :title="__('Role-Permission Matrix')" xmlns:flux="http://www.w3.org/1999/html">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <h1 class="text-2xl inline">{{ __('Role-Permission Matrix') }}</h1>
        @php
            /** @var \Illuminate\Support\Collection<\Spatie\Permission\Models\Permission> $permissions */
            /** @var \Spatie\Permission\Models\Permission $permission */
            $role_enums = [
                    \App\Enums\UserRole::SYSTEM_ADMIN,
                    \App\Enums\UserRole::STAFF,
                    \App\Enums\UserRole::VOLUNTEER,
                    \App\Enums\UserRole::CLIENT
                ];
        @endphp
        <flux:table>
            <flux:table.columns class="bg-white dark:bg-zinc-800">
                <flux:table.column>Permission</flux:table.column>
                @foreach($role_enums as $role_enum)
                    <flux:table.column>
                        <flux:badge :color="$role_enum->color()">{{ $role_enum->label() }}</flux:badge>
                    </flux:table.column>
                @endforeach
            </flux:table.columns>
            <flux:table.rows>
                @foreach($permissions as $permission)
                    <flux:table.row>
                        <flux:table.cell>{{ \App\Enums\UserPermission::tryFrom($permission->name)->label() }}</flux:table.cell>
                        @foreach($role_enums as $role_enum)
                            @php
                                $is_matched = $permission->roles()->firstWhere('name', $role_enum->value) !== null
                            @endphp
                            <flux:table.cell @class([
                                'bg-green-200' => $is_matched,
                                'bg-red-200' => !$is_matched
                            ])>
                                <span class="text-black">
                                    @if($is_matched)
                                        y
                                    @else
                                        n
                                    @endif
                                </span>
                            </flux:table.cell>
                        @endforeach
                    </flux:table.row>
                @endforeach
            </flux:table.rows>
        </flux:table>
    </div>
    @livewire('admin.users.create-user')
</x-layouts::admin>
