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

        {{--Create tax form start--}}
        <div class="card-text  h-full">

            <form method="POST" action="{{ route('tax.store') }}" class="">
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
                                   placeholder="{{ __('Enter tax name') }}" value="{{ old('name') }}" required>
                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>
    
                        {{--Rate input--}}
                        <div class="input-area">
                            <label for="rate" class="form-label">{{ __('Rate (%)') }}</label>
                            <input name="rate" type="number" id="rate" class="form-control" 
                                   placeholder="{{ __('Enter tax rate') }}" value="{{ old('rate') }}" 
                                   step="0.01" min="0" max="100" required>
                            <x-input-error :messages="$errors->get('rate')" class="mt-2"/>
                        </div>
    
                    </div>
    
                    <button type="submit" class="btn  btn-dark mt-3">Submit</button>
                            <!-- kembali -->
                            <a href="{{ route('tax.index') }}" class="btn py-3 btn-outline-dark mt-3">Back</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>