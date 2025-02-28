<x-app-layout>
    <div>
        {{--Breadcrumb start--}}
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>
        {{--Breadcrumb end--}}
        @if (session('message'))
            <x-alert :message="session('message')" :type="'success'" />
        @endif
        {{--Create category form start--}}
        <div class="card-text h-full">

            <form method="POST" action="{{ route('category.store') }}" class="" enctype="multipart/form-data">
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
                                   placeholder="{{ __('Enter category name') }}" value="{{ old('name') }}" required>
                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>
    
                        {{--Slug input--}}
                        <div class="input-area">
                            <label for="slug" class="form-label">{{ __('Slug') }}</label>
                            <input name="slug" type="text" id="slug" class="form-control"
                                   placeholder="{{ __('Enter slug') }}" value="{{ old('slug') }}" required>
                            <x-input-error :messages="$errors->get('slug')" class="mt-2"/>
                        </div>
    
                        {{--Image input--}}
                        <div class="input-area">
                            <label for="image" class="form-label">{{ __('Image') }}</label>
                            <input name="image" type="file" id="image" class="form-control">
                            <x-input-error :messages="$errors->get('image')" class="mt-2"/>
                        </div>
    
                        {{--Description textarea--}}
                        <div class="input-area sm:col-span-2">
                            <label for="description" class="form-label">{{ __('Description') }}</label>
                            <textarea name="description" id="description" class="form-control"
                                      placeholder="{{ __('Enter description') }}">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                        </div>
    
                        {{--User input (hidden)--}}
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
    
                        {{--Status select--}}
                        <div class="input-area">
                            <label for="is_active" class="form-label">{{ __('Status') }}</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="0">{{ __('Inactive') }}</option>
                                <option value="1" selected>{{ __('Active') }}</option>
                            </select>
                            <x-input-error :messages="$errors->get('is_active')" class="mt-2"/>
                        </div>
                    </div>
    
                  
                <button type="submit" class="btn  btn-dark mt-3">Submit</button>
                            <a href="{{ route('category.index') }}" class="btn py-3 btn-outline-dark mt-3">Back</a>
                </div>
            </form>
        </div>
    </div>

    {{--Auto generate slug from name--}}
    <script>
        document.getElementById('name').addEventListener('input', function() {
            let slug = this.value.toLowerCase()
                .replace(/[^a-z0-9-]/g, '-')
                .replace(/-+/g, '-')
                .replace(/^-|-$/g, '');
            document.getElementById('slug').value = slug;
        });
    </script>
</x-app-layout>