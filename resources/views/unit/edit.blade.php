<x-app-layout>
    <div>
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>

        <form method="POST" action="{{ route('unit.update', $unit->id) }}" class="max-w-4xl m-auto">
            @csrf
            @method('PUT')
            <div class="bg-white dark:bg-slate-800 rounded-md p-5 pb-6">
                <div class="grid sm:grid-cols-2 gap-x-8 gap-y-4">
                    <div class="input-area">
                        <label for="outlet_id" class="form-label">{{ __('Outlet') }}</label>
                        <select name="outlet_id" id="outlet_id" class="form-control">
                            <option value="">{{ __('Select Outlet') }}</option>
                            @foreach ($outlets as $outlet)
                                <option value="{{ $outlet->id }}" {{ $unit->outlet_id == $outlet->id ? 'selected' : '' }}>
                                    {{ $outlet->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('outlet_id')" class="mt-2"/>
                    </div>
                    <div class="input-area">
                        <label for="code" class="form-label">{{ __('Code') }}</label>
                        <input name="code" type="text" id="code" class="form-control"
                               placeholder="{{ __('Enter unit code') }}" value="{{ old('code', $unit->code) }}" required>
                        <x-input-error :messages="$errors->get('code')" class="mt-2"/>
                    </div>
                    <div class="input-area">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input name="name" type="text" id="name" class="form-control"
                               placeholder="{{ __('Enter unit name') }}" value="{{ old('name', $unit->name) }}" required>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>
                    <div class="input-area">
                        <label for="base_unit" class="form-label">{{ __('Base Unit') }}</label>
                        <input name="base_unit" type="text" id="base_unit" class="form-control"
                               placeholder="{{ __('Enter base unit') }}" value="{{ old('base_unit', $unit->base_unit) }}" required>
                        <x-input-error :messages="$errors->get('base_unit')" class="mt-2"/>
                    </div>
                    <div class="input-area">
                        <label for="operator" class="form-label">{{ __('Operator') }}</label>
                        <select name="operator" id="operator" class="form-control" required>
                            <option value="">{{ __('Select Operator') }}</option>
                            <option value="*" {{ $unit->operator == '*' ? 'selected' : '' }}>{{ __('Multiply (*)') }}</option>
                            <option value="/" {{ $unit->operator == '/' ? 'selected' : '' }}>{{ __('Divide (/)') }}</option>
                            <option value="+" {{ $unit->operator == '+' ? 'selected' : '' }}>{{ __('Add (+)') }}</option>
                            <option value="-" {{ $unit->operator == '-' ? 'selected' : '' }}>{{ __('Subtract (-)') }}</option>
                        </select>
                        <x-input-error :messages="$errors->get('operator')" class="mt-2"/>
                    </div>
                    <div class="input-area">
                        <label for="operation_value" class="form-label">{{ __('Operation Value') }}</label>
                        <input name="operation_value" type="text" id="operation_value" class="form-control"
                               placeholder="{{ __('Enter operation value') }}" value="{{ old('operation_value', $unit->operation_value) }}" required>
                        <x-input-error :messages="$errors->get('operation_value')" class="mt-2"/>
                    </div>
                    <div class="input-area">
                        <label for="is_active" class="form-label">{{ __('Status') }}</label>
                        <select name="is_active" id="is_active" class="form-control">
                            <option value="0" {{ $unit->is_active == 0 ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                            <option value="1" {{ $unit->is_active == 1 ? 'selected' : '' }}>{{ __('Active') }}</option>
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
