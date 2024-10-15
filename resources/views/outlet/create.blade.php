<x-app-layout>
    <div>
        {{--Breadcrumb start--}}
        <div class="mb-6">
            {{--BreadCrumb--}}
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>
        {{--Breadcrumb end--}}

        {{--Create outlet form start--}}
        <form method="POST" action="{{ route('outlets.store') }}" class="max-w-4xl m-auto" enctype="multipart/form-data">
            @csrf
            <div class="bg-white dark:bg-slate-800 rounded-md p-5 pb-6">

                <div class="grid sm:grid-cols-1 gap-x-8 gap-y-4">

                    {{--Name input--}}
                    <div class="input-area">
                        <label for="name" class="form-label">{{ __('Outlet Name') }}</label>
                        <input name="name" type="text" id="name" class="form-control"
                               placeholder="{{ __('Enter outlet name') }}" value="{{ old('name') }}" required>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>

                    {{--Address input--}}
                    <div class="input-area">
                        <label for="address" class="form-label">{{ __('Address') }}</label>
                        <input name="address" type="text" id="address" class="form-control"
                               placeholder="{{ __('Enter address') }}" value="{{ old('address') }}" required>
                        <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                    </div>

                    {{--Phone input--}}
                    <div class="input-area">
                        <label for="phone" class="form-label">{{ __('Phone') }}</label>
                        <input name="phone" type="text" id="phone" class="form-control"
                               placeholder="{{ __('Enter phone number') }}" value="{{ old('phone') }}" required>
                        <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
                    </div>

                    {{--Description input--}}
                    <div class="input-area">
                        <label for="description" class="form-label">{{ __('Description') }}</label>
                        <textarea name="description" id="description" class="form-control" 
                                  placeholder="{{ __('Enter description') }}">{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                    </div>

                    {{--Logo input--}}
                    <div class="input-area">
                        <label for="logo" class="form-label">{{ __('Logo') }}</label>
                        <input name="logo" type="file" id="logo" class="form-control">
                        <x-input-error :messages="$errors->get('logo')" class="mt-2"/>
                    </div>
                </div>

                <button type="submit" class="btn inline-flex justify-center btn-dark mt-4 w-full">
                    {{ __('Save') }}
                </button>
            </div>
        </form>
        {{--Create outlet form end--}}
    </div>
</x-app-layout>
