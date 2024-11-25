<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <!-- Invoice Header Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
            <!-- Header Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6 bg-slate-50 dark:bg-slate-800">
                <!-- Company Section -->
                <div class="space-y-3">
                    <h2 class="text-xl font-medium text-slate-900 dark:text-slate-300">From:</h2>
                    <div class="text-sm text-slate-500 dark:text-slate-300 space-y-2">
                        <p class="font-medium">{{ $invoice->outlet->name }}</p>
                        <p class="whitespace-pre-line">{{ $invoice->outlet->address }}</p>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>{{ $invoice->outlet->phone }}</span>
                        </div>
                    </div>
                </div>

                <!-- Customer Section -->
                <div class="space-y-3">
                    <h2 class="text-xl font-medium text-slate-900 dark:text-slate-300">Bill to:</h2>
                    <div class="text-sm text-slate-500 dark:text-slate-300 space-y-2">
                        <p class="font-medium">{{ $invoice->salesorder->customer->name }}</p>
                        <p class="whitespace-pre-line">{{ $invoice->salesorder->customer->address }}</p>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>{{ $invoice->salesorder->customer->phone }}</span>
                        </div>
                    </div>
                </div>

                <!-- Invoice Details -->
                <div class="space-y-3">
                    <h2 class="text-xl font-medium text-slate-900 dark:text-slate-300">Invoice Details:</h2>
                    <div class="text-sm space-y-2">
                        <div>
                            <h4 class="text-xs uppercase font-medium text-slate-600 dark:text-slate-300">Invoice Number:</h4>
                            <p class="text-slate-500 dark:text-slate-300">{{ $invoice->reference_number }}</p>
                        </div>
                        <div>
                            <h4 class="text-xs uppercase font-medium text-slate-600 dark:text-slate-300">Invoice Date:</h4>
                            <p class="text-slate-500 dark:text-slate-300">{{ Carbon\Carbon::parse($invoice->created_at)->translatedFormat('d F Y') }}</p>
                        </div>
                        <div>
                            <h4 class="text-xs uppercase font-medium text-slate-600 dark:text-slate-300">Due Date:</h4>
                            <p class="text-slate-500 dark:text-slate-300">{{ Carbon\Carbon::parse($invoice->suratJalan->due_date)->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Invoice Products Table -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow mt-6">
            <div class="p-6">
                <h3 class="text-lg font-medium mb-4 text-slate-900 dark:text-slate-300">Invoice Products</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider">Product</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider">Details</th>
                                <th class="px-4 py-3 text-right text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider">Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                            @foreach($invoice->productInvoices as $product)
                            <tr>
                                <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-300">
                                    {{ $product->product->name }}
                                </td>
                                <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-300">
                                    <div class="flex justify-between">
                                        <span>Qty: {{ $product->qty }}</span>
                                        <span>Price: {{ number_format($product->price, 0, ',', '.') }}</span>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-right text-sm text-slate-500 dark:text-slate-300">
                                    {{ number_format($product->total, 0, ',', '.') }}
                                </td>
                            </tr>
                            @endforeach
                            
                            <!-- Total Row -->
                            <tr class="font-bold">
                                <td colspan="2" class="px-4 py-3 text-right text-slate-900 dark:text-slate-300">Grand Total</td>
                                <td class="px-4 py-3 text-right text-slate-900 dark:text-slate-300">
                                    {{ number_format($invoice->productInvoices->sum('total'), 0, ',', '.') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>