@extends('layouts.app')

@section('title', 'Products - UPAT')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Product Management</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Manage and organize your products</p>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg flex items-center gap-3">
            <i data-feather="check-circle" class="w-5 h-5 text-green-600 dark:text-green-400"></i>
            <span class="text-green-800 dark:text-green-300">{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Add Product Form -->
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-gray-200 dark:border-slate-700 p-6 sticky top-24">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Add New Product</h2>
                <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Product Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required 
                            class="w-full px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-slate-700 dark:text-white @error('name') border-red-500 @enderror"
                            placeholder="Enter product name">
                        @error('name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Quantity</label>
                        <input type="number" name="quantity" value="{{ old('quantity') }}" required 
                            class="w-full px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-slate-700 dark:text-white @error('quantity') border-red-500 @enderror"
                            placeholder="0">
                        @error('quantity')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Price</label>
                        <input type="number" step="0.01" name="price" value="{{ old('price') }}" required 
                            class="w-full px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-slate-700 dark:text-white @error('price') border-red-500 @enderror"
                            placeholder="0.00">
                        @error('price')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                        <textarea name="description" rows="3" 
                            class="w-full px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-slate-700 dark:text-white @error('description') border-red-500 @enderror"
                            placeholder="Enter product description"></textarea>
                        @error('description')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    </div>

                    <button type="submit" class="w-full px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg transition-colors flex items-center justify-center gap-2">
                        <i data-feather="plus" class="w-4 h-4"></i>
                        Add Product
                    </button>
                </form>
            </div>
        </div>

        <!-- Products List -->
        <div class="lg:col-span-2">
            @forelse($products as $product)
                <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-gray-200 dark:border-slate-700 p-6 mb-4 product-card" id="product-{{ $product->id }}">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex-grow">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ $product->name }}</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">{{ $product->description }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-blue-600 dark:text-blue-400">${{ number_format($product->price, 2) }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $product->quantity }} in stock</p>
                        </div>
                    </div>

                    <!-- Product Meta -->
                    <div class="grid grid-cols-2 gap-4 mb-4 py-4 border-t border-b border-gray-200 dark:border-slate-700">
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Product ID</p>
                            <p class="font-semibold text-gray-900 dark:text-white">#{{ $product->id }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Stock Level</p>
                            <p class="font-semibold text-gray-900 dark:text-white">{{ $product->quantity }}</p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-2">
                        <button type="button" onclick="toggleEdit({{ $product->id }})" class="flex-1 px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-medium rounded-lg transition-colors flex items-center justify-center gap-2">
                            <i data-feather="edit-2" class="w-4 h-4"></i>
                            Edit
                        </button>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')" class="w-full px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg transition-colors flex items-center justify-center gap-2">
                                <i data-feather="trash-2" class="w-4 h-4"></i>
                                Delete
                            </button>
                        </form>
                    </div>

                    <!-- Edit Form -->
                    <div id="edit-{{ $product->id }}" class="edit-form hidden mt-4 pt-4 border-t border-gray-200 dark:border-slate-700">
                        <form action="{{ route('products.update', $product) }}" method="POST" class="space-y-4">
                            @csrf
                            @method('PUT')
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Name</label>
                                    <input type="text" name="name" value="{{ $product->name }}" required class="w-full px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-slate-700 dark:text-white">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Quantity</label>
                                    <input type="number" name="quantity" value="{{ $product->quantity }}" required class="w-full px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-slate-700 dark:text-white">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Price</label>
                                    <input type="number" step="0.01" name="price" value="{{ $product->price }}" required class="w-full px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-slate-700 dark:text-white">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                                <textarea name="description" rows="3" class="w-full px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-slate-700 dark:text-white">{{ $product->description }}</textarea>
                            </div>

                            <div class="flex gap-2">
                                <button type="submit" class="flex-1 px-4 py-2 bg-green-500 hover:bg-green-600 text-white font-medium rounded-lg transition-colors">
                                    Save Changes
                                </button>
                                <button type="button" onclick="toggleEdit({{ $product->id }})" class="flex-1 px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg transition-colors">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @empty
                <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-gray-200 dark:border-slate-700 p-12 text-center">
                    <i data-feather="inbox" class="w-12 h-12 text-gray-400 mx-auto mb-4"></i>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">No products yet</h3>
                    <p class="text-gray-600 dark:text-gray-400">Create your first product using the form on the left</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<script>
    function toggleEdit(id) {
        const editForm = document.getElementById('edit-' + id);
        editForm.classList.toggle('hidden');
    }

    // Reinitialize Feather Icons after page load
    setTimeout(() => {
        feather.replace();
    }, 100);
</script>
@endsection