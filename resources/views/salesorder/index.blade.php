<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{asset('css/rt-plugins.css')}}">
    @endpush
    <div>
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>

        @if (session('message'))
        <x-alert :message="session('message')" :type="'success'" />
        @endif
        <div class="space-y-5">
            <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4">
                <div class="card">
                    <div class="card-body pt-4 pb-3 px-4">
                        <div class="flex space-x-3 rtl:space-x-reverse">
                            <div class="flex-none">
                                <div class="h-12 w-12 rounded-full flex flex-col items-center justify-center text-2xl bg-[#EAE6FF] dark:bg-slate-900	 text-indigo-500">
                                    <iconify-icon icon=heroicons:shopping-cart></iconify-icon>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="text-slate-600 dark:text-slate-300 text-sm mb-1 font-medium">
                                    Totel sales order
                                </div>
                                <div class="text-slate-900 dark:text-white text-lg font-medium">
                                    {{$salesOrders->count()}}
                                </div>
                            </div>
                        </div>
                        <div class="ltr:ml-auto rtl:mr-auto max-w-[124px]">
                            <div id="spae-line3"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body pt-4 pb-3 px-4">
                        <div class="flex space-x-3 rtl:space-x-reverse">
                            <div class="flex-none">
                                <div class="h-12 w-12 rounded-full flex flex-col items-center justify-center text-2xl bg-[#E5F9FF] dark:bg-slate-900	 text-info-500">
                                    <iconify-icon icon=heroicons:shopping-cart></iconify-icon>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="text-slate-600 dark:text-slate-300 text-sm mb-1 font-medium">
                                    Totel revenue
                                </div>
                                <div class="text-slate-900 dark:text-white text-lg font-medium">
                                    {{number_format($salesOrders->sum('grandtotal'), 0)}}
                                </div>
                            </div>
                        </div>
                        <div class="ltr:ml-auto rtl:mr-auto max-w-[124px]">
                            <div id="spae-line1"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body pt-4 pb-3 px-4">
                        <div class="flex space-x-3 rtl:space-x-reverse">
                            <div class="flex-none">
                                <div class="h-12 w-12 rounded-full flex flex-col items-center justify-center text-2xl bg-[#FFEDE6] dark:bg-slate-900 text-orange-500">
                                    <iconify-icon icon=heroicons:shopping-cart></iconify-icon>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="text-slate-600 dark:text-slate-300 text-sm mb-1 font-medium">
                                    Growth rate (Last Month)
                                </div>
                                <div class="text-slate-900 dark:text-white text-lg font-medium">
                                @php
                                 
                                    $now = Carbon\Carbon::now();
                                    $startOfCurrentMonth = $now->copy()->startOfMonth();
                                    $startOfPreviousMonth = $startOfCurrentMonth->copy()->subMonth();
                                    $endOfPreviousMonth = $startOfCurrentMonth->copy()->subSecond();

                                    // Revenue for the current month
                                    $currentRevenue = $salesOrders->whereBetween('created_at', [$startOfCurrentMonth, $now])
                                    ->sum('grandtotal');

                                    // Revenue for the previous month
                                    $previousRevenue = $salesOrders->whereBetween('created_at', [$startOfPreviousMonth, $endOfPreviousMonth])
                                    ->sum('grandtotal');
                                    
                                    // Growth rate
                                    $growthRate = $previousRevenue !== 0 ? (($currentRevenue - $previousRevenue) / $previousRevenue) * 100 : null;
                                @endphp

                                @if($growthRate !== null)
                                    {{ number_format($growthRate, 2) }}%
                                @else
                                0
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="ltr:ml-auto rtl:mr-auto max-w-[124px]">
                            <div id="spae-line2"></div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


        <div class="card mt-3">
            <header class="card-header noborder">
                <div class="justify-end flex gap-3 items-center flex-wrap">

                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5" href="{{ route('salesorder.index') }}">
                        <iconify-icon icon="mdi:refresh" class="text-xl"></iconify-icon>
                    </a>
                    <!-- export button -->
                    @can('salesorder export')
                    <a href="{{ route('salesorder.export') }}" class="btn btn-success inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5">
                        Excel <iconify-icon icon="heroicons-outline:folder-arrow-down" class="ml-3 text-xl"></iconify-icon>
                    </a>
                    @endcan
                </div>
                <div class="justify-center flex flex-wrap sm:flex items-center lg:justify-end gap-3">
                    <div class="relative w-full sm:w-auto flex items-center">
                        <form id="searchForm" method="get" action="{{ route('salesorder.index') }}">
                            <input name="q" type="text" class="inputField pl-8 p-2 border border-slate-200 dark:border-slate-700 rounded-md dark:bg-slate-900" placeholder="Search Orders" value="{{ request()->q }}">
                        </form>
                        <iconify-icon class="absolute text-textColor left-2 dark:text-white" icon="quill:search-alt"></iconify-icon>
                    </div>
                </div>
            </header>
            <div class="card-bod    y px-6 pb-6">
                <div class="overflow-x-auto -mx-6">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                <thead class="bg-slate-200 dark:bg-slate-700">
                                    <tr>
                                        <th scope="col" class="table-th">{{ __('Reference No') }}</th>
                                        <th scope="col" class="table-th">{{ __('Order Date') }}</th>
                                        <th scope="col" class="table-th">{{ __('Customer') }}</th>
                                        <th scope="col" class="table-th">{{ __('Total Qty') }}</th>
                                        <th scope="col" class="table-th">{{ __('Grand Total') }}</th>
                                        <th scope="col" class="table-th">{{ __('Status') }}</th>
                                        <th scope="col" class="table-th w-20">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    @forelse ($salesOrders as $order)
                                    <tr>
                                        <td class="table-td">{{ $order->reference_no }}</td>
                                        <td class="table-td">{{ $order->created_at }}</td>
                                        <td class="table-td">{{ $order->customer->name }}</td>
                                        <td class="table-td">{{ $order->total_qty }}</td>
                                        <td class="table-td">{{ number_format($order->grandtotal, 2) }}</td>
                                        <td class="table-td">
                                            <span class="badge badge-{{ $order->status === 'paid' ? 'success' : 'warning' }}">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                        <td class="table-td">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                <a href="{{ route('salesorder.show', $order->id) }}" class="action-btn" data-tippy-content="View">
                                                    <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                </a>
                                                <!-- can export dwonload pdf -->
                                                @can('salesorder export')
                                                <a href="{{ route('salesorder.pdf', $order->id) }}" class="action-btn" data-tippy-content="Download PDF">
                                                    <iconify-icon icon="heroicons:arrow-down-tray"></iconify-icon>
                                                </a>
                                                @endcan
                                              
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="border border-slate-100 dark:border-slate-900 relative">
                                        <td class="table-cell text-center" colspan="8">
                                            <img src="images/result-not-found.svg" alt="page not found" class="w-64 m-auto" />
                                            <h2 class="text-xl text-slate-700 mb-8 -mt-4">{{ __('No results found.') }}</h2>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <x-table-footer :per-page-route-name="'salesorder.index'" :data="$salesOrders" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="{{ asset('js/rt-plugins.js') }}"></script>
    <script>
        function sweetAlertDelete(event, formId) {
            event.preventDefault();
            let form = document.getElementById(formId);
            Swal.fire({
                title: '@lang('
                Are you sure ? ')',
                icon : 'question',
                showDenyButton: true,
                confirmButtonText: '@lang('
                Delete ')',
                denyButtonText: '@lang('
                Cancel ')',
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        }
    </script>
    @endpush
</x-app-layout>