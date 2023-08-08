@props(['trigger'])

<div x-data="{ show: false }" @click.away="show = false" class="relative">
    <div @click="show = !show">
        {{ $trigger }}
    </div>

    <div x-show="show" class="absolute bg-gray-100 rounded-xl w-full mt-2 text-left text-sm leading-6 py-2 z-50 overflow-auto max-h-52" style="display: none;">
        {{ $slot }}
    </div>
</div>
