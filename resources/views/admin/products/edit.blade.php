<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Product
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('status'))
                        <div class="mb-4 text-green-600">{{ session('status') }}</div>
                    @endif
                    <form method="POST" action="{{ route('admin.products.update', $product) }}" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label value="Name" />
                            <x-text-input name="name" class="w-full" value="{{ old('name', $product->name) }}" required />
                            <x-input-error :messages="$errors->get('name')" />
                        </div>
                        <div>
                            <x-input-label value="Slug" />
                            <x-text-input name="slug" class="w-full" value="{{ old('slug', $product->slug) }}" required />
                            <x-input-error :messages="$errors->get('slug')" />
                        </div>
                        <div>
                            <x-input-label value="Description" />
                            <textarea name="description" class="w-full rounded border-gray-300 dark:bg-gray-900">{{ old('description', $product->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" />
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <x-input-label value="Price" />
                                <x-text-input type="number" step="0.01" min="0" name="price" class="w-full" value="{{ old('price', $product->price) }}" required />
                                <x-input-error :messages="$errors->get('price')" />
                            </div>
                            <div>
                                <x-input-label value="Currency" />
                                <x-text-input name="currency" class="w-full" value="{{ old('currency', $product->currency) }}" required />
                                <x-input-error :messages="$errors->get('currency')" />
                            </div>
                            <div>
                                <x-input-label value="Stock" />
                                <x-text-input type="number" min="0" name="stock" class="w-full" value="{{ old('stock', $product->stock) }}" required />
                                <x-input-error :messages="$errors->get('stock')" />
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }} />
                            <label>Active</label>
                        </div>
                        <div class="flex justify-between gap-2">
                            <a href="{{ route('admin.products.index') }}" class="px-3 py-2 rounded bg-gray-200 dark:bg-gray-700">Back</a>
                            <x-primary-button>Update</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


