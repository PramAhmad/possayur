<x-app-layout>
    <div>
        {{--Breadcrumb start--}}
        <div class="mb-6">
            {{--BreadCrumb--}}
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>
        {{--Breadcrumb end--}}

        {{--Create product form start--}}
        <form method="POST" action="{{ route('product.store') }}" class="max-w-4xl m-auto" enctype="multipart/form-data">
            @csrf
            <div class="bg-white dark:bg-slate-800 rounded-md p-5 pb-6">

                <div class="grid sm:grid-cols-2 gap-x-8 gap-y-4">

                    {{--Outlet select--}}
                    <div class="input-area">
                        <label for="outlet_id" class="form-label">{{ __('Outlet') }}</label>
                        <select name="outlet_id" id="outlet_id" class="form-control">
                            <option value="">{{ __('Select Outlet') }}</option>
                            @foreach ($outlets as $outlet)
                                <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('outlet_id')" class="mt-2"/>
                    </div>

                    {{--Name input--}}
                    <div class="input-area">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input name="name" type="text" id="name" class="form-control" 
                               placeholder="{{ __('Enter product name') }}" value="{{ old('name') }}" required>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>

                    {{--Barcode input--}}
                    <div class="input-area">
                        <label for="barcode" class="form-label">{{ __('Barcode') }}</label>
                        <input name="barcode" type="text" id="barcode" class="form-control"
                               placeholder="{{ __('Enter barcode') }}" value="{{ old('barcode') }}" required>
                        <x-input-error :messages="$errors->get('barcode')" class="mt-2"/>
                    </div>

                    {{--Slug input--}}
                    <div class="input-area">
                        <label for="slug" class="form-label">{{ __('Slug') }}</label>
                        <input name="slug" type="text" id="slug" class="form-control"
                               placeholder="{{ __('Enter slug') }}" value="{{ old('slug') }}" required>
                        <x-input-error :messages="$errors->get('slug')" class="mt-2"/>
                    </div>

                    {{--Cost price input--}}
                    <div class="input-area">
                        <label for="cost_price" class="form-label">{{ __('Cost Price') }}</label>
                        <input name="cost_price" type="number" id="cost_price" class="form-control"
                               placeholder="{{ __('Enter cost price') }}" value="{{ old('cost_price') }}" required>
                        <x-input-error :messages="$errors->get('cost_price')" class="mt-2"/>
                    </div>

                    {{--Selling price input--}}
                    <div class="input-area">
                        <label for="selling_price" class="form-label">{{ __('Selling Price') }}</label>
                        <input name="selling_price" type="number" id="selling_price" class="form-control"
                               placeholder="{{ __('Enter selling price') }}" value="{{ old('selling_price') }}" required>
                        <x-input-error :messages="$errors->get('selling_price')" class="mt-2"/>
                    </div>

                    {{--Quantity input--}}
                    <div class="input-area">
                        <label for="qty" class="form-label">{{ __('Quantity') }}</label>
                        <input name="qty" type="number" id="qty" class="form-control"
                               placeholder="{{ __('Enter quantity') }}" value="{{ old('qty') }}" required>
                        <x-input-error :messages="$errors->get('qty')" class="mt-2"/>
                    </div>

                    {{--Alert quantity input--}}
                    <div class="input-area">
                        <label for="alert_qty" class="form-label">{{ __('Alert Quantity') }}</label>
                        <input name="alert_qty" type="number" id="alert_qty" class="form-control"
                               placeholder="{{ __('Enter alert quantity') }}" value="{{ old('alert_qty') }}" required>
                        <x-input-error :messages="$errors->get('alert_qty')" class="mt-2"/>
                    </div>

                    {{--SKU input--}}
                    <div class="input-area">
                        <label for="sku" class="form-label">{{ __('SKU') }}</label>
                        <input name="sku" type="text" id="sku" class="form-control"
                               placeholder="{{ __('Enter SKU') }}" value="{{ old('sku') }}" required>
                        <x-input-error :messages="$errors->get('sku')" class="mt-2"/>
                    </div>

                    <div class="input-area">
                        <label for="image" class="form-label">{{ __('Image') }}</label>
                        <input name="image" type="file" id="image" class="form-control">
                        <x-input-error :messages="$errors->get('image')" class="mt-2"/>
                    </div>

                    <div class="input-area">
                        <label for="description" class="form-label">{{ __('Description') }}</label>
                        <textarea name="description" id="description" class="form-control"
                                  placeholder="{{ __('Enter description') }}">{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                    </div>

                   

                    <div class="input-area">
                        <label for="category_id" class="form-label">{{ __('Category') }}</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">{{ __('Select Category') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2"/>
                    </div>

                    <div class="input-area">
                        <label for="brand_id" class="form-label">{{ __('Brand') }}</label>
                        <select name="brand_id" id="brand_id" class="form-control" >
                            <option value="">{{ __('Select Brand') }}</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('brand_id')" class="mt-2"/>
                    </div>
                </div>
                <div class="grid grid-cols-3 mt-4   ">
                <div class="input-area">
                        <label for="is_variant" class="form-label">{{ __('Is Variant') }}</label>
                        <input type="checkbox" name="is_variant" id="is_variant" value="1"
                               class="form-control-checkbox" {{ old('is_variant') ? 'checked' : '' }}>
                        <x-input-error :messages="$errors->get('is_variant')" class="mt-2"/>
                    </div>

                    <div id="variant_fields" style="display: none;">
                        <div class="input-area">
                            <label for="variant_name" class="form-label">{{ __('Variant Name') }}</label>
                            <input name="variant_name" type="text" id="variant_name" class="form-control"
                                   placeholder="{{ __('Enter variant name') }}">
                        </div>

                        <div class="input-area">
                            <label for="variant_price" class="form-label">{{ __('Variant Price') }}</label>
                            <input name="variant_price" type="number" id="variant_price" class="form-control"
                                   placeholder="{{ __('Enter variant price') }}">
                        </div>
                    </div>

                    <div class="input-area">
                        <label for="is_batch" class="form-label">{{ __('Is Batch') }}</label>
                        <input type="checkbox" name="is_batch" id="is_batch" value="1"
                               class="form-control-checkbox" {{ old('is_batch') ? 'checked' : '' }}>
                        <x-input-error :messages="$errors->get('is_batch')" class="mt-2"/>
                    </div>

                    <div id="batch_fields" style="display: none;">
                        <div class="input-area">
                            <label for="batch_number" class="form-label">{{ __('Batch Number') }}</label>
                            <input name="batch_number" type="text" id="batch_number" class="form-control"
                                   placeholder="{{ __('Enter batch number') }}">
                        </div>

                        <div class="input-area">
                            <label for="batch_expiry" class="form-label">{{ __('Batch Expiry Date') }}</label>
                            <input name="batch_expiry" type="date" id="batch_expiry" class="form-control">
                        </div>
                    </div>


                 
                    <div class="input-area">
                        <label for="is_active" class="form-label">{{ __('Is Active') }}</label>
                        <select name="is_active" id="is_active" class="form-control">
                            <option value="0">{{ __('Inactive') }}</option>
                            <option value="1">{{ __('Active') }}</option>
                        </select>
                        <x-input-error :messages="$errors->get('is_active')" class="mt-2"/>
                    </div>
                </div>
                <button type="submit" class="btn inline-flex justify-center btn-dark mt-4 w-full">
                    {{ __('Save') }}
                </button>
            </div>
        </form>
    </div>
   <!-- dyanimic input jquery -->
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
