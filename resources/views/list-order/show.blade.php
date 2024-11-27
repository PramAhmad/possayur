<x-app-layout>
    <div>
           <div class="mb-3">
            <ul class="m-0 p-0 list-none">
                <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                    <a href="index.html">
                        <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                        <iconify-icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                    </a>
                </li>
                <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                    <a href="{{route('listorder.index')}}">List Order</a>

                    <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                </li>
                <li class="inline-block relative text-sm  text-slate-500 font-Inter dark:text-white">
                    Detail List Order
                </li>
            </ul>
        </div>

        <div class="lg:flex justify-between flex-wrap items-center mb-3">
            <h4>List Order
            </h4>
            <div class="flex lg:justify-end items-center flex-wrap space-xy-5">
              
                <button onclick="window.print()" type="button" class="invocie-btn inline-flex btn btn-sm whitespace-nowrap space-x-1 cursor-pointer bg-white dark:bg-slate-800
                    dark:text-slate-300 btn-md h-min text-sm font-normal text-slate-900 rtl:space-x-reverse">
                    <span class="text-lg">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            aria-hidden="true"
                            role="img"
                            class="iconify iconify--heroicons"
                            width="1em"
                            height="1em"
                            viewbox="0 0 24 24">
                            <path
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34
                                18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662
                                0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055
                                0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1
                                1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125
                                1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z"></path>
                        </svg>
                    </span>
                    <span>Print</span>
                </button>
                <button class="invocie-btn inline-flex btn btn-sm whitespace-nowrap space-x-1 cursor-pointer bg-white dark:bg-slate-800
                    dark:text-slate-300 btn-md h-min text-sm font-normal text-slate-900 rtl:space-x-reverse"
                    data-bs-toggle="modal" data-bs-target="#export" >
                    <span class="text-lg">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            aria-hidden="true"
                            role="img"
                            class="iconify iconify--heroicons"
                            width="1em"
                            height="1em"
                            viewbox="0 0 24 24">
                            <path
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"></path>
                        </svg>
                    </span>
                    <span>Download</span>
                </button>
                <button class="invocie-btn inline-flex btn btn-sm whitespace-nowrap space-x-1 cursor-pointer bg-white dark:bg-slate-800
                    dark:text-slate-300 btn-md h-min text-sm font-normal text-slate-900 rtl:space-x-reverse">
                    <span class="text-lg transform -rotate-45">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            aria-hidden="true"
                            role="img"
                            class="iconify iconify--heroicons"
                            width="1em"
                            height="1em"
                            viewbox="0 0 24 24">
                            <path
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M6 12L3.269 3.126A59.768 59.768 0 0 1 21.485 12A59.77 59.77 0 0 1 3.27 20.876L5.999 12Zm0 0h7.5"></path>
                        </svg>
                    </span>
                    <span>Send invoice</span>
                </button>
            </div>
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
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="export" tabindex="-1" aria-labelledby="export" aria-hidden="true">
    <div class="modal-dialog top-1/2 !-translate-y-1/2 relative w-auto pointer-events-none">
        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                    <h3 class="text-xl font-medium text-white dark:text-white capitalize">
                        Pilih menu yang akan Download
                    </h3>
                    <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <section class="py-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 px-4">
    <!-- Card Sales Order -->
    <div class="card border border-slate-200 shadow-lg rounded-lg">
        <div class="p-4">
            <h3 class="text-lg font-bold text-slate-700">Sales Order</h3>
            <a href="{{ route('salesorder.pdf', $salesorder->id) }}" 
               class="text-blue-500 hover:text-blue-700 font-medium">
                Download Sales Order
            </a>
        </div>
    </div>

    <!-- Card Delivery Note -->
    <div class="card border border-slate-200 shadow-lg rounded-lg">
        <div class="p-4">
            <h3 class="text-lg font-bold text-slate-700">Delivery Note</h3>
            <a href="{{ route('suratJalan.pdf', $salesorder->suratJalan->id) }}" 
               class="text-blue-500 hover:text-blue-700 font-medium">
                Download Surat Jalan
            </a>
        </div>
    </div>

    <!-- Card Invoice -->
    <div class="card border border-slate-200 shadow-lg rounded-lg">
        <div class="p-4">
            <h3 class="text-lg font-bold text-slate-700">Invoice</h3>
            <a href="{{ route('invoice.pdf', $salesorder->invoice->id) }}" 
               class="text-blue-500 hover:text-blue-700 font-medium">
                Download Invoice
            </a>
        </div>
    </div>

    <!-- Card Return -->
    <div class="card border border-slate-200 shadow-lg rounded-lg">
        <div class="p-4">
            <h3 class="text-lg font-bold text-slate-700">Return</h3>
            <a href="{{ route('returnsalesorder.pdf', $salesorder->returnSalesOrder->id) }}" 
               class="text-blue-500 hover:text-blue-700 font-medium">
                Download Return
            </a>
        </div>
    </div>
</section>

                <!-- Modal footer -->
                <div class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                    <button id="export-button" class="btn inline-flex justify-center text-white bg-black-500">Export</button>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>