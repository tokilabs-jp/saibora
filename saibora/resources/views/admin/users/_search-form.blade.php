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
