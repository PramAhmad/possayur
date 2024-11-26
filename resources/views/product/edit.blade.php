<x-app-layout>
    <div>
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>
        <form method="POST" action="{{ route('product.update', $product->id) }}" class="max-w-7xl m-auto" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="bg-white dark:bg-slate-800 rounded-md p-5 pb-6">
                <div class="grid sm:grid-cols-2 gap-x-8 gap-y-4">
                    <div class="input-area">
                        <label for="outlet_id" class="form-label">{{ __('Outlet') }}</label>
                        <select name="outlet_id" id="outlet_id" class="form-control">
                            <option value="">{{ __('Select Outlet') }}</option>
                            @foreach ($outlets as $outlet)
                                <option value="{{ $outlet->id }}" {{ $product->outlet_id == $outlet->id ? 'selected' : '' }}>
                                    {{ $outlet->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('outlet_id')" class="mt-2"/>
                    </div>
                    <div class="input-area">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input name="name" type="text" id="name" class="form-control" 
                               placeholder="{{ __('Enter product name') }}" value="{{ old('name', $product->name) }}" required>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>
                    <div class="input-area">
                        <label for="barcode" class="form-label">{{ __('Barcode') }}</label>
                        <input name="barcode" type="text" id="barcode" class="form-control"
                               placeholder="{{ __('Enter barcode') }}" value="{{ old('barcode', $product->barcode) }}" required>
                        <x-input-error :messages="$errors->get('barcode')" class="mt-2"/>
                    </div>
                    <div class="input-area">
                        <label for="slug" class="form-label">{{ __('Slug') }}</label>
                        <input name="slug" type="text" id="slug" class="form-control"
                               placeholder="{{ __('Enter slug') }}" value="{{ old('slug', $product->slug) }}" required>
                        <x-input-error :messages="$errors->get('slug')" class="mt-2"/>
                    </div>
                    <div class="input-area">
                        <label for="cost_price" class="form-label">{{ __('Cost Price') }}</label>
                        <input name="cost_price" type="number" id="cost_price" class="form-control"
                               placeholder="{{ __('Enter cost price') }}" value="{{ old('cost_price', $product->cost_price) }}" required>
                        <x-input-error :messages="$errors->get('cost_price')" class="mt-2"/>
                    </div>

                    <div class="input-area">
                        <label for="selling_price" class="form-label">{{ __('Selling Price') }}</label>
                        <input name="selling_price" type="number" id="selling_price" class="form-control"
                               placeholder="{{ __('Enter selling price') }}" value="{{ old('selling_price', $product->selling_price) }}" required>
                        <x-input-error :messages="$errors->get('selling_price')" class="mt-2"/>
                    </div>

                    <div class="input-area">
                        <label for="qty" class="form-label">{{ __('Quantity') }}</label>
                        <input name="qty" type="number" id="qty" class="form-control"
                               placeholder="{{ __('Enter quantity') }}" value="{{ old('qty', $product->qty) }}" required>
                        <x-input-error :messages="$errors->get('qty')" class="mt-2"/>
                    </div>

                    <div class="input-area">
                        <label for="alert_qty" class="form-label">{{ __('Alert Quantity') }}</label>
                        <input name="alert_qty" type="number" id="alert_qty" class="form-control"
                               placeholder="{{ __('Enter alert quantity') }}" value="{{ old('alert_qty', $product->alert_qty) }}" required>
                        <x-input-error :messages="$errors->get('alert_qty')" class="mt-2"/>
                    </div>
                    <div class="input-area">
                        <label for="image" class="form-label">{{ __('Image') }}</label>
                      
                        <input name="image" type="file" id="image" class="form-control">
                        <x-input-error :messages="$errors->get('image')" class="mt-2"/>
                        @if($product->image)
                                <div class="mb-2">
                                    <img src="{{ asset('upload/product/' . $product->image) }}" alt="Current Image" class="w-12 h-12 object-cover">
                                </div>
                        @endif
                    </div>

                    <div class="input-area">
                        <label for="sku" class="form-label">{{ __('SKU') }}</label>
                        <input name="sku" type="text" id="sku" class="form-control"
                               placeholder="{{ __('Enter SKU') }}" value="{{ old('sku', $product->sku) }}" required>
                        <x-input-error :messages="$errors->get('sku')" class="mt-2"/>
                    </div>

                
                        
                    <div class="input-area">
                        <label for="description" class="form-label">{{ __('Description') }}</label>
                        <textarea name="description" id="description" class="form-control"
                                  placeholder="{{ __('Enter description') }}">{{ old('description', $product->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                    </div>
                    <div class="input-area">
                        <label for="category_id" class="form-label">{{ __('Category') }}</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">{{ __('Select Category') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2"/>
                    </div>

                    <div class="input-area">
                        <label for="brand_id" class="form-label">{{ __('Brand') }}</label>
                        <select name="brand_id" id="brand_id" class="form-control" >
                            <option value="">{{ __('Select Brand') }}</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('brand_id')" class="mt-2"/>
                    </div>

                    <div class="input-area">
                        <label for="unit_id" class="form-label">{{ __('Unit') }}</label>
                        <select name="unit_id" id="unit_id" class="form-control" >
                            <option value="">{{ __('Select Unit') }}</option>
                            @foreach ($unit as $u)
                                <option value="{{ $u->id }}" {{ $product->unit_id == $u->id ? 'selected' : '' }}>
                                    {{ $u->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('unit_id')" class="mt-2"/>
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-x-8 gap-y-4">
                    <div class="sm:col-span-2">
                        <div class="grid sm:grid-cols-3 gap-x-8 gap-y-4 p-4 bg-slate-50 dark:bg-slate-700 rounded-lg">
                            <div class="input-area">
                                <div class="flex items-center gap-2 mb-4">
                                    <input type="checkbox" name="is_variant" id="is_variant" value="1"
                                           class="w-4 h-4 rounded border-slate-400" 
                                           {{ $product->is_variant ? 'checked' : '' }}>
                                    <label for="is_variant" class="form-label mb-0">{{ __('Is Variant') }}</label>
                                </div>
                                <div id="variant_fields" style=`display: {{ $product->is_variant ? 'block' : 'none' }};` class="space-y-4">
                                    <div class="input-area">
                                        <label for="variant_name" class="form-label">{{ __('Variant Name') }}</label>
                                        <input name="variant_name" type="text" id="variant_name" class="form-control"
                                               placeholder="{{ __('Enter variant name') }}" 
                                               value="{{ old('variant_name', $product->variant->name ?? "-") }}">
                                    </div>
                                    <div class="input-area">
                                        <label for="variant_price" class="form-label">{{ __('Variant Price') }}</label>
                                        <input name="variant_price" type="number" id="variant_price" class="form-control"
                                               placeholder="{{ __('Enter variant price') }}"
                                               value="{{ old('variant_price', $product->variant->price ?? "-") }}">
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                        <div class="input-area">
                            <label for="is_active" class="form-label">{{ __('Status') }}</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="0" {{ !$product->is_active ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                <option value="1" {{ $product->is_active ? 'selected' : '' }}>{{ __('Active') }}</option>
                            </select>
                            <x-input-error :messages="$errors->get('is_active')" class="mt-2"/>
                        </div>
                                        <!-- Variants and Batch Section for Edit -->
                <div class="mt-6 bg-slate-50 dark:bg-slate-700 rounded-lg p-4">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="flex items-center gap-2 input-variant">
                            <input type="checkbox" name="product_type[]" id="variant_checkbox" value="variant" class="w-4 h-4 rounded border-slate-400"
                                {{ $product->is_variant == 1 ? 'checked' : '' }}>
                            <label for="variant_checkbox" class="form-label mb-0">{{ __('Variants') }}</label>
                        </div>
                        <div class="flex items-center gap-2 input-batch">
                            <input type="checkbox" name="product_type[]" id="batch_checkbox" value="batch" class="w-4 h-4 rounded border-slate-400"
                                {{ $product->is_batch == 1 ? 'checked' : '' }}>
                            <label for="batch_checkbox" class="form-label mb-0">{{ __('Batch') }}</label>
                        </div>
                    </div>

                    <!-- Variant Section -->
                    <div id="variant_section" style=`{{ $product->is_variant == 1 ? 'display: block;' : 'display: none;' }}`>
                        <table class="min-w-full table-auto" id="variant_table">
                            <thead>
                                <tr class="bg-slate-100">
                                    <th class="text-center">{{ __('Drag') }}</th>
                                    <th>{{ __('Variant Name') }}</th>
                                    <th>{{ __('Price') }}</th>
                                    <th>{{ __('Item Code') }}</th>
                                    <th class="text-right">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody id="variant_container">
                                @if($product->is_variant == 1) 
                                @foreach($product->variants as $index => $variant)
                                <tr class="variant-row" data-index="{{ $index + 1 }}">
                                    <td class="text-center">
                                        <svg class="w-5 h-5 text-gray-500 cursor-move" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                        </svg>
                                    </td>
                                    <td>
                                        <input type="text" name="variants[{{ $index + 1 }}][name]" class="form-control"
                                            value="{{ $variant->name }}" placeholder="{{ __('Variant Name') }}" required>
                                        <input type="hidden" name="variants[{{ $index + 1 }}][id]" value="{{ $variant->id }}">
                                    </td>
                                    <td>
                                        <input type="number" name="variants[{{ $index + 1 }}][additional_price]" class="form-control"
                                            value="{{ $variant->additional_price }}" placeholder="{{ __('Variant Price') }}" required>
                                    </td>
                                    <td>
                                        <input type="text" name="variants[{{ $index + 1 }}][item_code]" class="form-control"
                                            value="{{ $variant->item_code }}" placeholder="{{ __('Item Code') }}" required>
                                    </td>
                                    <td class="text-right">
                                        <button type="button" class="btn btn-sm btn-outline-danger remove-variant">
                                            {{ __('Remove') }}
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <button type="button" id="add_variant" class="btn btn-outline-dark mt-2">
                            {{ __('Add Variant') }}
                        </button>
                    </div>

                    <!-- Batch Section -->
                    <div id="batch_section" style="{{ $product->is_batch === 1 ? 'display: block;' : 'display: none;' }}">
                        <table class="min-w-full table-auto" id="batch_table">
                            <thead>
                                <tr class="bg-slate-100">
                                    <th class="text-center">{{ __('Drag') }}</th>
                                    <th>{{ __('Batch Number') }}</th>
                                    <th>{{ __('Expiry Date') }}</th>
                                    <th>{{ __('Quantity') }}</th>
                                    <th class="text-right">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody id="batch_container">
                                @if($product->is_batch == 1)
                                @foreach($product->batches as $index => $batch)
                                <tr class="batch-row" data-index="{{ $index + 1 }}">
                                    <td class="text-center">
                                        <svg class="w-5 h-5 text-gray-500 cursor-move" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                        </svg>
                                    </td>
                                    <td>
                                        <input type="text" name="batches[{{ $index + 1 }}][number]" class="form-control"
                                            value="{{ $batch->number }}" placeholder="{{ __('Batch Number') }}" required>
                                        <input type="hidden" name="batches[{{ $index + 1 }}][id]" value="{{ $batch->id }}">
                                    </td>
                                    <td>
                                        <input type="date" name="batches[{{ $index + 1 }}][expiry_date]" class="form-control"
                                            value="{{ $batch->expiry_date }}" required>
                                    </td>
                                    <td>
                                        <input type="number" name="batches[{{ $index + 1 }}][quantity]" class="form-control"
                                            value="{{ $batch->quantity }}" placeholder="{{ __('Quantity') }}" required>
                                    </td>
                                    <td class="text-right">
                                        <button type="button" class="btn btn-sm btn-outline-danger remove-batch">
                                            {{ __('Remove') }}
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <button type="button" id="add_batch" class="btn btn-outline-dark mt-2">
                            {{ __('Add Batch') }}
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn inline-flex justify-center btn-dark mt-4 w-full">
                    {{ __('Update') }}
                </button>

                @push('scripts')
                <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
                <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
                <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

                <script>
                    $(document).ready(function() {
                        let variantCounter = `{{ $product->variants->count() ?? 0 }}`;
                        let batchCounter = `{{ $product->batches->count() ?? 0 }}`;

                        // Function to toggle input validation
                        function toggleInputValidation(sectionId, isRequired) {
                            $(`#${sectionId} input`).each(function() {
                                if (isRequired) {
                                    $(this).prop('required', true);
                                } else {
                                    $(this).prop('required', false);
                                }
                            });
                        }

                        // Checkbox change event
                        $('input[name="product_type[]"]').change(function() {
                            const isChecked = $(this).is(':checked');
                            const inputName = $(this).attr('id');

                            if (inputName === 'variant_checkbox') {
                                $('#variant_section').toggle(isChecked);
                                toggleInputValidation('variant_section', isChecked);

                                if (isChecked) {
                                    $('#batch_checkbox, label[for="batch_checkbox"]').hide();
                                    if ($('#variant_container').children().length === 0) {
                                        addVariantRow();
                                    }
                                } else {
                                    $('#batch_checkbox, label[for="batch_checkbox"]').show();
                                }
                            }

                            if (inputName === 'batch_checkbox') {
                                $('#batch_section').toggle(isChecked);
                                toggleInputValidation('batch_section', isChecked);

                                if (isChecked) {
                                    $('#variant_checkbox, label[for="variant_checkbox"]').hide();
                                    if ($('#batch_container').children().length === 0) {
                                        addBatchRow();
                                    }
                                } else {
                                    $('#variant_checkbox, label[for="variant_checkbox"]').show();
                                }
                            }
                        });

                        $('#add_variant').click(addVariantRow);
                        $('#add_batch').click(addBatchRow);

                        // Remove variant row
                        $(document).on('click', '.remove-variant', function() {
                            const row = $(this).closest('.variant-row');

                            // Append a hidden input to mark for deletion
                            const variantId = row.find('input[name$="[id]"]').val();
                            if (variantId) {
                                $('<input>')
                                    .attr('type', 'hidden')
                                    .attr('name', 'deleted_variants[]')
                                    .val(variantId)
                                    .appendTo(row);
                            }

                            row.remove();
                            updateVariantIndices();

                            if ($('#variant_container').children().length === 0) {
                                $('#variant_checkbox').prop('checked', false);
                                $('#variant_section').hide();
                            }
                        });

                        // Remove batch row
                        $(document).on('click', '.remove-batch', function() {
                            const row = $(this).closest('.batch-row');

                            const batchId = row.find('input[name$="[id]"]').val();
                            if (batchId) {
                                $('<input>')
                                    .attr('type', 'hidden')
                                    .attr('name', 'deleted_batches[]')
                                    .val(batchId)
                                    .appendTo(row);
                            }

                            row.remove();
                            updateBatchIndices();

                            if ($('#batch_container').children().length === 0) {
                                $('#batch_checkbox').prop('checked', false);
                                $('#batch_section').hide();
                            }
                        });

                        // Function to add variant row
                        function addVariantRow() {
                            variantCounter++;
                            const newRow = `
                <tr class="variant-row" data-index="${variantCounter}">
                    <td class="text-center">
                        <svg class="w-5 h-5 text-gray-500 cursor-move" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </td>
                    <td>
                        <input type="text" name="variants[${variantCounter}][name]" class="form-control" placeholder="{{ __('Variant Name') }}" required>
                    </td>
                    <td>
                        <input type="number" name="variants[${variantCounter}][additional_price]" class="form-control" placeholder="{{ __('Variant Price') }}" required>
                    </td>
                    <td>
                        <input type="number" name="variants[${variantCounter}][item_code]" class="form-control" placeholder="{{ __('Item Code') }}" required>
                    </td>
                    <td class="text-right">
                        <button type="button" class="btn btn-sm btn-outline-danger remove-variant">
                            {{ __('Remove') }}
                        </button>
                    </td>
                </tr>
            `;

                            $('#variant_container').append(newRow);
                            updateVariantIndices();
                        }

                        // Function to add batch row
                        function addBatchRow() {
                            batchCounter++;
                            const newRow = `
                <tr class="batch-row" data-index="${batchCounter}">
                    <td class="text-center">
                        <svg class="w-5 h-5 text-gray-500 cursor-move" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </td>
                    <td>
                        <input type="text" name="batches[${batchCounter}][number]" class="form-control" placeholder="{{ __('Batch Number') }}" required>
                    </td>
                    <td>
                        <input type="date" name="batches[${batchCounter}][expiry_date]" class="form-control" required>
                    </td>
                    <td>
                        <input type="number" name="batches[${batchCounter}][quantity]" class="form-control" placeholder="{{ __('Quantity') }}" required>
                    </td>
                    <td class="text-right">
                        <button type="button" class="btn btn-sm btn-outline-danger remove-batch">
                            {{ __('Remove') }}
                        </button>
                    </td>
                </tr>
            `;

                            $('#batch_container').append(newRow);
                            updateBatchIndices();
                        }

                        // Update variant indices
                        function updateVariantIndices() {
                            $('#variant_container .variant-row').each(function(index) {
                                const newIndex = index + 1;
                                $(this).attr('data-index', newIndex);
                                $(this).find('input').each(function() {
                                    const name = $(this).attr('name').replace(/\[\d+\]/, `[${newIndex}]`);
                                    $(this).attr('name', name);
                                });
                            });
                        }

                        // Update batch indices
                        function updateBatchIndices() {
                            $('#batch_container .batch-row').each(function(index) {
                                const newIndex = index + 1;
                                $(this).attr('data-index', newIndex);
                                $(this).find('input').each(function() {
                                    const name = $(this).attr('name').replace(/\[\d+\]/, `[${newIndex}]`);
                                    $(this).attr('name', name);
                                });
                            });
                        }
                    });
                </script>
                @endpush
</x-app-layout>