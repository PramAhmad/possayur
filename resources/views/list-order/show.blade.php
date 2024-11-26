<x-app-layout>
    <div>
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>

        @if (session('message'))
        <x-alert :message="session('message')" :type="'success'" />
        @endif
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden mb-5">
            <!-- Header Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6 bg-slate-50 dark:bg-slate-800">
                <!-- Company Section -->
                <div class="space-y-3">
                    <h2 class="text-xl font-medium text-slate-900 dark:text-slate-300">From:</h2>
                    <div class="text-sm text-slate-500 dark:text-slate-300 space-y-2">
                        <p class="font-medium">{{ $salesorder->outlet->name }}</p>
                        <p class="whitespace-pre-line">{{ $salesorder->outlet->address }}</p>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>{{ $salesorder->outlet->phone }}</span>
                        </div>
                    </div>
                </div>

                <!-- Customer Section -->
                <div class="space-y-3">
                    <h2 class="text-xl font-medium text-slate-900 dark:text-slate-300">Bill to:</h2>
                    <div class="text-sm text-slate-500 dark:text-slate-300 space-y-2">
                        <p class="font-medium">{{ $salesorder->customer->name }}</p>
                        <p class="whitespace-pre-line">{{ $salesorder->customer->address }}</p>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>{{ $salesorder->customer->phone }}</span>
                        </div>
                    </div>
                </div>

                <!-- salesorder Details -->
                <div class="space-y-3">
                    <h2 class="text-xl font-medium text-slate-900 dark:text-slate-300">List Order:</h2>
                    <div class="text-sm space-y-2">
                        <div>
                            <h4 class="text-xs uppercase font-medium text-slate-600 dark:text-slate-300">salesorder Number:</h4>
                            <p class="text-slate-500 dark:text-slate-300">{{ $salesorder->reference_no }}</p>
                        </div>
                        <div>
                            <h4 class="text-xs uppercase font-medium text-slate-600 dark:text-slate-300">salesorder Date:</h4>
                            <p class="text-slate-500 dark:text-slate-300">{{ Carbon\Carbon::parse($salesorder->created_at)->translatedFormat('d F Y') }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <header class="card-header noborder">
                <div>
                    <div class="flex justify-between">
                        <ul class="nav nav-tabs flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0 mb-4" id="tabs-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a href="#tabs-home-withIcon" class="nav-link w-full flex items-center font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent active dark:text-slate-300" id="tabs-home-withIcon-tab" data-bs-toggle="pill" data-bs-target="#tabs-home-withIcon" role="tab" aria-controls="tabs-home-withIcon" aria-selected="true">
                                    <iconify-icon class="mr-1" icon="heroicons-outline:home"></iconify-icon>
                                    Semua</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#tabs-profile-withIcon" class="nav-link w-full flex items-center font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300" id="tabs-profile-withIcon-tab" data-bs-toggle="pill" data-bs-target="#tabs-profile-withIcon" role="tab" aria-controls="tabs-profile-withIcon" aria-selected="false">
                                    <iconify-icon class="mr-1" icon="heroicons-outline:banknotes"></iconify-icon>
                                    Sales Order</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#suratjalan" class="nav-link w-full flex items-center font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300" id="suratjalan-tab" data-bs-toggle="pill" data-bs-target="#suratjalan" role="tab" aria-controls="suratjalan" aria-selected="false">
                                    <iconify-icon class="mr-1" icon="heroicons-outline:truck"></iconify-icon>
                                    Surat Jalan</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#invoice" class="nav-link w-full flex items-center font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300" id="invoice-tab" data-bs-toggle="pill" data-bs-target="#invoice" role="tab" aria-controls="invoice" aria-selected="false">
                                    <iconify-icon class="mr-1" icon="heroicons:document-currency-dollar"></iconify-icon>
                                    Invoice</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#return" class="nav-link w-full flex items-center font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300" id="return-tab" data-bs-toggle="pill" data-bs-target="#return" role="tab" aria-controls="return" aria-selected="false">
                                    <iconify-icon class="mr-1" icon="heroicons:backward"></iconify-icon>
                                    Return</a>
                            </li>
                        </ul>

                    </div>
                    <div class="flex flex-col items-start">
                        <div class="flex gap-3">
                            <span class="badge bg-warning-500 bg-opacity-20 text-warning-500">INV: Invoice</span>
                            <span class="badge bg-info-500 bg-opacity-20 text-info-500">SO: Sales Order</span>
                            <span class="badge bg-success-500 bg-opacity-20 text-success-500">SJ: Delivery Note</span>
                            <span class="badge bg-danger-500 bg-opacity-20 text-danger-500">RET: Return</span>
                        </div>
                    </div>


                </div>
            </header>
            <div class="tab-content" id="tabs-tabContent">
                <div class="tab-pane fade show active" id="tabs-home-withIcon" role="tabpanel" aria-labelledby="tabs-home-withIcon-tab">

                    <div class="card-body px-6 pb-6">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                <thead class="bg-slate-200 dark:bg-slate-700">
                                    <tr>
                                        <th class="table-th" style="min-width: 120px;">No</th>
                                        <th class="table-th" style="min-width: 150px;">Product ID</th>
                                        <th class="table-th" style="min-width: 200px;">Product Name</th>
                                        <th class="table-th" style="min-width: 100px;">SO Qty</th>
                                        <th class="table-th" style="min-width: 150px;">SO Price</th>
                                        <th class="table-th" style="min-width: 150px;">SO Total</th>
                                        <th class="table-th" style="min-width: 100px;">SJ Qty</th>
                                        <th class="table-th" style="min-width: 150px;">SJ Price</th>
                                        <th class="table-th" style="min-width: 150px;">SJ Total</th>
                                        <th class="table-th" style="min-width: 100px;">INV Qty</th>
                                        <th class="table-th" style="min-width: 150px;">INV Price</th>
                                        <th class="table-th" style="min-width: 150px;">INV Total</th>
                                        <th class="table-th" style="min-width: 100px;">RET Qty</th>
                                        <th class="table-th" style="min-width: 150px;">RET Price</th>
                                        <th class="table-th" style="min-width: 150px;">RET Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allProducts as $productId => $data)
                                    <tr>
                                        <td class="table-td">{{ $loop->iteration }}</td>
                                        <td class="table-td">{{ $productId }}</td>
                                        <td class="table-td">
                                            {{ $data['product_name'] ?? "-" }}
                                            @if (!empty($data['variant_name']))
                                            <br><small>Variant: {{ $data['variant_name'] }}</small>
                                            @endif
                                            @if (!empty($data['batch_name']))
                                            <br><small>Batch: {{ $data['batch_name'] }}</small>
                                            @endif
                                        </td>

                                        <td class="table-td">{{ number_format($data['so_qty']) ?? 0 }}</td>
                                        <td class="table-td">{{ number_format($data['so_price']) ?? 0 }}</td>
                                        <td class="table-td">{{ number_format($data['so_total']) ?? 0 }}</td>
                                        <td class="table-td">{{ number_format($data['sj_qty']) ?? 0 }}</td>
                                        <td class="table-td">{{ number_format($data['sj_price']) ?? 0 }}</td>
                                        <td class="table-td">{{ number_format($data['sj_total']) ?? 0 }}</td>
                                        <td class="table-td">{{ number_format($data['inv_qty']) ?? 0 }}</td>
                                        <td class="table-td">{{ number_format($data['inv_price']) ?? 0 }}</td>
                                        <td class="table-td">{{ number_format($data['inv_total']) ?? 0 }}</td>
                                        <td class="table-td">{{ number_format($data['return_qty']) ?? 0 }}</td>
                                        <td class="table-td">{{ number_format($data['return_price']) ?? 0 }}</td>
                                        <td class="table-td">{{ number_format($data['return_total']) ?? 0 }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="tabs-profile-withIcon" role="tabpanel" aria-labelledby="tabs-profile-withIcon-tab">
                    <div class="card-body px-6 pb-6">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                <thead class="bg-slate-200 dark:bg-slate-700">
                                    <tr>
                                        <th class="table-th" style="min-width: 120px;">No</th>
                                        <th class="table-th" style="min-width: 150px;">Product ID</th>
                                        <th class="table-th" style="min-width: 200px;">Product Name</th>
                                        <th class="table-th" style="min-width: 100px;">SO Qty</th>
                                        <th class="table-th" style="min-width: 150px;">SO Price</th>
                                        <th class="table-th" style="min-width: 150px;">SO Total</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allProducts as $productId => $data)
                                    <tr>
                                        <td class="table-td">{{ $loop->iteration }}</td>
                                        <td class="table-td">{{ $productId }}</td>
                                        <td class="table-td">
                                            {{ $data['product_name'] ?? "-" }}
                                            @if (!empty($data['variant_name']))
                                            <br><small>Variant: {{ $data['variant_name'] }}</small>
                                            @endif
                                            @if (!empty($data['batch_name']))
                                            <br><small>Batch: {{ $data['batch_name'] }}</small>
                                            @endif
                                        </td>

                                        <td class="table-td">{{ number_format($data['so_qty']) ?? 0 }}</td>
                                        <td class="table-td">{{ number_format($data['so_price']) ?? 0 }}</td>
                                        <td class="table-td">{{ number_format($data['so_total']) ?? 0 }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="suratjalan" role="tabpanel" aria-labelledby="suratjalan-tab">
                    <div class="card-body px-6 pb-6">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                <thead class="bg-slate-200 dark:bg-slate-700">
                                    <tr>
                                        <th class="table-th" style="min-width: 120px;">No</th>
                                        <th class="table-th" style="min-width: 150px;">Product ID</th>
                                        <th class="table-th" style="min-width: 200px;">Product Name</th>
                                        <th class="table-th" style="min-width: 100px;">SJ Qty</th>
                                        <th class="table-th" style="min-width: 150px;">SJ Price</th>
                                        <th class="table-th" style="min-width: 150px;">SJ Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allProducts as $productId => $data)
                                    <tr>
                                        <td class="table-td">{{ $loop->iteration }}</td>
                                        <td class="table-td">{{ $productId }}</td>
                                        <td class="table-td">
                                            {{ $data['product_name'] ?? "-" }}
                                            @if (!empty($data['variant_name']))
                                            <br><small>Variant: {{ $data['variant_name'] }}</small>
                                            @endif
                                            @if (!empty($data['batch_name']))
                                            <br><small>Batch: {{ $data['batch_name'] }}</small>
                                            @endif
                                        </td>

                                        <td class="table-td">{{ number_format($data['sj_qty']) ?? 0 }}</td>
                                        <td class="table-td">{{ number_format($data['sj_price']) ?? 0 }}</td>
                                        <td class="table-td">{{ number_format($data['sj_total']) ?? 0 }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                    <div class="card-body px-6 pb-6">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                <thead class="bg-slate-200 dark:bg-slate-700">
                                    <tr>
                                        <th class="table-th" style="min-width: 120px;">No</th>
                                        <th class="table-th" style="min-width: 150px;">Product ID</th>
                                        <th class="table-th" style="min-width: 200px;">Product Name</th>
                                        <th class="table-th" style="min-width: 100px;">INV Qty</th>
                                        <th class="table-th" style="min-width: 150px;">INV Price</th>
                                        <th class="table-th" style="min-width: 150px;">INV Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allProducts as $productId => $data)
                                    <tr>
                                        <td class="table-td">{{ $loop->iteration }}</td>
                                        <td class="table-td">{{ $productId }}</td>
                                        <td class="table-td">
                                            {{ $data['product_name'] ?? "-" }}
                                            @if (!empty($data['variant_name']))
                                            <br><small>Variant: {{ $data['variant_name'] }}</small>
                                            @endif
                                            @if (!empty($data['batch_name']))
                                            <br><small>Batch: {{ $data['batch_name'] }}</small>
                                            @endif
                                        </td>

                                        <td class="table-td">{{ number_format($data['inv_qty']) ?? 0 }}</td>
                                        <td class="table-td">{{ number_format($data['inv_price']) ?? 0 }}</td>
                                        <td class="table-td">{{ number_format($data['inv_total']) ?? 0 }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="return" role="tabpanel" aria-labelledby="return-tab">
                    <div class="card-body px-6 pb-6">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                <thead class="bg-slate-200 dark:bg-slate-700">
                                    <tr>
                                        <th class="table-th" style="min-width: 120px;">No</th>
                                        <th class="table-th" style="min-width: 150px;">Product ID</th>
                                        <th class="table-th" style="min-width: 200px;">Product Name</th>
                                        <th class="table-th" style="min-width: 100px;">RET Qty</th>
                                        <th class="table-th" style="min-width: 150px;">RET Price</th>
                                        <th class="table-th" style="min-width: 150px;">RET Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allProducts as $productId => $data)
                                    <tr>
                                        <td class="table-td">{{ $loop->iteration }}</td>
                                        <td class="table-td">{{ $productId }}</td>
                                        <td class="table-td">
                                            {{ $data['product_name'] ?? "-" }}
                                            @if (!empty($data['variant_name']))
                                            <br><small>Variant: {{ $data['variant_name'] }}</small>
                                            @endif
                                            @if (!empty($data['batch_name']))
                                            <br><small>Batch: {{ $data['batch_name'] }}</small>
                                            @endif
                                        </td>

                                        <td class="table-td">{{ number_format($data['return_qty']) ?? 0 }}</td>
                                        <td class="table-td">{{ number_format($data['return_price']) ?? 0 }}</td>
                                        <td class="table-td">{{ number_format($data['return_total']) ?? 0 }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>