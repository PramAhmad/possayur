<x-app-layout>
    <div>
        {{--Breadcrumb start--}}
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>
        {{--Breadcrumb end--}}
        <!-- if session succes -->
        @if (session('message'))
        <x-alert :message="session('message')" :type="'success'" />
        @endif

        {{--Create curency form start--}}
        <form method="POST" action="{{ route('curency.store') }}" class="max-w-4xl m-auto">
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
                               placeholder="{{ __('Enter curency name') }}" value="{{ old('name') }}" required>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>

                    {{-- symbol--}}
                    <div class="input-area">
                        <label for="symbol" class="form-label">{{ __('Symbol') }}</label>
                        <input name="symbol" type="text" id="symbol" class="form-control" 
                               placeholder="{{ __('Enter curency symbol') }}" value="{{ old('symbol') }}" required>
                        <x-input-error :messages="$errors->get('symbol')" class="mt-2"/>
                    </div>
                    <!-- code -->
                    <div class="input-area">
                        <label for="code" class="form-label">{{ __('Code') }}</label>
                        <input name="code" type="text" id="code" class="form-control" 
                               placeholder="{{ __('Enter curency code') }}" value="{{ old('code') }}" required>
                        <x-input-error :messages="$errors->get('code')" class="mt-2"/>
                    </div>
                    
                   

                </div>

                <button type="submit" class="btn inline-flex justify-center btn-dark mt-4 w-full">
                    {{ __('Save') }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>