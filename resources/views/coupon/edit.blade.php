<x-app-layout>
    <div>
        {{-- Breadcrumb start --}}
        <div class="mb-6">
            {{-- BreadCrumb --}}
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>
        {{-- Breadcrumb end --}}

        {{-- Edit coupon form start --}} 
         <div class="card-text h-full">

            <form method="POST" action="{{ route('coupon.store') }}" class="">
            @csrf
            @method('PUT')
            <div class="bg-white dark:bg-slate-800 rounded-md p-5 pb-6">

                <div class="grid sm:grid-cols-2 gap-x-8 gap-y-4">

                    {{-- Outlet select --}}
                    <div class="input-area">
                        <label for="outlet_id" class="form-label">{{ __('Outlet') }}</label>
                        <select name="outlet_id" id="outlet_id" class="form-control">
                            <option value="">{{ __('Select Outlet') }}</option>
                            @foreach ($outlets as $outlet)
                                <option value="{{ $outlet->id }}" {{ $coupon->outlet_id == $outlet->id ? 'selected' : '' }}>
                                    {{ $outlet->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('outlet_id')" class="mt-2"/>
                    </div>

                    {{-- Code input --}}
                    <div class="input-area">
                        <label for="code" class="form-label">{{ __('Coupon Code') }}</label>
                        <input name="code" type="text" id="code" class="form-control" 
                               placeholder="{{ __('Enter coupon code') }}" value="{{ old('code', $coupon->code) }}" required>
                        <x-input-error :messages="$errors->get('code')" class="mt-2"/>
                    </div>

                    {{-- Type select --}}
                    <div class="input-area">
                        <label for="type" class="form-label">{{ __('Type') }}</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="fixed" {{ $coupon->type == 'fixed' ? 'selected' : '' }}>{{ __('Fixed Amount') }}</option>
                            <option value="percentage" {{ $coupon->type == 'percentage' ? 'selected' : '' }}>{{ __('Percentage') }}</option>
                        </select>
                        <x-input-error :messages="$errors->get('type')" class="mt-2"/>
                    </div>

                    {{-- Amount input --}}
                    <div class="input-area">
                        <label for="amount" class="form-label">{{ __('Amount') }}</label>
                        <input name="amount" type="text" id="amount" class="form-control"
                               placeholder="{{ __('Enter amount') }}" value="{{ old('amount', $coupon->amount) }}" required>
                        <x-input-error :messages="$errors->get('amount')" class="mt-2"/>
                    </div>

                    {{-- Minimum amount input --}}
                    <div class="input-area">
                        <label for="min_amount" class="form-label">{{ __('Minimum Amount') }}</label>
                        <input name="min_amount" type="text" id="min_amount" class="form-control"
                               placeholder="{{ __('Enter minimum amount') }}" value="{{ old('min_amount', $coupon->min_amount) }}" required>
                        <x-input-error :messages="$errors->get('min_amount')" class="mt-2"/>
                    </div>

                    {{-- Quantity input --}}
                    <div class="input-area">
                        <label for="qty" class="form-label">{{ __('Quantity') }}</label>
                        <input name="qty" type="text" id="qty" class="form-control"
                               placeholder="{{ __('Enter quantity') }}" value="{{ old('qty', $coupon->qty) }}" required>
                        <x-input-error :messages="$errors->get('qty')" class="mt-2"/>
                    </div>

                    {{-- Expiry date input --}}
                    <div class="input-area">
                        <label for="exp_date" class="form-label">{{ __('Expiry Date') }}</label>
                        <input name="exp_date" type="date" id="exp_date" class="form-control"
                               value="{{ old('exp_date', $coupon->exp_date) }}" required>
                        <x-input-error :messages="$errors->get('exp_date')" class="mt-2"/>
                    </div>

                    {{-- User input (hidden) --}}
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                    {{-- Status select --}}
                    <div class="input-area">
                        <label for="is_active" class="form-label">{{ __('Status') }}</label>
                        <select name="is_active" id="is_active" class="form-control">
                            <option value="0" {{ $coupon->is_active == 0 ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                            <option value="1" {{ $coupon->is_active == 1 ? 'selected' : '' }}>{{ __('Active') }}</option>
                        </select>
                        <x-input-error :messages="$errors->get('is_active')" class="mt-2"/>
                    </div>
                </div>

            
                <button type="submit" class="btn  btn-dark mt-3">Submit</button>
                            <a href="{{ route('coupon.index') }}" class="btn py-3 btn-outline-dark mt-3">Back</a>
            </div>
        </form>
        </div>
    </div>
    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
    <script>
        new Cleave('#amount', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });

        new Cleave('#min_amount', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });

        new Cleave('#qty', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
    </script>
        
    @endpush
</x-app-layout>
