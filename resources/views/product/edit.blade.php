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
                                <div id="variant_fields" style="display: {{ $product->is_variant ? 'block' : 'none' }};" class="space-y-4">
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
                            <div class="input-area">
                                <div class="flex items-center gap-2 mb-4">
                                    <input type="checkbox" name="is_batch" id="is_batch" value="1"
                                           class="w-4 h-4 rounded border-slate-400"
                                           {{ $product->is_batch ? 'checked' : '' }}>
                                    <label for="is_batch" class="form-label mb-0">{{ __('Is Batch') }}</label>
                                </div>
                                <div id="batch_fields" style="display: {{ $product->is_batch ? 'block' : 'none' }};" class="space-y-4">
                                    <div class="input-area">
                                        <label for="batch_number" class="form-label">{{ __('Batch Number') }}</label>
                                        <input name="batch_number" type="text" id="batch_number" class="form-control"
                                               placeholder="{{ __('Enter batch number') }}"
                                               value="{{ old('batch_number', $product->batch_number ?? '-') }}">
                                    </div>
                                    <div class="input-area">
                                        <label for="batch_expiry" class="form-label">{{ __('Batch Expiry Date') }}</label>
                                        <input name="batch_expiry" type="date" id="batch_expiry" class="form-control"
                                               value="{{ old('batch_expiry', $product->batch_expiry ?? '-') }}">
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
                    </div>
                </div>
                <button type="submit" class="btn inline-flex justify-center btn-dark mt-4 w-full">
                    {{ __('Update') }}
                </button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#is_variant').change(function () {
                if ($(this).is(':checked')) {
                    $('#variant_fields').show();
                } else {
                    $('#variant_fields').hide();
                }
            });

            $('#is_batch').change(function () {
                if ($(this).is(':checked')) {
                    $('#batch_fields').show();
                } else {
                    $('#batch_fields').hide();
                }
            });
        });
    </script>
</x-app-layout>