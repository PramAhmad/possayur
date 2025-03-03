<x-app-layout>
    <div>
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>

        @if (session('message'))
        <x-alert :message="session('message')" :type="'success'" />
        @endif

        <div class="card">
            <header class="card-header noborder">
                <div class="justify-end flex gap-3 items-center flex-wrap">
                    @can('invoice create')
                        <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2 !px-3" href="{{ route('invoice.create') }}">
                            <iconify-icon icon="ic:round-plus" class="text-lg mr-1"></iconify-icon>
                            {{ __('New Invoice') }}
                        </a>
                    @endcan
                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5" href="{{ route('invoice.index') }}">
                        <iconify-icon icon="mdi:refresh" class="text-xl"></iconify-icon>
                    </a>
                    @can('invoice export')    
                        <a href="{{ route('invoice.export') }}" class="btn btn-success inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5">
                            Excel <iconify-icon icon="heroicons-outline:folder-arrow-down" class="ml-3 text-xl"></iconify-icon>
                        </a>
                    @endcan
                </div>
                <form action="" class="form-filter">
                    <div class="justify-center flex flex-wrap sm:flex items-center lg:justify-end gap-5">
                        <div class="relative w-full sm:w-auto flex items-center">
                            <select name="customer" class="inputField p-2 border border-slate-200 dark:border-slate-700 rounded-md dark:bg-slate-900 customer" onchange="this.form.submit()">
                                <option value="">All Customer</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ request()->customer == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="relative w-full sm:w-auto flex items-center">
                            <input id="start_date" class="form-control daterangepicker bg-white" placeholder="Select Date">
                            <input type="hidden" name="start_date" class="form-control start-date hidden">
                            <input type="hidden" name="end_date" class="form-control end-date hidden">
                        </div>
                        <div class="relative w-full sm:w-auto flex items-center">
                            <a class="btn inline-flex justify-center btn-danger rounded-[25px] items-center !p-2" href="{{ route('invoice.index') }}">
                                <iconify-icon icon="mdi:refresh" class="text-xl"></iconify-icon> Reset Filter
                            </a>
                        </div>
                    </div>
                </form>
            </header>

            <div class="card-body px-6 pb-6">
                <div class="overflow-x-auto -mx-6">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                <thead class="bg-slate-200 dark:bg-slate-700">
                                    <tr>
                                        <th scope="col" class="table-th">{{ __('Invoice No') }}</th>
                                        <th scope="col" class="table-th">{{ __('Sales Order') }}</th>
                                        <th scope="col" class="table-th">{{ __('Reference Number') }}</th>
                                        <th scope="col" class="table-th">{{ __('Customer') }}</th>
                                        <th scope="col" class="table-th">{{ __('Outlet') }}</th>
                                        <th scope="col" class="table-th">{{ __('Total Qty') }}</th>
                                        <th scope="col" class="table-th">{{ __('Grand Total') }}</th>
                                        <th scope="col" class="table-th w-20">{{ __('Action') }}</th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    @forelse ($invoices as $invoice)
                                        <tr>
                                            <td class="table-td"># {{ $invoice->id }}</td>
                                            <td class="table-td">{{ $invoice->salesorder?->reference_no }}</td>
                                            <td class="table-td">{{ $invoice->reference_number }}</td>
                                            <td class="table-td">{{ $invoice->salesorder?->customer?->name ?? '-' }}</td>
                                            <td class="table-td">{{ $invoice->outlet->name ?? '-' }}</td>
                                            <td class="table-td">{{ $invoice->total_qty }}</td>
                                            <td class="table-td">
                                                @php
                                                    $discountedTotal = $invoice->grandtotal - ($invoice->discount ?? 0);
                                                @endphp
                                                {{ currency($discountedTotal) }}
                                            </td>
                                            <td class="table-td">
                                                <div class="flex space-x-3 rtl:space-x-reverse">
                                                    @can('invoice view')
                                                        <a class="action-btn" href="{{ route('invoice.show', ['invoice' => $invoice]) }}">
                                                            <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                        </a>
                                                    @endcan
                                                    
                                                    @can('invoice export')
                                                        <a href="{{ route('invoice.pdf', $invoice->id) }}" class="action-btn" data-tippy-content="Download PDF" target="_blank">
                                                            <iconify-icon icon="heroicons:arrow-down-tray"></iconify-icon>
                                                        </a>
                                                    @endcan

                                                    @can('invoice edit')
                                                        <a class="action-btn" href="{{ route('invoice.edit', ['invoice' => $invoice->id]) }}">
                                                            <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                        </a>
                                                    @endcan

                                                    @can('invoice delete')
                                                        {{-- <form id="deleteForm{{ $invoice->id }}" method="POST" action="{{ route('invoice.destroy', $invoice) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a class="action-btn cursor-pointer" onclick="sweetAlertDelete(event, 'deleteForm{{ $invoice->id }}')" type="submit">
                                                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                            </a>
                                                        </form> --}}
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="border border-slate-100 dark:border-slate-900 relative">
                                            <td class="table-cell text-center" colspan="8">
                                                <img src="{{ asset('images/result-not-found.svg') }}" alt="No invoice found" class="w-64 m-auto" />
                                                <h2 class="text-xl text-slate-700 mb-8 -mt-4">{{ __('No invoice found.') }}</h2>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <x-table-footer :per-page-route-name="'invoice.index'" :data="$invoices" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js" integrity="sha512-4MvcHwcbqXKUHB6Lx3Zb5CEAVoE9u84qN+ZSMM6s7z8IeJriExrV3ND5zRze9mxNlABJ6k864P/Vl8m0Sd3DtQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://unpkg.com/flatpickr@4.6.13/dist/plugins/monthSelect/index.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment-with-locales.min.js" integrity="sha512-4F1cxYdMiAW98oomSLaygEwmCnIP38pb4Kx70yQYqRwLVCs3DbRumfBq82T08g/4LJ/smbFGFpmeFlQgoDccgg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $('.customer').select2({
                dropdownCssClass: "select2-font"
            })

            const dateRangepicker = document.querySelector(".daterangepicker")
            flatpickr(dateRangepicker, {
                mode: "range",
                dateFormat: "Y-m-d",
                defaultDate: ["{{ request()->start_date ?? null }}", "{{ request()->end_date ?? null }}"],
                onChange: function(selectedDates, dateStr, instance) {
                    if (selectedDates.length > 1) {
                        $('.start-date').val(moment(selectedDates[0]).format('Y-MM-DD'))
                        $('.end-date').val(moment(selectedDates[1]).format('Y-MM-DD'))

                        $('.form-filter').submit()
                    }
                }
            })
        </script>
    @endpush
    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/plugins/monthSelect/style.min.css" integrity="sha512-V7B1IY1DE/QzU/pIChM690dnl44vAMXBidRNgpw0mD+hhgcgbxHAycRpOCoLQVayXGyrbC+HdAONVsF+4DgrZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .select2-container--default .select2-selection--single {
                border-color: rgb(226, 232, 240, 1) !important;
                border-width: 1px !important;
            }

            .select2-font,
            .select2-selection__rendered {
                font-size: .875rem;
            }

            .select2-container .select2-selection--single {
                height: 2.3rem;
            }
            .form-control[readonly] {
                background-color: #fff
            }
        </style>
    @endpush
</x-app-layout>