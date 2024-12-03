<x-app-layout>
    <div>
        <div class="mb-6">
            {{-- Breadcrumb start --}}
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>

        {{-- Alert start --}}
        @if (session('message'))
            <x-alert :message="session('message')" :type="'success'" />
        @endif
        {{-- Alert end --}}
        <div class="space-y-5">
            <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4">
                <div class="card">
                    <div class="card-body pt-4 pb-3 px-4">
                        <div class="flex space-x-3 rtl:space-x-reverse">
                            <div class="flex-none">
                                <div class="h-12 w-12 rounded-full flex flex-col items-center justify-center text-2xl bg-[#EAE6FF] dark:bg-slate-900	 text-indigo-500">
                                    <iconify-icon icon=heroicons:gift-top></iconify-icon>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="text-slate-600 dark:text-slate-300 text-sm mb-1 font-medium">
                                    Totel Product
                                </div>
                                <div class="text-slate-900 dark:text-white text-lg font-medium">
                                    {{$products->count()}}
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
                                    <iconify-icon icon=heroicons:currency-dollar></iconify-icon>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="text-slate-600 dark:text-slate-300 text-sm mb-1 font-medium">
                                    Totel Product Sales (QTY)
                                </div>
                                <div class="text-slate-900 dark:text-white text-lg font-medium">
                                    @php
                                    $productSalesCount = App\Models\SalesOrder::With('products')->get()->pluck('products')->flatten()->sum('qty');
                                    @endphp
                                    {{
                                        $productSalesCount
                                    }}
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
                             

                               
                                0
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
        <div class="card mt-4">
            <header class="card-header noborder">
                <div class="justify-end flex gap-3 items-center flex-wrap">
                    {{-- Create Button start --}}
                    @can('product create')
                        <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2 !px-3" href="{{ route('product.create') }}">
                            <iconify-icon icon="ic:round-plus" class="text-lg mr-1"></iconify-icon>
                            {{ __('New Product') }}
                        </a>
                    @endcan

                    {{-- Refresh Button start --}}
                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5" href="{{ route('product.index') }}">
                        <iconify-icon icon="mdi:refresh" class="text-xl"></iconify-icon>
                    </a>
                </div>

                <div class="justify-center flex flex-wrap sm:flex items-center lg:justify-end gap-3">
                    <div class="relative w-full sm:w-auto flex items-center">
                        <form id="searchForm" method="get" action="{{ route('product.index') }}">
                            <input name="q" type="text" class="inputField pl-8 p-2 border border-slate-200 dark:border-slate-700 rounded-md dark:bg-slate-900" placeholder="Search product" value="{{ request()->q }}">
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
                                        <th scope="col" class="table-th">{{ __('Edit Price') }}</th>
                                        <th scope="col" class="table-th">{{ __('Image') }}</th>
                                        <th scope="col" class="table-th">{{ __('Name') }}</th>
                                        <th scope="col" class="table-th">{{ __('SKU') }}</th>
                                        <th scope="col" class="table-th">{{ __('Selling Price') }}</th>
                                        <th scope="col" class="table-th">{{ __('Quantity') }}</th>
                                        <th scope="col" class="table-th w-20">{{ __('Action') }}</th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    @forelse ($products as $product)
                                        <tr>
                                            <td class="table-td"># {{ $product->id }}</td>
                                            <td class="table-td">
                                                <a href="{{ route('product.customer.index',["id" => $product->id]) }}" class="action-btn  text-center bedge-dark rounded-[25px] ">
                                                    <!-- icon -->
                                                    <iconify-icon class="text-lg" icon="akar-icons:money"></iconify-icon>
                                                </a>
                                            </td>
                                            <td class="table-td">
                                                @if ($product->image)
                                                    <img src="{{ asset('upload/product/' . $product->image) }}" alt="{{ $product->name }}" class="w-10 h-10 object-cover">
                                                @else
                                                    <span>{{ __('No Image') }}</span>
                                                @endif
                                            </td>
                                            <td class="table-td">{{ $product->name }}</td>
                                            <td class="table-td">{{ $product->sku }}</td>
                                            <td class="table-td">{{ currency($product->selling_price) }}</td>
                                            <td class="table-td">{{ number_format($product->qty) }}</td>

                                            <td class="table-td">
                                                <div class="flex space-x-3 rtl:space-x-reverse">
                                                    @can('product update')
                                                        <a class="action-btn" href="{{ route('product.edit', ['product' => $product]) }}">
                                                            <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                        </a>
                                                    @endcan

                                                    @can('product delete')
                                                        <form id="deleteForm{{ $product->id }}" method="POST" action="{{ route('product.destroy', $product) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a class="action-btn cursor-pointer" onclick="sweetAlertDelete(event, 'deleteForm{{ $product->id }}')" type="submit">
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
                                                <img src="{{ asset('images/result-not-found.svg') }}" alt="No products found" class="w-64 m-auto" />
                                                <h2 class="text-xl text-slate-700 mb-8 -mt-4">{{ __('No products found.') }}</h2>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{-- Table footer for pagination --}}
                            <x-table-footer :per-page-route-name="'product.index'" :data="$products" />
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
