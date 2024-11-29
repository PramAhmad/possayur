<x-app-layout>
    <div>
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>

        <div class="card">
            <div class="card-body p-6">
                <form action="{{ route('stockopname.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Opname Date -->
                        <div>
                            <label for="opname_date" class="form-label">{{ __('Opname Date') }}</label>
                            <input type="date" name="opname_date" id="opname_date"
                                class="form-control"
                                value="{{ old('opname_date', date('Y-m-d')) }}" required>
                        </div>

                        @if(auth()->user()->hasRole('super-admin'))
                        <div>
                            <label for="outlet_id" class="form-label">{{ __('Outlet') }}</label>
                            <select name="outlet_id" id="outlet_id" class="form-control" required>
                                <option value="">{{ __('Select Outlet') }}</option>
                                @foreach($outlets as $outlet)
                                <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @else
                        <input type="hidden" name="outlet_id" value="{{ auth()->user()->outlet_id }}">
                        @endif
                    </div>

                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-medium">{{ __('Products') }}</h3>
                            <div class="flex items-center gap-2">
                                <!-- Excel Import Button -->
                                <div class="relative">
                                    <input type="file" id="excelImport" name="excel_import"
                                        accept=".xlsx,.xls"
                                        class="hidden" />
                                    <button type="button"
                                        onclick="$('#excelImport').click()"
                                        class="btn inline-flex justify-center btn-success rounded-[25px] items-center !p-2 !px-3">
                                        <iconify-icon icon="heroicons:document-arrow-up"></iconify-icon>
                                        {{ __('Import Excel') }}
                                    </button>
                                </div>

                                <!-- Download Template -->
                                <a href="{{route('stockopname.download-template')}}"
                                    class="btn inline-flex justify-center btn-success rounded-[25px] items-center !p-2 !px-3">
                                    <iconify-icon icon="heroicons:document-arrow-down"></iconify-icon>
                                    {{ __('Download Template') }}
                                </a>

                                <!-- Add Product Manually Button -->
                                <button type="button" id="addProduct"
                                    class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2 !px-3">
                                    <iconify-icon icon="heroicons:plus"></iconify-icon>
                                    {{ __('Add Product') }}
                                </button>
                            </div>
                        </div>

                        <!-- Note for Products -->
                        <div class="bg-blue-50 border border-blue-200 p-3 rounded-lg text-sm text-blue-700">
                            <p>
                                <strong>{{ __('Notes:') }}</strong>
                                {{ __('- Ensure actual stock matches physical inventory.') }}
                                {{ __('- Negative differences indicate stock shortage.') }}
                                {{ __('- Positive differences indicate excess stock.') }}
                            </p>
                        </div>

                        <div id="productFields" class="space-y-4">
                            <!-- Dynamic Product Fields -->
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button type="submit" class="btn btn-dark">{{ __('Save Stock Opname') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let productCount = 0;

            // Add Product Button Click
            $('#addProduct').on('click', function() {
                addProductField();
            });


            // Function to Add Product Field
            function addProductField() {
                const field = `
            <div class="bg-slate-50 dark:bg-slate-900 rounded-lg p-4 relative product-row">
                <button type="button" class="absolute right-2 top-2 text-red-500 hover:text-red-700 delete-row">
                    <iconify-icon icon="heroicons:trash" class="text-xl"></iconify-icon>
                </button>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="form-label">{{ __('Product') }}</label>
                        <select name="products[${productCount}][product_id]" class="form-control product-select" required>
                            <option value="">{{ __('Select Product') }}</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" data-current-stock="{{ $product->qty }}">
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="form-label">{{ __('Current Stock') }}</label>
                        <input type="number" class="form-control current-stock" readonly>
                    </div>
                    <div>
                        <label class="form-label">{{ __('Actual Stock') }}</label>
                        <input type="number" name="products[${productCount}][actual_qty]" 
                            class="form-control actual-stock" required>
                    </div>
                    <div>
                        <label class="form-label">{{ __('Difference') }}</label>
                        <input type="number" name="products[${productCount}][difference]" 
                            class="form-control stock-difference" readonly>
                    </div>
                </div>
                <div class="input-area mt-3">
                    <label for="note" class="form-label">{{ __('Note') }}</label>
                    <input name="note" type="text" id="note" class="form-control" 
                           placeholder="{{ __('Enter note') }}" value="{{ old('note') }}" required>
                    <x-input-error :messages="$errors->get('note')" class="mt-2"/>
                </div>
            </div>
        `;
                $('#productFields').append(field);
                productCount++;
            }

            $(document).on('click', '.delete-row', function() {
                $(this).closest('.product-row').remove();
            });


            $('#excelImport').on('change', function() {
                const formData = new FormData();
                formData.append('excel_import', this.files[0]);
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: "{{ route('stockopname.import-excel') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response && response.products.length > 0) {
                            const productData = response.products;

                            productData.forEach(product => {
                                const productRow = `
                        <div class="bg-slate-50 dark:bg-slate-900 rounded-lg p-4 relative product-row">
                            <button type="button" class="absolute right-2 top-2 text-red-500 hover:text-red-700 delete-row">
                                <iconify-icon icon="heroicons:trash" class="text-xl"></iconify-icon>
                            </button>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div>
                                    <label class="form-label">{{ __('Product') }}</label>
                                    <select name="products[${productCount}][product_id]" class="form-control product-select" required>
                                        <option value="${product['product_id']}" selected>
                                            ${product['name']}
                                        </option>
                                    </select>
                                </div>
                                <div>
                                    <label class="form-label">{{ __('Current Stock') }}</label>
                                    <input type="number" class="form-control current-stock" value="${product['current_stock']}" readonly>
                                </div>
                                <div>
                                    <label class="form-label">{{ __('Actual Stock') }}</label>
                                    <input type="number" name="products[${productCount}][actual_qty]" 
                                        class="form-control actual-stock" value="${product['actual_qty'] || ''}" required>
                                </div>
                                <div>
                                    <label class="form-label">{{ __('Difference') }}</label>
                                    <input type="number" name="products[${productCount}][difference]" 
                                        class="form-control stock-difference" readonly>
                                </div>
                            </div>
                            <div class="input-area mt-3">
                                <label for="note" class="form-label">{{ __('Note') }}</label>
                                <input name="products[${productCount}][note]" type="text" class="form-control" 
                                       placeholder="{{ __('Enter note') }}" value="${product['notes']}" required>
                            </div>
                        </div>
                    `;

                                $('#productFields').append(productRow);
                                productCount++;
                            });

                            calculateStockDifferences();
                        } else {
                            Swal.fire('Error', 'No products found in the imported file', 'error');
                        }
                    },
                    error: function(xhr) {
                        Swal.fire('Error', xhr.responseJSON.message || 'An error occurred', 'error');
                    }
                });
            });

            function calculateStockDifferences() {
                $('.product-row').each(function() {
                    const currentStock = $(this).find('.current-stock').val() || 0;
                    const actualStock = $(this).find('.actual-stock').val() || 0;
                    const difference = actualStock - currentStock;

                    $(this).find('.stock-difference').val(difference);
                });
            }

            $(document).on('input', '.actual-stock', function() {
                calculateStockDifferences();
            });
        });
    </script>
    @endpush
</x-app-layout>