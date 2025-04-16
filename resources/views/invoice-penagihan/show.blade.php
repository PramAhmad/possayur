<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="mb-5">
            <ul class="m-0 p-0 list-none">
                <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                    <a href="index.html">
                        <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                        <iconify-icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                    </a>
                </li>
                <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                    <a href="{{route('invoice.index')}}">Invoice Penagihan</a>

                    <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                </li>
                <li class="inline-block relative text-sm  text-slate-500 font-Inter dark:text-white">
                    Detail Invoice Penagihan
                </li>
            </ul>
        </div>
        <!-- END: BreadCrumb -->
        <div class="lg:flex justify-between flex-wrap items-center mb-6">
            <h4>Invoice Penagihan
            </h4>
            <div class="flex lg:justify-end items-center flex-wrap space-xy-5">
                {{-- <a href="{{ route('invoice.edit', $invoice->id) }}" class="invocie-btn inline-flex btn btn-sm whitespace-nowrap space-x-1 cursor-pointer bg-white dark:bg-slate-800
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
                                d="m16.862 4.487l1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0
                                0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25
                                2.25 0 0 1 5.25 6H10"></path>
                        </svg>
                    </span>
                    <span>Edit</span>
                </a> --}}
                <button type="button" class="invocie-btn btn-print inline-flex btn btn-sm whitespace-nowrap space-x-1 cursor-not-allowed bg-white dark:bg-slate-800
                    dark:text-slate-300 btn-md h-min text-sm font-normal text-slate-900 rtl:space-x-reverse" data-url="{{ route('invoice.print', $invoice->id) }}">
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
                    <span class="print-text-button">Print</span>
                </button>
                <a href="{{route('invoice.pdf', ['id'=>$invoice->id])}}" class="invocie-btn inline-flex btn btn-sm whitespace-nowrap space-x-1 cursor-pointer bg-white dark:bg-slate-800
                    dark:text-slate-300 btn-md h-min text-sm font-normal text-slate-900 rtl:space-x-reverse" target="_blank">
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
                </a>
                {{-- <button class="invocie-btn inline-flex btn btn-sm whitespace-nowrap space-x-1 cursor-pointer bg-white dark:bg-slate-800
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
                </button> --}}
            </div>
        </div>
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
                        <p class="font-medium">{{ $invoice->salesorder->customer?->name }}</p>
                        <p class="whitespace-pre-line">{{ $invoice->salesorder->customer?->address }}</p>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>{{ $invoice->salesorder->customer?->phone }}</span>
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
                                <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider">QTy</th>
                                <th class="px-4 py-3 text-right text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider">Price Product</th>
                                <th class="px-4 py-3 text-right text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider">Total Tagihan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                            @foreach($invoice->productInvoices as $product)
                            @if ( $product->qty > 0)
                                
                           
                            <tr>
                                <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-300">
                                    {{ $product->product->name }}
                                    @if ($product->variant)

                                    <p class="text-xs text-slate-400 dark:text-slate-500">Variant:
                                        {{ $product->variant->name ?? 'Default' }}
                                    </p>
                                    @endif
                                    @if ($product->batch)
                                    <p class="text-xs text-slate-400 dark:text-slate-500">Batch:
                                        {{ $product->batch->batch_no }}
                                    </p>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-300">
                                    {{ $product->qty }}
                                   
                                </td>
                                <td class="px-4 py-3 text-right text-sm text-slate-500 dark:text-slate-300">
                                    {{ currency($product->price) }}
                                </td>
                                <td class="px-4 py-3 text-right text-sm text-slate-500 dark:text-slate-300">
                                    {{ currency($product->total) }}
                                </td>
                            </tr>
                            @endif
                            @endforeach

                            <!-- Total Row -->
                            @if ($invoice->total_discount > 0)
                                <tr class="font-bold">
                                    <td colspan="3" class="px-4 py-3 text-right text-slate-900 dark:text-slate-300">Discount</td>
                                    <td class="px-4 py-3 text-right text-slate-900 dark:text-slate-300">
                                        {{ currency($invoice->total_discount) }}
                                    </td>
                                </tr>
                            @endif
                            @if ($invoice->paid_amount > 0)
                                <tr class="font-bold">
                                    <td colspan="3" class="px-4 py-3 text-right text-slate-900 dark:text-slate-300">Paid Amount</td>
                                    <td class="px-4 py-3 text-right text-slate-900 dark:text-slate-300">
                                        {{ currency($invoice->paid_amount) }}
                                    </td>
                                </tr>
                            @endif
                            <tr class="font-bold">
                                <td colspan="3" class="px-4 py-3 text-right text-slate-900 dark:text-slate-300">Grand Total</td>
                                <td class="px-4 py-3 text-right text-slate-900 dark:text-slate-300">
                                    {{ currency($invoice->grandtotal) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('vendor.qz.script')
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    $('.btn-print').removeClass('cursor-not-allowed').prop('disabled', false);
                }).catch(handleConnectionError);

                $('.btn-print').on('click', function() {
                    var url = $(this).data('url');

                    $.ajax({
                        url: `${url}?action=direct_print`,
                        type: 'GET',
                        beforeSend: function() {
                            $('.btn-print').addClass('cursor-not-allowed')
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

                            $('.btn-print').removeClass('cursor-not-allowed')
                            $('.print-text-button').text('Print')
                        },
                        complete: function() {
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                            
                            $('.btn-print').removeClass('cursor-not-allowed')
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