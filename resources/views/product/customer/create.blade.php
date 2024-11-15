<x-app-layout>
    <div>
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('product.customer.store',['id'=>$id]) }}" class="max-w-4xl m-auto" enctype="multipart/form-data">
            @csrf
            
            <div class="bg-white dark:bg-slate-800 rounded-md p-5 pb-6">
                <input type="hidden" name="product_id" value="{{ $id }}">
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
                        <label for="customer_id" class="form-label">{{ __('Customer') }}</label>
                        <select name="customer_id" id="customer_id" class="form-control" required>
                            <option value="">{{ __('Select Customer') }}</option>
                            @foreach ($customer as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('customer_id')" class="mt-2" />
                    </div>
                    <div class="input-area">
                        <label for="start_date" class="form-label">{{ __('Start Date') }}</label>
                        <input name="start_date" type="date" id="start_date" class="form-control"
                            placeholder="{{ __('Enter start date') }}" value="{{ old('start_date') }}" required>
                        <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                    </div>
                    <div class="input-area">
                        <label for="end_date" class="form-label">{{ __('End Date') }}</label>
                        <input name="end_date" type="date" id="end_date" class="form-control"
                            placeholder="{{ __('Enter end date') }}" value="{{ old('end_date') }}" required>
                        <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                    </div>
                </div>
                <div class="grid sm:grid-cols-1 gap-x-8 gap-y-4 mt-3">
                    <div class="input-area">
                        <label for="price" class="form-label">{{ __('Price') }}</label>
                        <input name="price" type="number" id="price" class="form-control" placeholder="{{ __('Enter price') }}"
                            value="{{ old('price') }}" required>
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
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
        $(document).ready(function() {
            $('#is_variant').change(function() {
                if ($(this).is(':checked')) {
                    $('#variant_fields').show();
                } else {
                    $('#variant_fields').hide();
                }
            });

            $('#is_batch').change(function() {
                if ($(this).is(':checked')) {
                    $('#batch_fields').show();
                } else {
                    $('#batch_fields').hide();
                }
            });
        });
    </script>

</x-app-layout>