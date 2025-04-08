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
                 
                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5" href="{{ route('returnpurchase.index') }}">
                        <iconify-icon icon="mdi:refresh" class="text-xl"></iconify-icon>
                    </a>
                    @can('returnpurchase export')    
                     <a href="{{ route('returnpurchase.export') }}" class="btn btn-success inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5">
                         Excel <iconify-icon icon="heroicons-outline:folder-arrow-down" class="ml-3 text-xl"></iconify-icon>
                     </a>
                     @endcan
                </div>
            </header>

            <div class="card-body px-6 pb-6">
                <div class="overflow-x-auto -mx-6">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                <thead class="bg-slate-200 dark:bg-slate-700">
                                    <tr>
                                        <th scope="col" class="table-th">{{ __('Return No') }}</th>
                                        <th scope="col" class="table-th">{{ __('Sales Order') }}</th>
                                        <th scope="col" class="table-th">{{ __('Outlet') }}</th>
                                        <th scope="col" class="table-th">{{ __('Return Date') }}</th>
                                        <th scope="col" class="table-th">{{ __('Total Qty') }}</th>
                                        <th scope="col" class="table-th">{{ __('Grand Total') }}</th>
                                        
                                        <th scope="col" class="table-th w-20">{{ __('Action') }}</th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    @forelse ($returnPurchases as $r)
                                    <tr>
                                        <td class="table-td"># {{ $r->return_number }}</td>
                                        <td class="table-td">{{ $r->purchaseOrder->reference_no ?? '-' }}</td>
                                        <td class="table-td">{{ $r->purchaseOrder->outlet?->name ?? '-' }}</td>
                                        <td class="table-td">{{ 
                                            Carbon\Carbon::parse($r->return_date)->translatedFormat('d F Y')
                                        }}</td>
                                        <td class="table-td">{{ $r->total_qty }}</td>
                                        <td class="table-td">
                                            {{ currency($r->grand_total) }}
                                        </td>
                                        <td class="table-td">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                @can('returnpurchase view')
                                                <a class="action-btn" href="{{ route('returnpurchase.show', ['id' => $r]) }}">
                                                    <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                </a>
                                                @endcan
                                                @can('returnpurchase export')
                                                <a href="{{ route('returnpurchase.pdf', $r->id) }}" class="action-btn" data-tippy-content="Download PDF">
                                                    <iconify-icon icon="heroicons:arrow-down-tray"></iconify-icon>
                                                </a>
                                                @endcan

                                              

                                                @can('returnpurchase delete')
                                                <form id="deleteForm{{ $r->id }}" method="POST" action="{{ route('returnpurchase.destroy', $r) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="action-btn cursor-pointer" onclick="sweetAlertDelete(event, 'deleteForm{{ $r->id }}')" type="submit">
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
                                            <img src="{{ asset('images/result-not-found.svg') }}" alt="No return sales order found" class="w-64 m-auto" />
                                            <h2 class="text-xl text-slate-700 mb-8 -mt-4">{{ __('No return sales order found.') }}</h2>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <x-table-footer :per-page-route-name="'returnpurchase.index'" :data="$returnPurchases" />
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