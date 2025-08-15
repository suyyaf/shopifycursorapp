<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-2">
                    <div>Price: {{ number_format($product->price, 2) }} {{ $product->currency }}</div>
                    <div>Stock: {{ $product->stock }}</div>
                    <div>Status: {{ $product->is_active ? 'Active' : 'Archived' }}</div>
                    <div class="prose dark:prose-invert max-w-none mt-4">{!! nl2br(e($product->description)) !!}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


