<x-app-layout>
    <div>
        {{--Breadcrumb start--}}
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>
        {{--Breadcrumb end--}}

        {{--Edit tax form start--}}
        <form method="POST" action="{{ route('tax.update', $tax->id) }}" class="max-w-4xl m-auto">
            @csrf
            @method('PUT')
            <div class="bg-white dark:bg-slate-800 rounded-md p-5 pb-6">

                <div class="grid sm:grid-cols-2 gap-x-8 gap-y-4">

                    {{--Outlet select--}}
                    <div class="input-area">
                        <label for="outlet_id" class="form-label">{{ __('Outlet') }}</label>
                        <select name="outlet_id" id="outlet_id" class="form-control">
                            <option value="">{{ __('Select Outlet') }}</option>
                            @foreach ($outlets as $outlet)
                                <option value="{{ $outlet->id }}" {{ $tax->outlet_id == $outlet->id ? 'selected' : '' }}>
                                    {{ $outlet->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('outlet_id')" class="mt-2"/>
                    </div>

                    {{--Name input--}}
                    <div class="input-area">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input name="name" type="text" id="name" class="form-control" 
                               placeholder="{{ __('Enter tax name') }}" value="{{ old('name', $tax->name) }}" required>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>

                    {{--Rate input--}}
                    <div class="input-area">
                        <label for="rate" class="form-label">{{ __('Rate (%)') }}</label>
                        <input name="rate" type="number" id="rate" class="form-control" 
                               placeholder="{{ __('Enter tax rate') }}" value="{{ old('rate', $tax->rate) }}" 
                               step="0.01" min="0" max="100" required>
                        <x-input-error :messages="$errors->get('rate')" class="mt-2"/>
                    </div>

                    {{--Status select--}}
                    <div class="input-area">
                        <label for="is_active" class="form-label">{{ __('Status') }}</label>
                        <select name="is_active" id="is_active" class="form-control">
                            <option value="0" {{ !$tax->is_active ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                            <option value="1" {{ $tax->is_active ? 'selected' : '' }}>{{ __('Active') }}</option>
                        </select>
                        <x-input-error :messages="$errors->get('is_active')" class="mt-2"/>
                    </div>
                </div>

                <button type="submit" class="btn inline-flex justify-center btn-dark mt-4 w-full">
                    {{ __('Update') }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>