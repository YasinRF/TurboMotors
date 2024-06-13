@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-orange-600']) }}>{{ $message }}</p>
@enderror
