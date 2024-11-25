<x-app-layout>
    <div>
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>

        <div class="card">
            <div class="card-body p-6">
                <form action="{{ route('stockopname.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Opname Date -->
                        <div>
                            <label for="opname_date" class="form-label">{{ __('Opname Date') }}</label>
                            <input type="date" name="opname_date" id="opname_date" 
                                class="form-control"
                                value="{{ old('opname_date', date('Y-m-d')) }}" required>
                        </div>

                        <!-- Outlet Selection (for superadmin only) -->
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

                    <!-- Note -->
                    <div>
                        <label for="note" class="form-label">{{ __('Note') }}</label>
                        <textarea name="note" id="note" rows="2" 
                            class="form-control">{{ old('note') }}</textarea>
                    </div>

                    <!-- Dynamic Product Fields -->
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-medium">{{ __('Products') }}</h3>
                            <button type="button" id="addProduct" 
                                class="btn btn-primary inline-flex items-center gap-2">
                                <iconify-icon icon="heroicons:plus"></iconify-icon>
                                {{ __('Add Product') }}
                            </button>
                        </div>

                        <div id="productFields" class="space-y-4">
                            <!-- Product fields will be added here -->
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button type="submit" class="btn btn-success">{{ __('Save Stock Opname') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const productFields = document.getElementById('productFields');
    const addProductBtn = document.getElementById('addProduct');
    let productCount = 0;
    addProductField();
    addProductBtn.addEventListener('click', addProductField);
    function addProductField() {
        const fieldWrapper = document.createElement('div');
        fieldWrapper.className = 'bg-slate-50 dark:bg-slate-900 rounded-lg p-4 relative';
        fieldWrapper.innerHTML = `
            <button type="button" class="absolute right-2 top-2 text-red-500 hover:text-red-700 delete-row">
                <iconify-icon icon="heroicons:trash" class="text-xl"></iconify-icon>
            </button>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Product Selection -->
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

                <!-- Current Stock (Read-only) -->
                <div>
                    <label class="form-label">{{ __('Current Stock') }}</label>
                    <input type="number" class="form-control current-stock" readonly>
                </div>

                <!-- Actual Stock -->
                <div>
                    <label class="form-label">{{ __('Actual Stock') }}</label>
                    <input type="number" name="products[${productCount}][actual_qty]" 
                        class="form-control actual-stock" required min="0">
                </div>

                <!-- Difference (Read-only) -->
                <div>
                    <label class="form-label">{{ __('Difference') }}</label>
                    <input type="number" name="products[${productCount}][difference]" 
                        class="form-control stock-difference" readonly>
                </div>
            </div>
        `;
        productFields.appendChild(fieldWrapper);
        const row = productFields.lastElementChild;
        const productSelect = row.querySelector('.product-select');
        const currentStock = row.querySelector('.current-stock');
        const actualStock = row.querySelector('.actual-stock');
        const difference = row.querySelector('.stock-difference');
        const deleteBtn = row.querySelector('.delete-row');
        productSelect.addEventListener('change', function() {
            const option = this.options[this.selectedIndex];
            const stock = parseInt(option.dataset.currentStock) || 0; // Ambil stok dari data attribute
            currentStock.value = stock;
            calculateDifference();
        });
        actualStock.addEventListener('input', calculateDifference);
        function calculateDifference() {
            const current = parseFloat(currentStock.value) || 0;
            const actual = parseFloat(actualStock.value) || 0;
            difference.value = actual - current;
        }

        deleteBtn.addEventListener('click', function() {
            if (productFields.children.length > 1) {
                row.remove();
            } else {
                alert('At least one product is required.');
            }
        });

        productCount++;
    }
});

</script>
    @endpush
</x-app-layout>