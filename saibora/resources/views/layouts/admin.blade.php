<x-layouts::admin.sidebar :title="$title ?? null">

    <!-- Page Header -->
    @if(isset($header))
        <flux:header class="">
            <div class="text-2xl text-white">
                {{ $header }}
            </div>
        </flux:header>
    @endif

    <!-- Main content -->
    <flux:main>
        {{ $slot }}
    </flux:main>
</x-layouts::app.sidebar>
