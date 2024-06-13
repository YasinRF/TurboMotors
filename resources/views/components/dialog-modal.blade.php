@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-2xl text-center font-medium text-white">
            {{ $title }}
        </div>

        <div class="mt-4 text-sm text-gray-400">
            {{ $content }}
        </div>
    </div>

    <div class="justify-end px-6 py-4 bg-gray-800 text-end">
        {{ $footer }}
    </div>
</x-modal>
