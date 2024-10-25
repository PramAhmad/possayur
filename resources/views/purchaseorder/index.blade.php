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
                    @can('purchase create')
                        <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2 !px-3" href="{{ route('purchaseorder.create') }}">
                            <iconify-icon icon="ic:round-plus" class="text-lg mr-1"></iconify-icon>
                            {{ __('New Purchase Order') }}
                        </a>
                    @endcan

                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5" href="{{ route('purchaseorder.index') }}">
                        <iconify-icon icon="mdi:refresh" class="text-xl"></iconify-icon>
                    </a>
                </div>

                <div class="justify-center flex flex-wrap sm:flex items-center lg:justify-end gap-3">
                    <div class="relative w-full sm:w-auto flex items-center">
                        <form id="searchForm" method="get" action="{{ route('purchaseorder.index') }}">
                            <input name="q" type="text" class="inputField pl-8 p-2 border border-slate-200 dark:border-slate-700 rounded-md dark:bg-slate-900" placeholder="Search purchase order" value="{{ request()->q }}">
                        </form>
                        <iconify-icon class="absolute text-textColor left-2 dark:text-white" icon="quill:search-alt"></iconify-icon>
                    </div>
                </div>
            </header>

            <div class="card-body px-6 pb-6">
                <div class="overflow-x-auto -mx-6">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden ">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                <thead class="bg-slate-200 dark:bg-slate-700">
                                    <tr>
                                        <th scope="col" class="table-th">{{ __('Sl No') }}</th>
                                        <th scope="col" class="table-th">{{ __('PO Number') }}</th>
                                        <th scope="col" class="table-th">{{ __('Supplier') }}</th>
                                        <th scope="col" class="table-th">{{ __('Order Date') }}</th>
                                        <th scope="col" class="table-th">{{ __('Total Amount') }}</th>
                                        <th scope="col" class="table-th">{{ __('Products') }}</th>
                                        <th scope="col" class="table-th">{{ __('Status') }}</th>
                                        <th scope="col" class="table-th w-20">{{ __('Action') }}</th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    @forelse ($purchaseOrders as $purchaseOrder)
                                        <tr>
                                            <td class="table-td"># {{ $purchaseOrder->id }}</td>
                                            <td class="table-td">{{ $purchaseOrder->po_number }}</td>
                                            <td class="table-td">{{ $purchaseOrder->supplier_name }}</td>
                                            <td class="table-td">{{ $purchaseOrder->order_date }}</td>
                                            <td class="table-td">{{ number_format($purchaseOrder->total_amount, 2) }}</td>
                                            <td class="table-td">{{ $purchaseOrder->products->count() }}</td>
                                            <td class="table-td">{{ ucfirst($purchaseOrder->status) }}</td>
                                            <td class="table-td">
                                                <div class="flex space-x-3 rtl:space-x-reverse">
                                                    @can('purchase update')
                                                        <a class="action-btn" href="{{ route('purchaseorder.edit', ['purchaseOrder' => $purchaseOrder]) }}">
                                                            <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                        </a>
                                                    @endcan

                                                    @can('purchase delete')
                                                        <form id="deleteForm{{ $purchaseOrder->id }}" method="POST" action="{{ route('purchaseorder.destroy', $purchaseOrder) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a class="action-btn cursor-pointer" onclick="sweetAlertDelete(event, 'deleteForm{{ $purchaseOrder->id }}')" type="submit">
                                                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                            </a>
                                                        </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="border border-slate-100 dark:border-slate-900 relative">
                                            <td class="table-cell text-center" colspan="7">
                                                <img src="{{ asset('images/result-not-found.svg') }}" alt="No purchase orders found" class="w-64 m-auto" />
                                                <h2 class="text-xl text-slate-700 mb-8 -mt-4">{{ __('No purchase orders found.') }}</h2>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{-- Table footer for pagination --}}
                            <x-table-footer :per-page-route-name="'purchaseorder.index'" :data="$purchaseOrders" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function sweetAlertDelete(event, formId) {
                event.preventDefault();
                let form = document.getElementById(formId);
                Swal.fire({
                    title: '@lang('Are you sure?')',
                    icon: 'question',
                    showDenyButton: true,
                    confirmButtonText: '@lang('Delete')',
                    denyButtonText: '@lang('Cancel')',
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                })
            }
        </script>
    @endpush
</x-app-layout>
