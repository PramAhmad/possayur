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
                    @can('suratjalan create')
                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2 !px-3" href="{{ route('suratjalan.create') }}">
                        <iconify-icon icon="ic:round-plus" class="text-lg mr-1"></iconify-icon>
                        {{ __('New Delivery Order') }}
                    </a>
                    @endcan

                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5" href="{{ route('suratjalan.index') }}">
                        <iconify-icon icon="mdi:refresh" class="text-xl"></iconify-icon>
                    </a>
                    @can('suratjalan export')    
                     <a href="{{ route('suratjalan.export') }}" class="btn btn-success inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5">
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
                                        <th scope="col" class="table-th">{{ __('Sl No') }}</th>
                                        <!-- sales order number -->
                                         <th scope="col" class="table-th">{{ __('Sales Order') }}</th>
                                        <th scope="col" class="table-th">{{ __('Due Date') }}</th>
                                        <th scope="col" class="table-th">{{ __('Packer') }}</th>
                                        <th scope="col" class="table-th">{{ __('Driver') }}</th>
                                        <th scope="col" class="table-th">{{ __('Status') }}</th>
                                        <th scope="col" class="table-th">{{ __('Signatures') }}</th>
                                        <th scope="col" class="table-th w-20">{{ __('Action') }}</th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    @forelse ($suratJalan as $order)
                                    <tr>
                                        <td class="table-td"># {{ $order->id }}</td>
                                        <td class="table-td">{{ $order->salesorder->reference_no ?? '-' }}</td>
                                        <td class="table-td">{{ $order->due_date ? date('d M Y', strtotime($order->due_date)) : '-' }}</td>
                                        <td class="table-td">{{ $order->packer ?? '-' }}</td>
                                        <td class="table-td">{{ $order->driver ?? '-' }}</td>
                                        <td class="table-td">
                                            @php
                                            $signatureCount = 0;
                                            if ($order->signature_gudang) $signatureCount++;
                                            if ($order->signature_driver) $signatureCount++;
                                            if ($order->signature_penerima) $signatureCount++;

                                            $status = match($signatureCount) {
                                            0 => ['text' => 'Process', 'class' => 'bg-warning-500 text-warning-500'],
                                            3 => ['text' => 'Completed', 'class' => 'bg-success-500 text-success-500'],
                                            default => ['text' => 'Canceled', 'class' => 'bg-danger-500 text-danger-500'],
                                            };
                                            @endphp
                                            <span class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-full bg-opacity-20 {{ $status['class'] }}">
                                                {{ __($status['text']) }}
                                            </span>
                                        </td>

                                        <td class="table-td">
                                            <div class="flex gap-2">
                                                <div class="w-8 h-8 flex items-center justify-center rounded-full {{ $order->signature_gudang ? 'bg-success-500 bg-opacity-20' : 'bg-slate-200' }}">
                                                    <iconify-icon icon="heroicons:building-office-2" class="{{ $order->signature_gudang ? 'text-success-500' : 'text-slate-500' }}"></iconify-icon>
                                                </div>
                                                <div class="w-8 h-8 flex items-center justify-center rounded-full {{ $order->signature_driver ? 'bg-success-500 bg-opacity-20' : 'bg-slate-200' }}">
                                                    <iconify-icon icon="heroicons:truck" class="{{ $order->signature_driver ? 'text-success-500' : 'text-slate-500' }}"></iconify-icon>
                                                </div>
                                                <div class="w-8 h-8 flex items-center justify-center rounded-full {{ $order->signature_penerima ? 'bg-success-500 bg-opacity-20' : 'bg-slate-200' }}">
                                                    <iconify-icon icon="heroicons:user" class="{{ $order->signature_penerima ? 'text-success-500' : 'text-slate-500' }}"></iconify-icon>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="table-td">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                @can('suratjalan view')
                                                <a class="action-btn" href="{{ route('suratjalan.show', ['suratjalan' => $order]) }}">
                                                    <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                </a>
                                                @endcan
                                                @can('suratjalan export')
                                                <a href="{{ route('suratJalan.pdf', $order->id) }}" class="action-btn" data-tippy-content="Download PDF">
                                                    <iconify-icon icon="heroicons:arrow-down-tray"></iconify-icon>
                                                </a>
                                                @endcan

                                                @can('suratjalan edit')
                                                <a class="action-btn" href="{{ route('suratjalan.edit', ['suratjalan' => $order]) }}">
                                                    <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                </a>
                                                @endcan

                                                @can('suratjalan delete')
                                                <form id="deleteForm{{ $order->id }}" method="POST" action="{{ route('suratjalan.destroy', $order) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="action-btn cursor-pointer" onclick="sweetAlertDelete(event, 'deleteForm{{ $order->id }}')" type="submit">
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
                                            <img src="{{ asset('images/result-not-found.svg') }}" alt="No delivery orders found" class="w-64 m-auto" />
                                            <h2 class="text-xl text-slate-700 mb-8 -mt-4">{{ __('No delivery orders found.') }}</h2>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <x-table-footer :per-page-route-name="'suratjalan.index'" :data="$suratJalan" />
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