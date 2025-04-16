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
                    <!-- @can('listorder create')
                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2 !px-3" href="{{ route('listorder.create') }}">
                        <iconify-icon icon="ic:round-plus" class="text-lg mr-1"></iconify-icon>
                        {{ __('New Delivery Order') }}
                    </a>
                    @endcan -->

                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5" href="{{ route('listorder.index') }}">
                        <iconify-icon icon="mdi:refresh" class="text-xl"></iconify-icon>
                    </a>
                
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
                                        <!-- return -->
                                        <th scope="col" class="table-th">{{ __('Return Order') }}</th>
                                        <th scope="col" class="table-th">{{ __('Invoice') }}</th>
                                        <th scope="col" class="table-th">{{ __('Status') }}</th>
                                        <th scope="col" class="table-th w-20">{{ __('Action') }}</th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    @forelse ($listorder as $order)
                                    <tr>
                                        <td class="table-td"># {{
                                            $loop->iteration + $listorder->firstItem() - 1
                                        }}</td>
                                        <td class="table-td">{{ $order->reference_no ?? '-' }}</td>

                                        <td class="table-td">{{ $order->invoice->reference_number ?? '-' }}</td>
                                        <td class="table-td">{{ $order->returnSalesOrder->return_number ?? '-' }}</td>
                                        <td class="table-td">
                                            @php
                                            switch ($order->status) {
                                            case 'pending':
                                            $status = [
                                            'class' => 'bg-warning-500 text-warning-500',
                                            'text' => 'Pending',
                                            ];
                                            break;
                                            case 'process':
                                            $status = [
                                            'class' => 'bg-info-500 text-info-500',
                                            'text' => 'Process',
                                            ];
                                            break;
                                            case 'completed':
                                            $status = [
                                            'class' => 'bg-success-500 text-success-500',
                                            'text' => 'Completed',
                                            ];
                                            break;
                                            case 'canceled':
                                            $status = [
                                            'class' => 'bg-danger-500 text-danger-500',
                                            'text' => 'Canceled',
                                            ];
                                            break;
                                            }
                                            @endphp
                                            <span class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-full bg-opacity-20 {{ $status['class'] }}">
                                                {{ __($status['text']) }}
                                            </span>
                                        </td>


                                        <td class="table-td">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                @can('listorder view')
                                                <a class="action-btn" href="{{ route('listorder.show', ['id' => $order->id]) }}">
                                                    <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                </a>
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

                            <x-table-footer :per-page-route-name="'listorder.index'" :data="$listorder" />
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
    <script>
        document.getElementById('export-button').addEventListener('click', function () {
    const checkboxes = document.querySelectorAll('.checkbox-export:checked');
    const selectedOptions = Array.from(checkboxes).map(cb => cb.value);

    if (selectedOptions.length === 0) {
        alert('Silakan pilih setidaknya satu menu untuk diexport.');
        return;
    }

    selectedOptions.forEach(option => {
        let url = '';
        switch (option) {
            case 'salesorder':
                url = '/export/salesorder';
                break;
            case 'suratjalan':
                url = '/export/suratjalan';
                break;
            case 'invoice':
                url = '/export/invoice';
                break;
            case 'returnsalesorder':
                url = '/export/returnsalesorder';
                break;
        }

        // Kirim request ke masing-masing route
        fetch(url, {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
            .then(response => {
                if (response.ok) {
                    return response.blob();
                    // close modal
                    document.getElementById('export').classList.add('hidden');

                }
                throw new Error('Gagal melakukan export: ' + option);
            })
            .then(blob => {
                const link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = `${option}_export.xlsx`;
                link.click();
            })
            .catch(error => console.error(error));
    });
});

    </script>
    @endpush
</x-app-layout>