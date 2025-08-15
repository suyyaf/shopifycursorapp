<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            New Product
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.products.store') }}" class="space-y-4">
                        @csrf
                        <div>
                            <x-input-label value="Name" />
                            <x-text-input name="name" class="w-full" value="{{ old('name') }}" required />
                            <x-input-error :messages="$errors->get('name')" />
                        </div>
                        <div>
                            <x-input-label value="Slug (optional)" />
                            <x-text-input name="slug" class="w-full" value="{{ old('slug') }}" />
                            <x-input-error :messages="$errors->get('slug')" />
                        </div>
                        <div>
                            <x-input-label value="Description" />
                            <textarea name="description" class="w-full rounded border-gray-300 dark:bg-gray-900">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" />
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <x-input-label value="Price" />
                                <x-text-input type="number" step="0.01" min="0" name="price" class="w-full" value="{{ old('price', 0) }}" required />
                                <x-input-error :messages="$errors->get('price')" />
                            </div>
                            <div>
                                <x-input-label value="Currency" />
                                <x-text-input name="currency" class="w-full" value="{{ old('currency', 'USD') }}" required />
                                <x-input-error :messages="$errors->get('currency')" />
                            </div>
                            <div>
                                <x-input-label value="Stock" />
                                <x-text-input type="number" min="0" name="stock" class="w-full" value="{{ old('stock', 0) }}" required />
                                <x-input-error :messages="$errors->get('stock')" />
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} />
                            <label>Active</label>
                        </div>
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('admin.products.index') }}" class="px-3 py-2 rounded bg-gray-200 dark:bg-gray-700">Cancel</a>
                            <x-primary-button>Save</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


