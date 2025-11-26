@props(['fields', 'data' => null])

@foreach ($fields as $field)
    @php
        $value = old($field['name'], $data->{$field['name']} ?? '');
    @endphp

    @if($field['type'] === 'textarea')
        <div>
            <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">
                {{ $field['label'] }}
            </label>
            <textarea name="{{ $field['name'] }}" rows="{{ $field['rows'] ?? 3 }}"
                class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white">{{ $value }}</textarea>
        </div>

    @elseif($field['type'] === 'select')
        <div>
            <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">
                {{ $field['label'] }}
            </label>
            <select name="{{ $field['name'] }}"
                class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white">
                @foreach ($field['options'] as $opt)
                    <option value="{{ $opt['value'] }}" 
                        {{ $value == $opt['value'] ? 'selected' : '' }}>
                        {{ $opt['label'] }}
                    </option>
                @endforeach
            </select>
        </div>

    @else
        <div>
            <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">
                {{ $field['label'] }}
            </label>
            <input type="{{ $field['type'] }}" name="{{ $field['name'] }}" 
                value="{{ $value }}"
                class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white">
        </div>
    @endif
@endforeach
