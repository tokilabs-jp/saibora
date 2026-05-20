<x-layouts::admin :title="__('Users')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl inline">Users</h1>

            <!-- Search and Filters -->
            <form method="GET">
                <div class="flex space-x-2">
                    <!-- Search -->
                    <flux:input
                        name="filter[search]"
                        :label="__('Search')"
                        :value="request('filter.search')"
                        icon="magnifying-glass"
                        type="text"
                        placeholder="Search ..."
                    />

                    <!-- Actions -->
                    <div class="flex items-end space-x-2">
                        <flux:button variant="primary" type="submit" class="w-full">
                            Filter
                        </flux:button>
                        <flux:button href="{{ route('admin.users.index') }}">
                            Clear
                        </flux:button>
                    </div>
                </div>
            </form>
        </div>

        @if($users->hasPages())
            {{ $users->links() }}
        @endif

        <div class="overflow-hidden rounded-xl border border-neutral-200 bg-white shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="border-b border-neutral-200 bg-neutral-50 text-xs uppercase tracking-wider text-neutral-500 dark:border-neutral-700 dark:bg-neutral-800/50 dark:text-neutral-400">
                    <tr class="sticky top-0">
                        <th scope="col" class="px-6 py-3 font-medium">
                            {{ __('ID') }}
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            {{ __('Name') }}
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            {{ __('Email') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-right font-medium">
                            {{ __('Actions') }}
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                    @foreach($users as $user)
                        <tr class="transition-colors hover:bg-neutral-50 dark:hover:bg-neutral-800/50">
                            <td class="whitespace-nowrap px-6 py-4 text-neutral-500 dark:text-neutral-400">
                                {{ $user->id }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="font-medium text-neutral-900 dark:text-neutral-100">
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-neutral-600 dark:text-neutral-300">
                                {{ $user->email }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-right">
                                <a
                                    href="#"
                                    class="inline-flex items-center rounded-md px-2 py-1 text-sm font-medium text-neutral-600 transition-colors hover:bg-neutral-100 hover:text-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:hover:text-neutral-100"
                                >
                                    {{ __('View') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @if($users->hasPages())
            {{ $users->links() }}
        @endif
    </div>
</x-layouts::admin>
