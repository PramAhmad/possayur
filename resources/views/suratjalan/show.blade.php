<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <!-- Header Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
            <!-- Header Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6 bg-slate-50 dark:bg-slate-800">
                <!-- From Section -->
                <div class="space-y-3">
                    <h2 class="text-xl font-medium text-slate-900 dark:text-slate-300">From:</h2>
                    <div class="text-sm text-slate-500 dark:text-slate-300 space-y-2">
                        <p class="font-medium">{{ $suratJalan->salesorder->outlet->name }}</p>
                        <p class="whitespace-pre-line">{{ $suratJalan->salesorder->outlet->address }}</p>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>{{ $suratJalan->salesorder->outlet->phone }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>{{ $suratJalan->salesorder->outlet->email ?? 'tidak ada email' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Bill To Section -->
                <div class="space-y-3">
                    <h2 class="text-xl font-medium text-slate-900 dark:text-slate-300">Bill to:</h2>
                    <div class="text-sm text-slate-500 dark:text-slate-300 space-y-2">
                        <p class="font-medium">{{ $suratJalan->salesorder->customer->name }}</p>
                        <p class="whitespace-pre-line">{{ $suratJalan->salesorder->customer->address }}</p>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>{{ $suratJalan->salesorder->customer->phone }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>{{ $suratJalan->salesorder->customer->email }}</span>
                        </div>
                    </div>
                </div>

                <!-- Surat Jalan Details -->
                <div class="space-y-3">
                    <h2 class="text-xl font-medium text-slate-900 dark:text-slate-300">Surat Jalan:</h2>
                    <div class="text-sm space-y-2">
                        <div>
                            <h4 class="text-xs uppercase font-medium text-slate-600 dark:text-slate-300">Packer:</h4>
                            <p class="text-slate-500 dark:text-slate-300">{{ $suratJalan->packer }}</p>
                        </div>
                        <div>
                            <h4 class="text-xs uppercase font-medium text-slate-600 dark:text-slate-300">Driver:</h4>
                            <p class="text-slate-500 dark:text-slate-300">{{ $suratJalan->driver }}</p>
                        </div>
                        <div>
                            <h4 class="text-xs uppercase font-medium text-slate-600 dark:text-slate-300">Due date:</h4>
                            <p class="text-slate-500 dark:text-slate-300">
                                {{ Carbon\Carbon::parse($suratJalan->due_date)->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- Comparison Tables -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <!-- Products Surat Jalan Table -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                <div class="p-6">
                    <h3 class="text-lg font-medium mb-4 text-slate-900 dark:text-slate-300">Products Surat Jalan</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700">
                            <thead>
                                <tr>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider">
                                        Product</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider">
                                        Quantity</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider">
                                        Price</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider">
                                        Total</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                                @foreach($suratJalan->productSuratJalans as $product)
                                    <tr>
                                        <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-300">
                                            <p>{{ $product->product->name }}</p>
                                            @if ($product->variant)

                                                <p class="text-xs text-slate-400 dark:text-slate-500">Variant:
                                                    {{ $product->variant->name ?? 'Default' }}</p>
                                            @endif
                                            @if ($product->batch)
                                                <p class="text-xs text-slate-400 dark:text-slate-500">Batch:
                                                    {{ $product->batch->batch_no }}</p>
                                            @endif

                                        </td>
                                        <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-300">{{ $product->qty }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-300">
                                            {{ number_format($product->unit_price, 0, ',', '.') }}</td>
                                        <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-300">
                                            {{ number_format($product->total_price, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            <!-- Sales Order Products Table -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                <div class="p-6">
                    <h3 class="text-lg font-medium mb-4 text-slate-900 dark:text-slate-300">Product Sales Order</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700">
                            <thead>
                                <tr>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider">
                                        Product</th>

                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider">
                                        Quantity</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider">
                                        Price</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider">
                                        Total</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                                @foreach($suratJalan->productSuratJalans as $product)
                                    <tr>
                                        <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-300">
                                            <p>{{ $product->product->name }}</p>
                                            @if ($product->variant)

                                                <p class="text-xs text-slate-400 dark:text-slate-500">Variant:
                                                    {{ $product->variant->name ?? 'Default' }}</p>
                                            @endif
                                            @if ($product->batch)
                                                <p class="text-xs text-slate-400 dark:text-slate-500">Batch:
                                                    {{ $product->batch->batch_no }}</p>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-300">{{ $product->qty }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-300">
                                            {{ number_format($product->unit_price, 0, ',', '.') }}</td>
                                        <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-300">
                                            {{ number_format($product->total_price, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>