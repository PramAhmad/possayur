<x-app-layout>
    <div>
        {{-- Breadcrumb start --}}
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>
        {{-- Breadcrumb end --}}

        @if (session('message'))
        <x-alert :message="session('message')" :type="'success'" />
        @endif
        {{-- Edit outlet form start --}}
        <form method="POST" action="{{ route('outlets.update', $outlet) }}" class="max-w-4xl m-auto" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="bg-white dark:bg-slate-800 rounded-md p-5 pb-6">
                <div class="grid sm:grid-cols-1 gap-x-8 gap-y-4">
                    {{-- Name input --}}
                    <div class="input-area">
                        <label for="name" class="form-label">{{ __('Outlet Name') }}</label>
                        <input name="name" type="text" id="name" class="form-control"
                            placeholder="{{ __('Enter outlet name') }}" 
                            value="{{ old('name', $outlet->name) }}" required>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>

                    {{-- Address input --}}
                    <div class="input-area">
                        <label for="address" class="form-label">{{ __('Address') }}</label>
                        <input name="address" type="text" id="address" class="form-control"
                            placeholder="{{ __('Enter address') }}" 
                            value="{{ old('address', $outlet->address) }}" required>
                        <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                    </div>

                    {{-- Phone input --}}
                    <div class="input-area">
                        <label for="phone" class="form-label">{{ __('Phone') }}</label>
                        <input name="phone" type="text" id="phone" class="form-control"
                            placeholder="{{ __('Enter phone number') }}" 
                            value="{{ old('phone', $outlet->phone) }}" required>
                        <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
                    </div>

                    {{-- Description input --}}
                    <div class="input-area">
                        <label for="description" class="form-label">{{ __('Description') }}</label>
                        <textarea name="description" id="description" class="form-control"
                            placeholder="{{ __('Enter description') }}">{{ old('description', $outlet->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                    </div>

                    {{-- Logo input --}}
                    <div class="input-area">
                        <label for="logo" class="form-label">{{ __('Logo') }}</label>
                        <input name="logo" type="file" id="logo" class="form-control">
                        
                        @if($outlet->logo)
                            <div class="mt-2">
                                <p class="text-sm text-gray-600">{{ __('Current Logo:') }}</p>
                                <img src="{{ asset('upload/outlets/' . $outlet->logo) }}" 
                                alt="{{ $outlet->name }} Logo" 
                                class="h-20 w-20 object-cover rounded">

                            </div>
                        @endif
                        
                        <x-input-error :messages="$errors->get('logo')" class="mt-2"/>
                    </div>
                </div>
                
                <button type="submit" class="btn inline-flex justify-center btn-dark mt-4 w-full">
                    {{ __('Update') }}
                </button>
            </div>
        </form>
        {{-- Edit outlet form end --}}
    </div>
</x-app-layout>