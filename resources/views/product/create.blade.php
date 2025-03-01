<x-app-layout>
    @push('styles')
        <style>
            .select2-container{box-sizing:border-box;display:inline-block;margin:0;position:relative;vertical-align:middle}.select2-container .select2-selection--single{box-sizing:border-box;cursor:pointer;display:block;height:28px;user-select:none;-webkit-user-select:none}.select2-container .select2-selection--single .select2-selection__rendered{display:block;padding-left:8px;padding-right:20px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.select2-container .select2-selection--single .select2-selection__clear{background-color:transparent;border:none;font-size:1em}.select2-container[dir="rtl"] .select2-selection--single .select2-selection__rendered{padding-right:8px;padding-left:20px}.select2-container .select2-selection--multiple{box-sizing:border-box;cursor:pointer;display:block;min-height:32px;user-select:none;-webkit-user-select:none}.select2-container .select2-selection--multiple .select2-selection__rendered{display:inline;list-style:none;padding:0}.select2-container .select2-selection--multiple .select2-selection__clear{background-color:transparent;border:none;font-size:1em}.select2-container .select2-search--inline .select2-search__field{box-sizing:border-box;border:none;font-size:100%;margin-top:5px;margin-left:5px;padding:0;max-width:100%;resize:none;height:18px;vertical-align:bottom;font-family:sans-serif;overflow:hidden;word-break:keep-all}.select2-container .select2-search--inline .select2-search__field::-webkit-search-cancel-button{-webkit-appearance:none}.select2-dropdown{background-color:white;border:1px solid #aaa;border-radius:4px;box-sizing:border-box;display:block;position:absolute;left:-100000px;width:100%;z-index:1051}.select2-results{display:block}.select2-results__options{list-style:none;margin:0;padding:0}.select2-results__option{padding:6px;user-select:none;-webkit-user-select:none}.select2-results__option--selectable{cursor:pointer}.select2-container--open .select2-dropdown{left:0}.select2-container--open .select2-dropdown--above{border-bottom:none;border-bottom-left-radius:0;border-bottom-right-radius:0}.select2-container--open .select2-dropdown--below{border-top:none;border-top-left-radius:0;border-top-right-radius:0}.select2-search--dropdown{display:block;padding:4px}.select2-search--dropdown .select2-search__field{padding:4px;width:100%;box-sizing:border-box}.select2-search--dropdown .select2-search__field::-webkit-search-cancel-button{-webkit-appearance:none}.select2-search--dropdown.select2-search--hide{display:none}.select2-close-mask{border:0;margin:0;padding:0;display:block;position:fixed;left:0;top:0;min-height:100%;min-width:100%;height:auto;width:auto;opacity:0;z-index:99;background-color:#fff;filter:alpha(opacity=0)}.select2-hidden-accessible{border:0 !important;clip:rect(0 0 0 0) !important;-webkit-clip-path:inset(50%) !important;clip-path:inset(50%) !important;height:1px !important;overflow:hidden !important;padding:0 !important;position:absolute !important;width:1px !important;white-space:nowrap !important}.select2-container--default .select2-selection--single{background-color:#fff;border:1px solid #aaa;border-radius:4px}.select2-container--default .select2-selection--single .select2-selection__rendered{color:#444;line-height:28px}.select2-container--default .select2-selection--single .select2-selection__clear{cursor:pointer;float:right;font-weight:bold;height:26px;margin-right:20px;padding-right:0px}.select2-container--default .select2-selection--single .select2-selection__placeholder{color:#999}.select2-container--default .select2-selection--single .select2-selection__arrow{height:26px;position:absolute;top:1px;right:1px;width:20px}.select2-container--default .select2-selection--single .select2-selection__arrow b{border-color:#888 transparent transparent transparent;border-style:solid;border-width:5px 4px 0 4px;height:0;left:50%;margin-left:-4px;margin-top:-2px;position:absolute;top:50%;width:0}.select2-container--default[dir="rtl"] .select2-selection--single .select2-selection__clear{float:left}.select2-container--default[dir="rtl"] .select2-selection--single .select2-selection__arrow{left:1px;right:auto}.select2-container--default.select2-container--disabled .select2-selection--single{background-color:#eee;cursor:default}.select2-container--default.select2-container--disabled .select2-selection--single .select2-selection__clear{display:none}.select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b{border-color:transparent transparent #888 transparent;border-width:0 4px 5px 4px}.select2-container--default .select2-selection--multiple{background-color:white;border:1px solid #aaa;border-radius:4px;cursor:text;padding-bottom:5px;padding-right:5px;position:relative}.select2-container--default .select2-selection--multiple.select2-selection--clearable{padding-right:25px}.select2-container--default .select2-selection--multiple .select2-selection__clear{cursor:pointer;font-weight:bold;height:20px;margin-right:10px;margin-top:5px;position:absolute;right:0;padding:1px}.select2-container--default .select2-selection--multiple .select2-selection__choice{background-color:#e4e4e4;border:1px solid #aaa;border-radius:4px;box-sizing:border-box;display:inline-block;margin-left:5px;margin-top:5px;padding:0;padding-left:20px;position:relative;max-width:100%;overflow:hidden;text-overflow:ellipsis;vertical-align:bottom;white-space:nowrap}.select2-container--default .select2-selection--multiple .select2-selection__choice__display{cursor:default;padding-left:2px;padding-right:5px}.select2-container--default .select2-selection--multiple .select2-selection__choice__remove{background-color:transparent;border:none;border-right:1px solid #aaa;border-top-left-radius:4px;border-bottom-left-radius:4px;color:#999;cursor:pointer;font-size:1em;font-weight:bold;padding:0 4px;position:absolute;left:0;top:0}.select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover,.select2-container--default .select2-selection--multiple .select2-selection__choice__remove:focus{background-color:#f1f1f1;color:#333;outline:none}.select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__choice{margin-left:5px;margin-right:auto}.select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__choice__display{padding-left:5px;padding-right:2px}.select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__choice__remove{border-left:1px solid #aaa;border-right:none;border-top-left-radius:0;border-bottom-left-radius:0;border-top-right-radius:4px;border-bottom-right-radius:4px}.select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__clear{float:left;margin-left:10px;margin-right:auto}.select2-container--default.select2-container--focus .select2-selection--multiple{border:solid black 1px;outline:0}.select2-container--default.select2-container--disabled .select2-selection--multiple{background-color:#eee;cursor:default}.select2-container--default.select2-container--disabled .select2-selection__choice__remove{display:none}.select2-container--default.select2-container--open.select2-container--above .select2-selection--single,.select2-container--default.select2-container--open.select2-container--above .select2-selection--multiple{border-top-left-radius:0;border-top-right-radius:0}.select2-container--default.select2-container--open.select2-container--below .select2-selection--single,.select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple{border-bottom-left-radius:0;border-bottom-right-radius:0}.select2-container--default .select2-search--dropdown .select2-search__field{border:1px solid #aaa}.select2-container--default .select2-search--inline .select2-search__field{background:transparent;border:none;outline:0;box-shadow:none;-webkit-appearance:textfield}.select2-container--default .select2-results>.select2-results__options{max-height:200px;overflow-y:auto}.select2-container--default .select2-results__option .select2-results__option{padding-left:1em}.select2-container--default .select2-results__option .select2-results__option .select2-results__group{padding-left:0}.select2-container--default .select2-results__option .select2-results__option .select2-results__option{margin-left:-1em;padding-left:2em}.select2-container--default .select2-results__option .select2-results__option .select2-results__option .select2-results__option{margin-left:-2em;padding-left:3em}.select2-container--default .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option{margin-left:-3em;padding-left:4em}.select2-container--default .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option{margin-left:-4em;padding-left:5em}.select2-container--default .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option .select2-results__option{margin-left:-5em;padding-left:6em}.select2-container--default .select2-results__option--group{padding:0}.select2-container--default .select2-results__option--disabled{color:#999}.select2-container--default .select2-results__option--selected{background-color:#ddd}.select2-container--default .select2-results__option--highlighted.select2-results__option--selectable{background-color:#5897fb;color:white}.select2-container--default .select2-results__group{cursor:default;display:block;padding:6px}.select2-container--classic .select2-selection--single{background-color:#f7f7f7;border:1px solid #aaa;border-radius:4px;outline:0;background-image:-webkit-linear-gradient(top, #fff 50%, #eee 100%);background-image:-o-linear-gradient(top, #fff 50%, #eee 100%);background-image:linear-gradient(to bottom, #fff 50%, #eee 100%);background-repeat:repeat-x;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFFFFFFF', endColorstr='#FFEEEEEE', GradientType=0)}.select2-container--classic .select2-selection--single:focus{border:1px solid #5897fb}.select2-container--classic .select2-selection--single .select2-selection__rendered{color:#444;line-height:28px}.select2-container--classic .select2-selection--single .select2-selection__clear{cursor:pointer;float:right;font-weight:bold;height:26px;margin-right:20px}.select2-container--classic .select2-selection--single .select2-selection__placeholder{color:#999}.select2-container--classic .select2-selection--single .select2-selection__arrow{background-color:#ddd;border:none;border-left:1px solid #aaa;border-top-right-radius:4px;border-bottom-right-radius:4px;height:26px;position:absolute;top:1px;right:1px;width:20px;background-image:-webkit-linear-gradient(top, #eee 50%, #ccc 100%);background-image:-o-linear-gradient(top, #eee 50%, #ccc 100%);background-image:linear-gradient(to bottom, #eee 50%, #ccc 100%);background-repeat:repeat-x;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFEEEEEE', endColorstr='#FFCCCCCC', GradientType=0)}.select2-container--classic .select2-selection--single .select2-selection__arrow b{border-color:#888 transparent transparent transparent;border-style:solid;border-width:5px 4px 0 4px;height:0;left:50%;margin-left:-4px;margin-top:-2px;position:absolute;top:50%;width:0}.select2-container--classic[dir="rtl"] .select2-selection--single .select2-selection__clear{float:left}.select2-container--classic[dir="rtl"] .select2-selection--single .select2-selection__arrow{border:none;border-right:1px solid #aaa;border-radius:0;border-top-left-radius:4px;border-bottom-left-radius:4px;left:1px;right:auto}.select2-container--classic.select2-container--open .select2-selection--single{border:1px solid #5897fb}.select2-container--classic.select2-container--open .select2-selection--single .select2-selection__arrow{background:transparent;border:none}.select2-container--classic.select2-container--open .select2-selection--single .select2-selection__arrow b{border-color:transparent transparent #888 transparent;border-width:0 4px 5px 4px}.select2-container--classic.select2-container--open.select2-container--above .select2-selection--single{border-top:none;border-top-left-radius:0;border-top-right-radius:0;background-image:-webkit-linear-gradient(top, #fff 0%, #eee 50%);background-image:-o-linear-gradient(top, #fff 0%, #eee 50%);background-image:linear-gradient(to bottom, #fff 0%, #eee 50%);background-repeat:repeat-x;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFFFFFFF', endColorstr='#FFEEEEEE', GradientType=0)}.select2-container--classic.select2-container--open.select2-container--below .select2-selection--single{border-bottom:none;border-bottom-left-radius:0;border-bottom-right-radius:0;background-image:-webkit-linear-gradient(top, #eee 50%, #fff 100%);background-image:-o-linear-gradient(top, #eee 50%, #fff 100%);background-image:linear-gradient(to bottom, #eee 50%, #fff 100%);background-repeat:repeat-x;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFEEEEEE', endColorstr='#FFFFFFFF', GradientType=0)}.select2-container--classic .select2-selection--multiple{background-color:white;border:1px solid #aaa;border-radius:4px;cursor:text;outline:0;padding-bottom:5px;padding-right:5px}.select2-container--classic .select2-selection--multiple:focus{border:1px solid #5897fb}.select2-container--classic .select2-selection--multiple .select2-selection__clear{display:none}.select2-container--classic .select2-selection--multiple .select2-selection__choice{background-color:#e4e4e4;border:1px solid #aaa;border-radius:4px;display:inline-block;margin-left:5px;margin-top:5px;padding:0}.select2-container--classic .select2-selection--multiple .select2-selection__choice__display{cursor:default;padding-left:2px;padding-right:5px}.select2-container--classic .select2-selection--multiple .select2-selection__choice__remove{background-color:transparent;border:none;border-top-left-radius:4px;border-bottom-left-radius:4px;color:#888;cursor:pointer;font-size:1em;font-weight:bold;padding:0 4px}.select2-container--classic .select2-selection--multiple .select2-selection__choice__remove:hover{color:#555;outline:none}.select2-container--classic[dir="rtl"] .select2-selection--multiple .select2-selection__choice{margin-left:5px;margin-right:auto}.select2-container--classic[dir="rtl"] .select2-selection--multiple .select2-selection__choice__display{padding-left:5px;padding-right:2px}.select2-container--classic[dir="rtl"] .select2-selection--multiple .select2-selection__choice__remove{border-top-left-radius:0;border-bottom-left-radius:0;border-top-right-radius:4px;border-bottom-right-radius:4px}.select2-container--classic.select2-container--open .select2-selection--multiple{border:1px solid #5897fb}.select2-container--classic.select2-container--open.select2-container--above .select2-selection--multiple{border-top:none;border-top-left-radius:0;border-top-right-radius:0}.select2-container--classic.select2-container--open.select2-container--below .select2-selection--multiple{border-bottom:none;border-bottom-left-radius:0;border-bottom-right-radius:0}.select2-container--classic .select2-search--dropdown .select2-search__field{border:1px solid #aaa;outline:0}.select2-container--classic .select2-search--inline .select2-search__field{outline:0;box-shadow:none}.select2-container--classic .select2-dropdown{background-color:#fff;border:1px solid transparent}.select2-container--classic .select2-dropdown--above{border-bottom:none}.select2-container--classic .select2-dropdown--below{border-top:none}.select2-container--classic .select2-results>.select2-results__options{max-height:200px;overflow-y:auto}.select2-container--classic .select2-results__option--group{padding:0}.select2-container--classic .select2-results__option--disabled{color:grey}.select2-container--classic .select2-results__option--highlighted.select2-results__option--selectable{background-color:#3875d7;color:#fff}.select2-container--classic .select2-results__group{cursor:default;display:block;padding:6px}.select2-container--classic.select2-container--open .select2-dropdown{border-color:#5897fb}
        </style>
    @endpush
    <div>
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>
        <form method="POST" action="{{ route('product.store') }}" class="max-w-7xl m-auto" enctype="multipart/form-data">
            @csrf
            <div class="bg-white dark:bg-slate-800 rounded-md p-5 pb-6">
                <div class="grid sm:grid-cols-2 gap-x-8 gap-y-4">
                    <div class="input-area">
                        <label for="outlet_id" class="form-label">{{ __('Outlet') }}</label>
                        <select name="outlet_id" id="outlet_id" class="form-control">
                            <option value="">{{ __('Select Outlet') }}</option>
                            @foreach ($outlets as $outlet)
                            <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('outlet_id')" class="mt-2" />
                    </div>
                    <div class="input-area">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input name="name" type="text" id="name" class="form-control"
                            placeholder="{{ __('Enter product name') }}" value="{{ old('name') }}" required>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="input-area">
                        <label for="barcode" class="form-label">{{ __('Barcode') }}</label>
                        <input name="barcode" type="text" id="barcode" class="form-control"
                            placeholder="{{ __('Enter barcode') }}" value="{{ old('barcode') }}" required>
                        <x-input-error :messages="$errors->get('barcode')" class="mt-2" />
                    </div>
                    <div class="input-area">
                        <label for="slug" class="form-label">{{ __('Slug') }}</label>
                        <input name="slug" type="text" id="slug" class="form-control"
                            placeholder="{{ __('Enter slug') }}" value="{{ old('slug') }}" required>
                        <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                    </div>
                    <div class="input-area">
                        <label for="cost_price" class="form-label">{{ __('Cost Price') }}</label>
                        <input name="cost_price" type="text" id="cost_price" class="form-control"
                            placeholder="{{ __('Enter cost price') }}" value="{{ old('cost_price') }}" required>
                        <x-input-error :messages="$errors->get('cost_price')" class="mt-2" />
                    </div>

                    <div class="input-area">
                        <label for="selling_price" class="form-label">{{ __('Selling Price') }}</label>
                        <input name="selling_price" type="text" id="selling_price" class="form-control"
                            placeholder="{{ __('Enter selling price') }}" value="{{ old('selling_price') }}" required>
                        <x-input-error :messages="$errors->get('selling_price')" class="mt-2" />
                    </div>

                    <div class="input-area">
                        <label for="qty" class="form-label">{{ __('Quantity') }}</label>
                        <input name="qty" type="text" id="qty" class="form-control"
                            placeholder="{{ __('Enter quantity') }}" value="{{ old('qty') }}" required>
                        <x-input-error :messages="$errors->get('qty')" class="mt-2" />
                    </div>

                    <div class="input-area">
                        <label for="alert_qty" class="form-label">{{ __('Alert Quantity') }}</label>
                        <input name="alert_qty" type="text" id="alert_qty" class="form-control"
                            placeholder="{{ __('Enter alert quantity') }}" value="{{ old('alert_qty') }}" required>
                        <x-input-error :messages="$errors->get('alert_qty')" class="mt-2" />
                    </div>

                    <div class="input-area">
                        <label for="sku" class="form-label">{{ __('SKU') }}</label>
                        <input name="sku" type="text" id="sku" class="form-control"
                            placeholder="{{ __('Enter SKU') }}" value="{{ old('sku') }}" required>
                        <x-input-error :messages="$errors->get('sku')" class="mt-2" />
                    </div>

                    <div class="input-area">
                        <label for="image" class="form-label">{{ __('Image') }}</label>
                        <input name="image" type="file" id="image" class="form-control">
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div class="input-area">
                        <label for="description" class="form-label">{{ __('Description') }}</label>
                        <textarea name="description" id="description" class="form-control"
                            placeholder="{{ __('Enter description') }}">{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    <div class="input-area">
                        <label for="category_id" class="form-label">{{ __('Category') }}</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">{{ __('Select Category') }}</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>

                    <div class="input-area">
                        <label for="brand_id" class="form-label">{{ __('Brand') }}</label>
                        <select name="brand_id" id="brand_id" class="form-control">
                            <option value="">{{ __('Select Brand') }}</option>
                            @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('brand_id')" class="mt-2" />
                    </div>
                    <div class="input-area">
                        <label for="unit_id" class="form-label">{{ __('Unit') }}</label>
                        <select name="unit_id" id="unit_id" class=" form-control w-full">
                            <option value="">{{ __('Select Brand') }}</option>
                            @foreach ($unit as $u)
                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('unit_id')" class="mt-2" />
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-x-8 gap-y-4">
                    <div class="sm:col-span-2">

                        <div class="input-area">
                            <label for="is_active" class="form-label">{{ __('Status') }}</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="0">{{ __('Inactive') }}</option>
                                <option value="1">{{ __('Active') }}</option>
                            </select>
                            <x-input-error :messages="$errors->get('is_active')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <!-- Variants and Batch Section -->
                <div class="mt-6 bg-slate-50 dark:bg-slate-700 rounded-lg p-4">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="flex items-center gap-2 input-variant">
                            <input type="checkbox" name="product_type[]" id="variant_checkbox" value="variant" class="w-4 h-4 rounded border-slate-400">
                            <label for="variant_checkbox" class="form-label mb-0">{{ __('Variants') }}</label>
                        </div>
                        <div class="flex items-center gap-2 input-batch">
                            <input type="checkbox" name="product_type[]" id="batch_checkbox" value="batch" class="w-4 h-4 rounded border-slate-400">
                            <label for="batch_checkbox" class="form-label mb-0">{{ __('Batch') }}</label>
                        </div>
                    </div>

                    <!-- Variant Section -->
                    <div id="variant_section" style="display: none;">
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
                            </tbody>
                        </table>
                        <button type="button" id="add_variant" class="btn btn-outline-dark mt-2">
                            {{ __('Add Variant') }}
                        </button>
                    </div>

                    <div id="batch_section" style="display: none;">
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
                            </tbody>
                        </table>
                        <button type="button" id="add_batch" class="btn btn-outline-dark mt-2">
                            {{ __('Add Batch') }}
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn inline-flex justify-center btn-dark mt-4 w-full">
                    {{ __('Save') }}
                </button>
                @push('scripts')
             
                <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>

                <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
                <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
                <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
                <script>
        document.getElementById('name').addEventListener('input', function() {
            let slug = this.value.toLowerCase()
                .replace(/[^a-z0-9-]/g, '-')
                .replace(/-+/g, '-')
                .replace(/^-|-$/g, '');
            document.getElementById('slug').value = slug;
        });
    </script>

<script>
 
    $(document).ready(function() {
        let variantCounter = 0;
        let batchCounter = 0;
        new Cleave('#barcode', {
            delimiter: '-',
            blocks: [4, 4, 4, 4],
            uppercase: true
        });

        new Cleave('#cost_price', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand',
            numeralDecimalScale: 2,
            numeralPositiveOnly: true
        });

        new Cleave('#selling_price', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand',
            numeralDecimalScale: 2,
            numeralPositiveOnly: true
        });

        new Cleave('#sku', {
            delimiter: '-',
            blocks: [3, 3, 4],
            uppercase: true
        });

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

        // Handle product type checkboxes
        $('input[name="product_type[]"]').change(function() {
            const isChecked = $(this).is(':checked');
            const inputName = $(this).attr('id'); 

            if (inputName === 'variant_checkbox') {
                $('#variant_section').toggle(isChecked);
                toggleInputValidation('variant_section', isChecked);

                if (isChecked) {
                    // Add hidden field to indicate variant exists
                    if (!$('input[name="is_variant"]').length) {
                        $('form').append('<input type="hidden" name="is_variant" value="1">');
                    }
                    
                    $('#batch_checkbox, label[for="batch_checkbox"]').hide();
                    if ($('#variant_container').children().length === 0) {
                        addVariantRow();
                    }
                } else {
                    // Remove hidden field when unchecked
                    $('input[name="is_variant"]').remove();
                    $('#batch_checkbox, label[for="batch_checkbox"]').show();
                }
            }

            if (inputName === 'batch_checkbox') {
                $('#batch_section').toggle(isChecked);
                toggleInputValidation('batch_section', isChecked);

                if (isChecked) {
                    // Add hidden field to indicate batch exists
                    if (!$('input[name="is_batch"]').length) {
                        $('form').append('<input type="hidden" name="is_batch" value="1">');
                    }
                    
                    $('#variant_checkbox, label[for="variant_checkbox"]').hide();
                    if ($('#batch_container').children().length === 0) {
                        addBatchRow();
                    }
                } else {
                    // Remove hidden field when unchecked
                    $('input[name="is_batch"]').remove();
                    $('#variant_checkbox, label[for="variant_checkbox"]').show();
                }
            }
        });

        $('#add_variant').click(addVariantRow);
        $('#add_batch').click(addBatchRow);

        $(document).on('click', '.remove-variant', function() {
            $(this).closest('.variant-row').remove();
            updateVariantIndices();

            // Hide section if no variants exist
            if ($('#variant_container').children().length === 0) {
                $('#variant_checkbox').prop('checked', false);
                $('#variant_section').hide();
                $('input[name="is_variant"]').remove();
            }
        });

        $(document).on('click', '.remove-batch', function() {
            $(this).closest('.batch-row').remove();
            updateBatchIndices();

            // Hide section if no batches exist
            if ($('#batch_container').children().length === 0) {
                $('#batch_checkbox').prop('checked', false);
                $('#batch_section').hide();
                $('input[name="is_batch"]').remove();
            }
        });

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
                    <input type="text" name="variants[${variantCounter}][additional_price]" class="form-control variant-price" placeholder="{{ __('Variant Price') }}" required>
                </td>
                <td>
                    <input type="text" name="variants[${variantCounter}][item_code]" class="form-control variant-code" placeholder="{{ __('Item Code') }}" required>
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
            
            // Apply Cleave.js to the new variant price and code
            $('.variant-price').last().each(function() {
                new Cleave(this, {
                    numeral: true,
                    numeralThousandsGroupStyle: 'thousand',
                    numeralDecimalScale: 2,
                    numeralPositiveOnly: true
                });
            });
            
            $('.variant-code').last().each(function() {
                new Cleave(this, {
                    delimiter: '-',
                    blocks: [2, 4, 2],
                    uppercase: true
                });
            });
        }

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
                    <input type="text" name="batches[${batchCounter}][number]" class="form-control batch-number" placeholder="{{ __('Batch Number') }}" required>
                </td>
                <td>
                    <input type="date" name="batches[${batchCounter}][expiry_date]" class="form-control" required>
                </td>
                <td>
                    <input type="number" name="batches[${batchCounter}][quantity]" class="form-control batch-quantity" placeholder="{{ __('Quantity') }}" required>
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
            
            // Apply Cleave.js to the new batch number
            $('.batch-number').last().each(function() {
                new Cleave(this, {
                    delimiter: '-',
                    blocks: [3, 3, 3],
                    uppercase: true
                });
            });
            
            $('.batch-quantity').last().each(function() {
                new Cleave(this, {
                    numeral: true,
                    numeralPositiveOnly: true,
                    numeralDecimalScale: 0
                });
            });
        }

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
        
        // Make the variant and batch containers sortable
        $("#variant_container, #batch_container").sortable({
            handle: "svg",
            update: function(event, ui) {
                if ($(this).attr('id') === 'variant_container') {
                    updateVariantIndices();
                } else {
                    updateBatchIndices();
                }
            }
        });
        
        // Initialize slug generator
        document.getElementById('name').addEventListener('input', function() {
            let slug = this.value.toLowerCase()
                .replace(/[^a-z0-9-]/g, '-')
                .replace(/-+/g, '-')
                .replace(/^-|-$/g, '');
            document.getElementById('slug').value = slug;
        });
    });
</script>

                @endpush

</x-app-layout>