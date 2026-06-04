@extends('layouts.app')

@section('title', 'Home - UPAT')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-slate-800 dark:to-slate-900 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    Modern Product Management
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 mb-8">
                    Manage your products efficiently with UPAT. Easy to use, powerful features, and beautiful design.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('products.index') }}" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors flex items-center justify-center gap-2">
                        <i data-feather="package" class="w-5 h-5"></i>
                        View Products
                    </a>
                    <a href="#features" class="px-6 py-3 bg-white dark:bg-slate-700 text-blue-600 dark:text-blue-400 font-semibold rounded-lg border-2 border-blue-600 dark:border-blue-400 hover:bg-blue-50 dark:hover:bg-slate-600 transition-colors flex items-center justify-center gap-2">
                        <i data-feather="arrow-down" class="w-5 h-5"></i>
                        Learn More
                    </a>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="bg-white dark:bg-slate-800 rounded-lg shadow-lg p-8">
                    <div class="space-y-4">
                        <div class="h-4 bg-gray-200 dark:bg-slate-700 rounded w-3/4"></div>
                        <div class="h-4 bg-gray-200 dark:bg-slate-700 rounded w-1/2"></div>
                        <div class="h-32 bg-gradient-to-br from-blue-100 to-indigo-100 dark:from-slate-700 dark:to-slate-600 rounded-lg mt-8"></div>
                        <div class="grid grid-cols-3 gap-2 mt-6">
                            <div class="h-20 bg-gray-100 dark:bg-slate-700 rounded"></div>
                            <div class="h-20 bg-gray-100 dark:bg-slate-700 rounded"></div>
                            <div class="h-20 bg-gray-100 dark:bg-slate-700 rounded"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-12 bg-white dark:bg-slate-800 border-b border-gray-200 dark:border-slate-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="text-3xl font-bold text-blue-600 dark:text-blue-400">{{ count($products ?? []) }}</div>
                <p class="text-gray-600 dark:text-gray-400 mt-2">Products Managed</p>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-blue-600 dark:text-blue-400">
                    ${{ number_format($products->sum('price') ?? 0, 2) }}
                </div>
                <p class="text-gray-600 dark:text-gray-400 mt-2">Total Value</p>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-blue-600 dark:text-blue-400">{{ $products->sum('quantity') ?? 0 }}</div>
                <p class="text-gray-600 dark:text-gray-400 mt-2">Items in Stock</p>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 bg-gray-50 dark:bg-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Key Features</h2>
            <p class="text-xl text-gray-600 dark:text-gray-400">Everything you need to manage your products effectively</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-gray-200 dark:border-slate-700 p-8 hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mb-4">
                    <i data-feather="package" class="w-6 h-6 text-blue-600 dark:text-blue-400"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Product Management</h3>
                <p class="text-gray-600 dark:text-gray-400">Easily add, edit, and delete products with an intuitive interface</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-gray-200 dark:border-slate-700 p-8 hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mb-4">
                    <i data-feather="bar-chart-2" class="w-6 h-6 text-blue-600 dark:text-blue-400"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Real-time Analytics</h3>
                <p class="text-gray-600 dark:text-gray-400">Track inventory, pricing, and stock levels with live updates</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-gray-200 dark:border-slate-700 p-8 hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mb-4">
                    <i data-feather="shield" class="w-6 h-6 text-blue-600 dark:text-blue-400"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Secure & Reliable</h3>
                <p class="text-gray-600 dark:text-gray-400">Enterprise-grade security for your product data</p>
            </div>

            <!-- Feature 4 -->
            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-gray-200 dark:border-slate-700 p-8 hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mb-4">
                    <i data-feather="smartphone" class="w-6 h-6 text-blue-600 dark:text-blue-400"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Fully Responsive</h3>
                <p class="text-gray-600 dark:text-gray-400">Works seamlessly on desktop, tablet, and mobile devices</p>
            </div>

            <!-- Feature 5 -->
            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-gray-200 dark:border-slate-700 p-8 hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mb-4">
                    <i data-feather="zap" class="w-6 h-6 text-blue-600 dark:text-blue-400"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Lightning Fast</h3>
                <p class="text-gray-600 dark:text-gray-400">Optimized performance for quick loading and smooth interactions</p>
            </div>

            <!-- Feature 6 -->
            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-sm border border-gray-200 dark:border-slate-700 p-8 hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mb-4">
                    <i data-feather="users" class="w-6 h-6 text-blue-600 dark:text-blue-400"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Team Collaboration</h3>
                <p class="text-gray-600 dark:text-gray-400">Share products and collaborate with team members efficiently</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-white dark:bg-slate-800">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-6">Ready to get started?</h2>
        <p class="text-xl text-gray-600 dark:text-gray-400 mb-8">Start managing your products today with UPAT</p>
        <a href="{{ route('products.index') }}" class="inline-block px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors">
            Go to Products
        </a>
    </div>
</section>

<script>
    // Reinitialize Feather Icons
    setTimeout(() => {
        feather.replace();
    }, 100);
</script>
@endsection
