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
            </header>

            <div class="card-body px-6 pb-6">
                <div class="overflow-x-auto -mx-6">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                <thead class="bg-slate-200 dark:bg-slate-700">
                                    <tr>
                                        <th scope="col" class="table-th">{{ __('Invoice No') }}</th>
                                        <th scope="col" class="table-th">{{ __('Reference Number') }}</th>
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
                                        <td class="table-td">{{ $invoice->reference_number }}</td>
                                        <td class="table-td">{{ $invoice->outlet->name ?? '-' }}</td>

                                        <td class="table-td">{{ $invoice->total_qty }}</td>
                                        <td class="table-td">
                                            @php
                                                $discountedTotal = $invoice->grandtotal - ($invoice->discount ?? 0);
                                            @endphp
                                            {{ number_format($discountedTotal, 2) }}
                                        </td>
                                        <td class="table-td">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                @can('invoice view')
                                                <a class="action-btn" href="{{ route('invoice.show', ['invoice' => $invoice]) }}">
                                                    <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                </a>
                                                @endcan

                                                @can('invoice edit')
                                                <a class="action-btn" href="{{ route('invoice.edit', ['invoice' => $invoice]) }}">
                                                    <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                </a>
                                                @endcan

                                                @can('invoice delete')
                                                <form id="deleteForm{{ $invoice->id }}" method="POST" action="{{ route('invoice.destroy', $invoice) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="action-btn cursor-pointer" onclick="sweetAlertDelete(event, 'deleteForm{{ $invoice->id }}')" type="submit">
                                                        <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                    </a>
                                                </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="border border-slate-100 dark:border-slate-900 relative">
                                        <td class="table-cell text-center" colspan="6">
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