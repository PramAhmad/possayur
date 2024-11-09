<x-app-layout>
    <div>
        <div class="mb-6">
            {{-- BreadCrumb --}}
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>

        <!-- Catch all error -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('purchaseorder.update', $purchaseOrder->id) }}" class="max-w-4xl m-auto" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="bg-white dark:bg-slate-800 rounded-md p-5 pb-6">

                <div class="grid sm:grid-cols-2 gap-x-8 gap-y-4">

                    <div class="input-area">
                        <label for="outlet_id" class="form-label">{{ __('Outlet') }}</label>
                        <select name="outlet_id" id="outlet_id" class="form-control">
                            <option value="">{{ __('Select Outlet') }}</option>
                            @foreach ($outlets as $outlet)
                                <option value="{{ $outlet->id }}" {{ $purchaseOrder->outlet_id == $outlet->id ? 'selected' : '' }}>{{ $outlet->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('outlet_id')" class="mt-2" />
                    </div>

                    <div class="input-area">
                        <label for="supplier_id" class="form-label">{{ __('Supplier') }}</label>
                        <select name="supplier_id" id="supplier_id" class="form-control">
                            <option value="">{{ __('Select Supplier') }}</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ $purchaseOrder->supplier_id == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('supplier_id')" class="mt-2" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-1 gap-x-8 gap-y-4 mt-3">
                    <div class="input-area">
                        <label for="note" class="form-label">{{ __('Note') }}</label>
                        <input name="note" type="text" id="note" class="form-control" placeholder="{{ __('Enter note') }}"
                            value="{{ old('note', $purchaseOrder->note) }}" required>
                        <x-input-error :messages="$errors->get('note')" class="mt-2" />
                    </div>
                </div>

                <div class="tw-w-full mt-3">
                    <div class="input-area">
                        <label for="product_id" class="form-label">{{ __('Products and Quantity') }}</label>
                        <div id="products_grid" class="flex flex-col gap-4">
                            @foreach ($purchaseOrder->products as $product)
                                <div class="product-row flex items-center gap-4">
                                    <div class="flex-1 ">
                                        <select name="product_id[]" class="form-control product-select">
                                            <option value="">{{ __('Select Product') }}</option>
                                            @foreach ($products as $p)
                                                <option value="{{ $p->id }}" data-outlet="{{ $p->outlet_id }}" {{ $product->id == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="flex-1 px-3">
                                        <input type="number" name="quantity[]" class="form-control" placeholder="Enter quantity" value="{{ $product->pivot->quantity }}" />
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-danger btn-sm remove-product w-full">
                                            <iconify-icon icon="heroicons-outline:trash" class="text-lg"></iconify-icon>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="button" id="add_product" class="btn btn-sm btn-primary mt-4 w-1/4">
                        <iconify-icon icon="heroicons-outline:plus" class="text-lg"></iconify-icon>
                    </button>
                </div>

                <button type="submit" class="btn inline-flex justify-center btn-dark mt-4 w-full">
                    {{ __('Update') }}
                </button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#outlet_id').change(function() {
                let outletId = $(this).val();
                $('.product-select').val(''); 
                $('.product-select option').each(function() {
                    if ($(this).data('outlet') == outletId || $(this).val() == '') {
                        $(this).show(); 
                    } else {
                        $(this).hide(); 
                    }
                });
            });

            $('#add_product').click(function() {
                let newRow = `
                    <div class="product-row flex items-center gap-4 mt-3">
                        <div class="flex-1">
                            <select name="product_id[]" class="form-control product-select">
                                <option value="">{{ __('Select Product') }}</option>
                                @foreach ($products as $p)
                                    <option value="{{ $p->id }}" data-outlet="{{ $p->outlet_id }}">{{ $p->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex-1 px-3">
                            <input type="number" name="quantity[]" class="form-control" placeholder="Enter quantity" />
                        </div>
                        <div>
                            <button type="button" class="btn btn-danger btn-sm remove-product w-full">
                              <iconify-icon icon="heroicons-outline:trash" class="text-lg"></iconify-icon>
                            </button>
                        </div>
                    </div>`;
                $('#products_grid').append(newRow);
            });

            $(document).on('click', '.remove-product', function() {
                $(this).closest('.product-row').remove();
            });
        });
    </script>
</x-app-layout>
