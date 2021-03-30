<div
    {{ $attributes->merge([ "class" => "absolute inset-0 w-full h-full bg-black bg-opacity-75 flex justify-center items-center" ]) }}>
    <div class="bg-white md:max-w-xl w-1/2 rounded-lg shadow-lg overflow-hidden">
        <div class="border-b bg-gray-50 px-6 py-4 flex justify-between">
            <div>Are you sure to delete <strong>{{ $title }}</strong> ?</div>
            <button @click="{{ $state }} = false" class="focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
        <div class="p-6">
            <div class="flex justify-between items-center">
                {{ $slot }}
                <button @click="{{ $state }} = false"
                    class="bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded shadow-sm focus:outline-none font-medium text-xs uppercase text-white">
                    No
                </button>
            </div>
        </div>
    </div>
</div>