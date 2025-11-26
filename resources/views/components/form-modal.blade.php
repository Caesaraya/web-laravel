@props([
    'id',
    'title',
    'action',
    'method' => 'POST'
])

<div id="{{ $id }}" tabindex="-1"
     class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-lg p-6">
        
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
            {{ $title }}
        </h2>

        <form action="{{ $action }}" method="POST">
            @csrf
            @if($method !== 'POST')
                @method($method)
            @endif

            <div class="space-y-4">
                {{ $slot }}
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button"
                    data-modal-hide="{{ $id }}"
                    class="px-4 py-2 bg-gray-300 text-gray-900 rounded-lg hover:bg-gray-400">
                    Batal
                </button>

                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Yes
                </button>
            </div>
        </form>

    </div>
</div>
