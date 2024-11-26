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
                    @can('listorder export')
                    <button data-bs-toggle="modal" data-bs-target="#export" class="btn btn-success inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5">
                        Excel <iconify-icon icon="heroicons-outline:folder-arrow-down" class="ml-3 text-xl"></iconify-icon>
                    </button>
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
                                        <!-- return -->
                                        <th scope="col" class="table-th">{{ __('Return Order') }}</th>
                                        <th scope="col" class="table-th">{{ __('Invoice') }}</th>
                                        <th scope="col" class="table-th">{{ __('Product') }}</th>
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
                                        <ul class="list-disc list-inside">
    @foreach ($order->products as $product)
        <li>
            {{ $product->product->name }}
            @if ($product->variant_id)
                - Variant: {{ $product->variant->name }}
            @endif
            @if ($product->batch_id)
                - Batch: {{ $product->batch->name }}
            @endif
        </li>
    @endforeach
</ul>

                                        </td>
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
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="export" tabindex="-1" aria-labelledby="export" aria-hidden="true">
    <div class="modal-dialog top-1/2 !-translate-y-1/2 relative w-auto pointer-events-none">
        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                    <h3 class="text-xl font-medium text-white dark:text-white capitalize">
                        Pilih menu yang akan diexport
                    </h3>
                    <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <section class="py-4">
                    <div class="card border border-slate-200">
                        <div class="p-4">
                            <ul>
                                <li>
                                    <label class="flex items-center gap-x-2">
                                        <input type="checkbox" name="export_options[]" value="salesorder" class="checkbox-export">
                                        Sales Order
                                    </label>
                                </li>
                                <li>
                                    <label class="flex items-center gap-x-2">
                                        <input type="checkbox" name="export_options[]" value="suratjalan" class="checkbox-export">
                                        Surat Jalan
                                    </label>
                                </li>
                                <li>
                                    <label class="flex items-center gap-x-2">
                                        <input type="checkbox" name="export_options[]" value="invoice" class="checkbox-export">
                                        Invoice
                                    </label>
                                </li>
                                <li>
                                    <label class="flex items-center gap-x-2">
                                        <input type="checkbox" name="export_options[]" value="returnsalesorder" class="checkbox-export">
                                        Return Sales Order
                                    </label>
                                </li>
                                <!-- semua informasi -->
                                <li>
                                    <label class="flex items-center gap-x-2">
                                        <input type="checkbox" name="export_options[]" value="listorder" class="checkbox-export">
                                        All
                                    </label>
                                </li>

                            </ul>
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