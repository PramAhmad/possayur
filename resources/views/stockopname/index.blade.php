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
                    <!-- create -->
                    @can('stockopname create')
                    <a href="{{ route('stockopname.create') }}" class="btn btn-dark inline-flex justify-center items-center gap-2">{{ __('Create') }}
                    </a>
                    @endcan
                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5" href="{{ route('stockopname.index') }}">
                        <iconify-icon icon="mdi:refresh" class="text-xl"></iconify-icon>
                    </a>

                    @can('stockopname export')
                    <a href="{{ route('stockopname.export') }}" class="btn btn-success inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5">
                        Excel <iconify-icon icon="heroicons-outline:folder-arrow-down" class="ml-3 text-xl"></iconify-icon>
                    </a>
                    @endcan
                    <form id="searchForm" method="get" action="{{ route('stockopname.index') }}" class="flex gap-3">
                        <!-- Product Filter -->
                        <select name="product_id" class="select2 form-control w-full">
                            <option value="">{{ __('Select Product') }}</option>
                            @foreach($product as $item)
                            <option value="{{ $item->id }}" {{ request()->product_id == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                            @endforeach
                        </select>

                        <!-- Search Input -->
                        <!-- <div class="relative">
                                    <input name="q" type="text" class="inputField pl-8 p-2 border border-slate-200 dark:border-slate-700 rounded-md dark:bg-slate-900" placeholder="Search by date" value="{{ request()->q }}">
                                    <iconify-icon class="absolute text-textColor left-2 dark:text-white" icon="quill:search-alt"></iconify-icon>
                                </div> -->
                    </form>
                </div>
                <div class="justify-center flex flex-wrap sm:flex items-center lg:justify-end gap-3">
                    <div class="relative w-full sm:w-auto flex items-center gap-3">

                    </div>
                </div>
            </header>
            <div class="card-body px-6 pb-6">
                <div class="overflow-x-auto -mx-6">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                <thead class="bg-slate-200 dark:bg-slate-700">
                                    <tr>
                                        <th scope="col" class="table-th text-center">{{ __('Outlet') }}</th>
                                        <th scope="col" class="table-th text-center">{{ __('Product Name') }}</th>
                                        <th scope="col" class="table-th text-center">{{ __('Opname Date') }}</th>
                                        <th scope="col" class="table-th text-center">{{ __('Qty Now') }}</th>
                                        <th scope="col" class="table-th text-center">{{ __('Actual Qty') }}</th>
                                        <th scope="col" class="table-th text-center">{{ __('Status') }}</th>

                                        <th scope="col" class="table-th text-center w-20">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    @forelse ($stockOpNames as $item)
                                    <tr>
                                        <td class="table-td">{{ $item->outlet->name }}</td>
                                        <td class="table-td">{{ $item->product->name }}</td>
                                        <td class="table-td">{{
                                            Carbon\Carbon::parse($item->opname_date)->format('d M Y') }}</td>
                                        <td class="table-td">{{ $item->initial_qty }}</td>
                                        <td class="table-td">{{ $item->actual_qty }}</td>
                                        <td class="table-td">
                                            <!-- staus kalo diff minus need adjuctment gitu -->
                                            @if($item->difference < 0)
                                                <span class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-full bg-opacity-20 text-danger-500 bg-danger-500">Not Balance</span>
                                                @else
                                                <span class="badge badge-success">Need Adjusment</span>
                                                @endif
                                        </td>
                                        <td class="table-td">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                <!-- if dif < 0 open modal button for adjust -->
                                                @if($item->difference < 0)
                                                    <button data-id="{{ $item->id }}" class="action-btn open-modal" data-bs-toggle="modal" data-bs-target="#adjust">
                                                    <iconify-icon icon="heroicons:check"></iconify-icon>
                                                    </button>

                                                    @endif
                                                    @can('stockopname view')
                                                    <a href="{{ route('stockopname.show', $item->id) }}" class="action-btn" data-tippy-content="View">
                                                        <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                    </a>
                                                    @endcan
                                                    @can('stockopname edit')
                                                    <a href="{{ route('stockopname.edit', $item->id) }}" class="action-btn" data-tippy-content="Edit">
                                                        <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                    </a>
                                                    @endcan
                                                    @can('stockopname delete')
                                                    <form id="deleteForm{{ $item->id }}" action="{{ route('stockopname.destroy', $item->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="action-btn" onclick="sweetAlertDelete(event, 'deleteForm{{ $item->id }}')" data-tippy-content="Delete">
                                                            <iconify-icon icon="fluent:delete-24-regular"></iconify-icon>
                                                        </button>
                                                    </form>
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
                            <x-table-footer :per-page-route-name="'stockopname.index'" :data="$stockOpNames" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="adjust" tabindex="-1" aria-labelledby="adjustLabel" aria-hidden="true">
        <div class="modal-dialog top-1/2 !-translate-y-1/2 relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                    <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                        <h3 id="adjustLabel" class="text-xl font-medium text-white dark:text-white capitalize">
                        </h3>
                        <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <section class="py-4">
                        <div class="card border border-slate-200">
                            <div class="p-4 modal-body">
                                <!-- ini content cuy -->
                            </div>
                        </div>
                    </section>
                    <div class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                        <button id="adjust-button" class="btn inline-flex justify-center text-white bg-black-500">Adjust</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('.open-modal').on('click', function() {
                const id = $(this).data('id');
                const modalTitle = $('#adjustLabel');
                const modalBody = $('#adjust .modal-body');
                modalBody.html('<p>Loading...</p>');

                $.ajax({
                    url: `json/stockopname/${id}`,
                    method: 'GET',
                    success: function(data) {
                        modalTitle.text(data.product.name);
                        modalBody.html(`
                        <div class="card bg-slate-50 dark:bg-slate-800 p-4 rounded-md">
                            <div class="flex flex-col md:flex-row justify-between items-center">
                                <div>
                                    <h4 class="font-semibold text-lg">${data.product.name}</h4>
                                    <p class="text-sm text-slate-500">Outlet: ${data.outlet.name}</p>
                                    <p class="text-sm text-slate-500">Date: ${new Date(data.opname_date).toLocaleDateString()}</p>
                                </div>
                              
                                <div class="mt-4">
                                    <p class="text-sm text-slate-500">Initial Stock: <span class='font-semibold'>${data.initial_qty}</span></p>
                                    <p class="text-sm text-slate-500">Actual Stock: <span class='font-semibold'>${data.actual_qty}</span></p>
                                    <p class="text-sm ">Difference: <span class='text-red-500'>${data.difference}</span></p>
                                </div>
                            </div>
                        </div>
                    `);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        modalBody.html('<p class="text-red-500">Error loading data.</p>');
                    }
                });
            });
        });
    </script>

    <script>
        document.querySelector('select[name="product_id"]').addEventListener('change', function() {
            document.getElementById('searchForm').submit();
        });

        function sweetAlertDelete(event, formId) {
            event.preventDefault();
            let form = document.getElementById(formId);
            Swal.fire({
                title: `@lang('
                Are you sure ? ')`,
                icon: 'question',
                showDenyButton: true,
                confirmButtonText: `@lang('
                Delete ')`,
                denyButtonText: `@lang('
                Cancel ')`,
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        }
    </script>
    <!-- adjust button confirm post ajax -->
    <script>
        $(document).ready(function() {
            $('#adjust-button').on('click', function() {
                const id = $('.open-modal').data('id');
                $.ajax({
                    url: `json/stockopname/${id}/adjust`,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if (data.success) {
                            Swal.fire({
                                title: 'Success',
                                text: data.message,
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            setTimeout(() => {
                                location.reload();
                            }, 1500);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        Swal.fire({
                            title: 'Error',
                            text: 'Failed to adjust stock',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            });
        });

    </script>
    @endpush
</x-app-layout>