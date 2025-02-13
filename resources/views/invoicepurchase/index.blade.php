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

                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5" href="{{ route('invoicepurchase.create') }}">
                        <iconify-icon icon="mdi:refresh" class="text-xl"></iconify-icon>
                    </a>
                    @can('purchase view')    
                     <a href="{{ route('invoicepurchase.export') }}" class="btn btn-success inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5">
                         Excel <iconify-icon icon="heroicons-outline:folder-arrow-down" class="ml-3 text-xl"></iconify-icon>
                     </a>
                     @endcan
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
                                        <th scope="col" class="table-th text-center">{{ __('Products') }}</th>
                                        <th scope="col" class="table-th">{{ __('Status') }}</th>
                                        <th scope="col" class="table-th w-20">{{ __('Action') }}</th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    @forelse ($invoicePurchases as $purchaseOrder)
                                    <tr>
                                        <td class="table-td"># {{ $purchaseOrder->id }}</td>
                                        <td class="table-td">{{ $purchaseOrder->invoice_number }}</td>
                                        <td class="table-td">{{ $purchaseOrder->supplier->name }}</td>
                                        <td class="table-td">
                                            <!-- using carbon created at 29 oktober 2023 -->
                                             {{Carbon\Carbon::parse($purchaseOrder->created_at)->format('d M Y')}}
                                        </td>
                                        <td class="table-td">{{ currency($purchaseOrder->grand_total) }}</td>
                                        <td class="table-td text-center">
                                            <div class="flex justify-center items-center">
                                                <a href="#" class="action-btn text-center" onclick="showProductModal({{ $purchaseOrder->id }})" data-products='@json($purchaseOrder->productInvoicePurchases)'>
                                                    <iconify-icon icon="akar-icons:eye" class="text-lg"></iconify-icon>
                                                </a>
                                            </div>
                                        </td>

                                        <td class="table-td">
                                           
                                            <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-full bg-opacity-20 text-success-500
                                bg-success-500">
                                                Completed
                                            </div>
                                            
                                        </td>
                                        <td class="table-td">
                                        @can('listorder view')
                                                <a class="action-btn" href="{{route('invoicepurchase.show',['id' => $purchaseOrder->id])}} ">
                                                    <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                </a>
                                                @endcan
                                         
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

                            <x-table-footer :per-page-route-name="'purchaseorder.index'" :data="$invoicePurchases" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="productModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg w-full max-w-3xl p-6">
            <h2 class="text-2xl font-semibold mb-4">{{ __('Product Details') }}</h2>
            <div id="productDetails" class="mb-4">
                <!-- Product information will be loaded here -->
            </div>
            <button onclick="closeProductModal()" class="btn btn-dark mt-4">{{ __('Close') }}</button>
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
        function showProductModal(purchaseOrderId) {
            // Show the modal
            document.getElementById('productModal').classList.remove('hidden');

            // Get the products data from the data attribute
            const productData = JSON.parse(document.querySelector(`[onclick="showProductModal(${purchaseOrderId})"]`).getAttribute('data-products'));
            let productDetailsDiv = document.getElementById('productDetails');
            productDetailsDiv.innerHTML = ''; // Clear previous content
            console.log(productData);
            if (productData.length > 0) {
                productData.forEach(product => {
                    productDetailsDiv.innerHTML += `
                            <div class="mb-2 flex">
                            <div class="flex-1">
                                <h3 class="text-lg font-medium">${product.name}</h3>
                            <img src="/upload/product/${product.image}" alt="${product.name}" class="w-20 h-20 object-cover rounded-lg">
                           
                            </div>
                            <div class="flex-1">
                              <p>{{ __('Quantity: ') }} ${product.pivot.quantity}</p>
                                <p>{{ __('Unit Price: ') }} ${product.pivot.unit_price}</p>
                                <p>{{ __('Net Cost: ') }} ${product.pivot.net_cost}</p>
                                <p>{{ __('Total Cost: ') }} ${product.pivot.total_cost}</p>
                            </div>
                            </div>
                            <hr>
                        `;
                });
            } else {
                productDetailsDiv.innerHTML = `<p>{{ __(' No products found.
                ') }}</p>`;
            }
        }

        function closeProductModal() {
            document.getElementById('productModal').classList.add('hidden');
        }
    </script>
    @endpush
</x-app-layout>