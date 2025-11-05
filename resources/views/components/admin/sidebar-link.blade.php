@props(['title', 'svg', 'link' => '#'])

<a href="{{ $link }}"
    {{ $attributes->merge([
        'class' => 'flex items-center p-2 text-base font-medium text-gray-900 rounded-lg 
                        dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group',
    ]) }}>

    <span
        class="w-6 h-6 text-gray-500 transition duration-75 
                dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white
                [&_svg]:w-full [&_svg]:h-full [&_svg_path]:fill-current">
        {!! $svg !!}
    </span>

    <span class="ml-3">{{ $title }}</span>
</a>