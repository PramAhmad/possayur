<x-app-layout>

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="mb-5">
            <ul class="m-0 p-0 list-none">
                <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                    <a href="index.html">
                        <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                        <iconify-icon icon="heroicons-outline:chevron-right"
                            class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                    </a>
                </li>
                <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                    Sales Order

                    <iconify-icon icon="heroicons-outline:chevron-right"
                        class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                </li>
                <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                    Detail Sales ORder
                </li>
            </ul>
        </div>
        <!-- END: BreadCrumb -->
        <div class="lg:flex justify-between flex-wrap items-center mb-6">
            <h4>Sales Order</h4>
            <div class="flex lg:justify-end items-center flex-wrap space-xy-5">
                <a href="{{ route('salesorder.pdf', ['id' => $salesOrder->id]) }}"
                    class="invocie-btn inline-flex btn btn-sm whitespace-nowrap space-x-1 cursor-pointer bg-white dark:bg-slate-800
                    dark:text-slate-300 btn-md h-min text-sm font-normal text-slate-900 rtl:space-x-reverse"
                    data-id="{{ $salesOrder->id }}">

                    <span class="text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            aria-hidden="true" role="img" class="iconify iconify--heroicons" width="1em"
                            height="1em" viewbox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5" d="m16.862 4.487l1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0
                                0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25
                                2.25 0 0 1 5.25 6H10"></path>
                        </svg>
                    </span>
                    <span>Edit</span>
                </a>
                <button type="button"
                    class="invocie-btn invoice-btn-print inline-flex btn btn-sm whitespace-nowrap space-x-1 cursor-not-allowed bg-white dark:bg-slate-800
                    dark:text-slate-300 btn-md h-min text-sm font-normal text-slate-900 rtl:space-x-reverse"
                    data-url="{{ route('salesorder.print', $salesOrder->id) }}" disabled>
                    <span class="text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            aria-hidden="true" role="img" class="iconify iconify--heroicons" width="1em"
                            height="1em" viewbox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34
                                18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662
                                0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055
                                0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1
                                1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125
                                1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z"></path>
                        </svg>
                    </span>
                    <span class="print-text-button">Print</span>
                </button>
                <a href="{{ route('salesorder.pdf', ['id' => $salesOrder->id]) }}"
                    class="invocie-btn inline-flex btn btn-sm whitespace-nowrap space-x-1 cursor-pointer bg-white dark:bg-slate-800
                    dark:text-slate-300 btn-md h-min text-sm font-normal text-slate-900 rtl:space-x-reverse" target="_blank">
                    <span class="text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            aria-hidden="true" role="img" class="iconify iconify--heroicons" width="1em"
                            height="1em" viewbox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3">
                            </path>
                        </svg>
                    </span>
                    <span>Download</span>
                </a>
                {{-- <button
                    class="invocie-btn inline-flex btn btn-sm whitespace-nowrap space-x-1 cursor-pointer bg-white dark:bg-slate-800
                    dark:text-slate-300 btn-md h-min text-sm font-normal text-slate-900 rtl:space-x-reverse">
                    <span class="text-lg transform -rotate-45">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            aria-hidden="true" role="img" class="iconify iconify--heroicons" width="1em"
                            height="1em" viewbox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M6 12L3.269 3.126A59.768 59.768 0 0 1 21.485 12A59.77 59.77 0 0 1 3.27 20.876L5.999 12Zm0 0h7.5">
                            </path>
                        </svg>
                    </span>
                    <span>Send invoice</span>
                </button> --}}
            </div>
        </div>
        <!-- salesOrder Header Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
            <!-- Header Section -->

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6 bg-slate-50 dark:bg-slate-800">
                <!-- Company Section -->
                <div class="space-y-3">
                    <h2 class="text-xl font-medium text-slate-900 dark:text-slate-300">From:</h2>
                    <div class="text-sm text-slate-500 dark:text-slate-300 space-y-2">
                        <p class="font-medium">{{ $salesOrder->outlet->name }}</p>
                        <p class="whitespace-pre-line">{{ $salesOrder->outlet->address }}</p>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>{{ $salesOrder->outlet->phone }}</span>
                        </div>
                    </div>
                </div>

                <!-- Customer Section -->
                <div class="space-y-3">
                    <h2 class="text-xl font-medium text-slate-900 dark:text-slate-300">Bill to:</h2>
                    <div class="text-sm text-slate-500 dark:text-slate-300 space-y-2">
                        <p class="font-medium">{{ $salesOrder->customer->name }}</p>
                        <p class="whitespace-pre-line">{{ $salesOrder->customer->address }}</p>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>{{ $salesOrder->customer->phone }}</span>
                        </div>
                    </div>
                </div>

                <!-- salesOrder Details -->
                <div class="space-y-3">
                    <h2 class="text-xl font-medium text-slate-900 dark:text-slate-300">Return Sales SalesOrder Details:
                    </h2>
                    <div class="text-sm space-y-2">
                        <div>
                            <h4 class="text-xs uppercase font-medium text-slate-600 dark:text-slate-300">salesOrder
                                Number:</h4>
                            <p class="text-slate-500 dark:text-slate-300">{{ $salesOrder->reference_no }}</p>
                        </div>
                        <div>
                            <h4 class="text-xs uppercase font-medium text-slate-600 dark:text-slate-300">salesOrder
                                Date:</h4>
                            <p class="text-slate-500 dark:text-slate-300">
                                {{ Carbon\Carbon::parse($salesOrder->created_at)->translatedFormat('d F Y') }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- salesOrder Products Table -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow mt-6">
            <div class="p-6">
                <h3 class="text-lg font-medium mb-4 text-slate-900 dark:text-slate-300">Return Sales Order Products
                </h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700">
                        <thead>
                            <tr>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider">
                                    Product</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider">
                                    Details</th>
                                <th
                                    class="px-4 py-3 text-right text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider">
                                    Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                        <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                            @foreach ($salesOrder->products as $product)
                                <tr>
                                    <!-- Kolom Produk -->
                                    <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-300">
                                        {{ $product->product->name }}
                                        @if ($product->variant)
                                            <div class="text-xs text-slate-400">Variant: {{ $product->variant->name }}
                                            </div>
                                        @endif
                                        @if ($product->batch)
                                            <div class="text-xs text-slate-400">Batch: {{ $product->batch->batch_no }}
                                            </div>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-300">
                                        <div class="flex justify-between">
                                            <span>Qty: {{ $product->qty }}</span>
                                            <span>Price: {{ currency($product->unit_price) }}</span>
                                        </div>
                                    </td>

                                    <td class="px-4 py-3 text-right text-sm text-slate-500 dark:text-slate-300">
                                        {{ currency($product->total_price) }}
                                    </td>
                                </tr>
                            @endforeach

                            <tr class="font-bold">
                                <td colspan="2" class="px-4 py-3 text-right text-slate-900 dark:text-slate-300">
                                    Grand Total</td>
                                <td class="px-4 py-3 text-right text-slate-900 dark:text-slate-300">
                                    {{ currency($salesOrder->grandtotal) }}
                                </td>
                            </tr>
                        </tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="print-preview hidden">
        <iframe src="" frameborder="0" class="print-preview-frame"></iframe>
    </div>
    <!-- script -->
    <!-- invocie-btn export pdf jquery post ajax-->

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @vite(['resources/js/qz.io/qz-tray.js', 'resources/js/qz.io/promise-polyfill-8.1.3.min.js'])
        <script>
            $(function() {
                let printer = '';

                qz.security.setCertificatePromise(function(resolve, reject) {
                    fetch("{{ asset('override.crt') }}", {cache: 'no-store', headers: {'Content-Type': 'text/plain'}})
                        .then(function(data) { data.ok ? resolve(data.text()) : reject(data.text()); });
                });

                qz.security.setSignatureAlgorithm("SHA512");

                qz.security.setSignaturePromise(function(toSign) {
                    return function(resolve, reject) {
                        fetch("{{ route('cert-sign.index') }}" + '?request=' + toSign, {cache: 'no-store', headers: {'Content-Type': 'text/plain'}})
                            .then(function(data) { data.ok ? resolve(data.text()) : reject(data.text()); });
                    };
                });

                qz.websocket.connect().then(function() {
                    findDefaultPrinter();
                    // $('.qz-loader').addClass('d-none');
                    $('.invoice-btn-print').removeClass('cursor-not-allowed').prop('disabled', false);
                }).catch(handleConnectionError);

                $('.invoice-btn-print').on('click', function() {
                    var url = $(this).data('url');

                    $.ajax({
                        url: `${url}?action=direct_print`,
                        type: 'GET',
                        beforeSend: function() {
                            $('.invoice-btn-print').addClass('cursor-not-allowed')
                            $('.print-text-button').text('Printing...')
                        },
                        success: function(result) {
                            let config = qz.configs.create(printer);
                            let printData = [{
                                type: 'pixel',
                                format: 'pdf',
                                flavor: 'file',
                                data: result
                            }]

                            qz.print(config, printData).catch(function(e) {
                                console.error(e);
                                Swal.fire({
                                    title: "Failed to print",
                                    text: e,
                                    icon: "error"
                                });
                            });

                            $('.invoice-btn-print').removeClass('cursor-not-allowed')
                            $('.print-text-button').text('Print')
                        },
                        complete: function() {
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                            
                            $('.invoice-btn-print').removeClass('cursor-not-allowed')
                            $('.print-text-button').text('Print')
                        }
                    });

                })

                function findDefaultPrinter() {
                    qz.printers.getDefault().then(function(data) {
                        printer = data
                    }).catch(displayError);
                }

                function displayError(err) {
                    console.error(err);
                    displayMessage(err, 'alert-danger');
                }

                function displayMessage(msg, css, time) {
                    Swal.fire({
                        title: "Error",
                        text: msg,
                        icon: "error"
                    });
                }

                function handleConnectionError(err) {
                    if (err.target != undefined) {
                        if (err.target.readyState >= 2) { //if CLOSING or CLOSED
                            displayError("Connection to QZ Tray was closed");
                        } else {
                            displayError("A connection error occurred, check log for details");
                            console.error(err);
                        }
                    } else {
                        displayError(err);
                    }

                    // $('.qz-loader').addClass('d-none');
                }
            })
        </script>
    @endpush
</x-app-layout>
