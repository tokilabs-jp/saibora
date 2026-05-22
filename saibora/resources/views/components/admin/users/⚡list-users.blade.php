<?php

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

new class extends Component
{
    #[On('user-created')]
    public function refreshUsers(): void
    {
        //
    }

    public function with(): array
    {
        $users = QueryBuilder::for(User::class)
            ->allowedFilters(
            // Global search across id and email
                AllowedFilter::callback('search', function ($query, $value) {
                    if (is_numeric($value)) {
                        $query->where('id', $value);
                    } else {
                        $query->where('email', 'like', "%{$value}%");
                    }
                })
            )
            ->orderByDesc('id')
            ->paginate();

        return compact('users');
    }
};
?>

@php
/** @var \Illuminate\Support\Collection<\App\Models\User> $users */
@endphp
<flux:table :paginate="$users">
    <flux:table.columns class="bg-white dark:bg-zinc-800">
        <flux:table.column>ID</flux:table.column>
        <flux:table.column>EMAIL</flux:table.column>
        <flux:table.column>NAME</flux:table.column>
        <flux:table.column></flux:table.column>
    </flux:table.columns>
    <flux:table.rows>
        @forelse($users as $user)
            <flux:table.row :key="$user->id">
                <flux:table.cell>{{ $user->id }}</flux:table.cell>
                <flux:table.cell variant="strong">{{ $user->email }}</flux:table.cell>
                <flux:table.cell>{{ $user->name }}</flux:table.cell>
                <flux:table.cell class="text-end">
                    <flux:button variant="ghost" size="sm" icon="ellipsis-horizontal" inset="top bottom" class="me-4"></flux:button>
                </flux:table.cell>
            </flux:table.row>
        @empty
            <tr>
                <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                    No users found matching your criteria.
                </td>
            </tr>
        @endforelse
    </flux:table.rows>
</flux:table>
