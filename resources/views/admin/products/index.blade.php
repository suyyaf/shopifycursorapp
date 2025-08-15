<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Products
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-4">
                        <form method="GET" class="flex gap-2">
                            <input name="q" value="{{ request('q') }}" class="border rounded px-2 py-1 bg-white dark:bg-gray-900" placeholder="Search products" />
                            <button class="px-3 py-1 bg-gray-200 dark:bg-gray-700 rounded">Search</button>
                        </form>
                        <a href="{{ route('admin.products.create') }}" class="px-3 py-2 bg-indigo-600 text-white rounded">New Product</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-left text-sm">
                            <thead>
                                <tr>
                                    <th class="px-3 py-2">Name</th>
                                    <th class="px-3 py-2">Price</th>
                                    <th class="px-3 py-2">Stock</th>
                                    <th class="px-3 py-2">Status</th>
                                    <th class="px-3 py-2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr class="border-t border-gray-200 dark:border-gray-700">
                                        <td class="px-3 py-2">{{ $product->name }}</td>
                                        <td class="px-3 py-2">{{ number_format($product->price, 2) }} {{ $product->currency }}</td>
                                        <td class="px-3 py-2">{{ $product->stock }}</td>
                                        <td class="px-3 py-2">{{ $product->is_active ? 'Active' : 'Archived' }}</td>
                                        <td class="px-3 py-2 text-right">
                                            <a class="text-indigo-600" href="{{ route('admin.products.edit', $product) }}">Edit</a>
                                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Delete this product?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-600 ms-3">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-3 py-6 text-center text-gray-500">No products found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">{{ $products->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


