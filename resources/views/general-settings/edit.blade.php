<x-app-layout>
    <div class="space-y-8">
        <div>
            <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" />
        </div>



        {{--Alert--}}
        @if (session('message') && session('type'))
            <x-alert :message="session('message')" :type="session('type')"/>
        @endif

        <div class="rounded-md overflow-hidden mt-6">
            <div class="bg-white dark:bg-slate-800 px-5 py-7">
                <h3 class="text-lg font-medium mb-5">Feature Settings</h3>
                
                <div class="grid md:grid-cols-2 xl:grid-cols-2 gap-7">
                    <div class="generalSettings" x-data="{open : false}" x-ref="Features">
                        <div class="generalSettingsCardHead">
                            <h4 class="generalSettingsCardTitle">
                                {{ __('Features Surat Jalan') }}
                            </h4>
                            <button type="button" onclick="collapsedCard('Features')">
                                <iconify-icon icon="ic:round-keyboard-arrow-up"
                                            class="generalSettingsCardIconFeatures transition-all duration-300 text-3xl dark:text-white">
                                </iconify-icon>
                            </button>
                        </div>
                        
                        <div class="settingBox" id="settingBoxFeatures">
                            <form class="space-y-5" method="POST" action="{{ route('general-settings.features') }}">
                                @csrf
                                @method('PUT')

                                <div class="flex items-center justify-between p-4 border border-slate-200 dark:border-slate-700 rounded-md">
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Enable or disable the delivery note feature</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="ENABLE_SURAT_JALAN" value="true" class="sr-only peer" 
                                            {{ env('ENABLE_SURAT_JALAN') == true ? 'checked' : '' }}>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 
                                            dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 
                                            peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] 
                                            after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 
                                            after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 
                                            peer-checked:bg-blue-600"></div>
                                    </label>
                                </div>

                                <button class="defaultButton submitButton btn btn-dark" type="submit">
                                    {{ __('Save Feature Settings') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-8">
            <div class="overflow-hidden rounded-md">
                <form class="bg-white dark:bg-slate-800 px-7 py-7 "
                action="{{ route('general-settings.logo') }}"
                method="POST"
                enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-3 ">
                        <div class="imageUploadCard">
                            <div class="imageUploadCardHeader">
                                <h3 class="">{{ __('Logo') }}</h3>
                            </div>
                            <div class="cardBody">
                                <img id="logoPreview"
                                    class="mx-auto h-36 w-36 rounded-md"
                                    src="{{ $logoDetails['logoSrc'] }}"
                                    alt="logo">
                                <div class="relative">
                                    <input type="file"
                                        name="logo"
                                        class="defaultButton absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer"
                                        onchange="imagePreview(event, 'logoPreview')"/>
                                    <label class="btn btn-dark !static defaultButton inline-block">
                                        {{ __('Choose') }}
                                    </label>
                                </div>
                                <x-input-error :messages="$errors->get('logo')" class="mt-2"/>
                            </div>
                        </div>
                        <div class="imageUploadCard">
                            <div class="imageUploadCardHeader">
                                <h3>{{ __('Favicon') }}</h3>
                            </div>
                            <div class="cardBody">
                                <div class="h-36 w-36 mx-auto rounded-md flex items-center justify-center">
                                    <img id="faviconPreview"
                                        src="{{ $logoDetails['faviconSrc'] }}"
                                        alt="dark_logo">
                                </div>
                                <div class="relative">
                                    <input type="file"
                                        name="favicon"
                                        class="defaultButton absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer"
                                        onchange="imagePreview(event, 'faviconPreview')"/>
                                    <label class="btn btn-dark !static defaultButton inline-block">
                                        {{ __('Choose') }}
                                    </label>
                                </div>
                                <x-input-error :messages="$errors->get('favicon')" class="mt-2"/>
                            </div>
                        </div>
                        <div class="imageUploadCard">
                            <div class="imageUploadCardHeader">
                                <h3>{{ __('Dark Logo') }}</h3>
                            </div>
                            <div class="cardBody">
                                <img id="darkLogoPreview"
                                    class="mx-auto h-36 w-36 rounded-md"
                                    src="{{ $logoDetails['darkLogoSrc'] }}"
                                    alt="dark_logo">
                                <div class="relative">
                                    <input type="file"
                                        name="dark_logo"
                                        class="defaultButton absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer"
                                        onchange="imagePreview(event, 'darkLogoPreview')"/>
                                    <label class="btn btn-dark !static defaultButton inline-block">
                                        {{ __('Choose') }}
                                    </label>
                                </div>
                                <x-input-error :messages="$errors->get('dark_logo')" class="mt-2"/>
                            </div>
                        </div>
                        <div class="imageUploadCard">
                            <div class="imageUploadCardHeader">
                                <h3>{{ __('Guest Logo') }}</h3>
                            </div>
                            <div class="cardBody">
                                <img id="guestLogoPreview"
                                    class="mx-auto h-36 w-36 rounded-md"
                                    src="{{ $logoDetails['guestLogoSrc'] }}"
                                    alt="guest_logo">
                                <div class="relative">
                                    <input type="file"
                                        name="guest_logo"
                                        class="defaultButton absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer"
                                        onchange="imagePreview(event, 'guestLogoPreview')"/>
                                    <label class="btn btn-dark !static defaultButton inline-block">
                                        {{ __('Choose') }}
                                    </label>
                                </div>
                                <x-input-error :messages="$errors->get('guest_logo')" class="mt-2"/>
                            </div>
                        </div>
                        <div class="imageUploadCard">
                            <div class="imageUploadCardHeader">
                                <h3>{{ __('Guest Background') }}</h3>
                            </div>
                            <div class="cardBody">
                                <img id="guestBackgroundPreview"
                                    class="mx-auto h-36 w-36 rounded-md"
                                    src="{{ $logoDetails['guestBackgroundSrc'] }}"
                                    alt="guest_background">
                                <div class="relative">
                                    <input type="file"
                                        name="guest_background"
                                        class="defaultButton absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer"
                                        onchange="imagePreview(event, 'guestBackgroundPreview')"/>
                                    <label class="btn btn-dark !static defaultButton inline-block">
                                        {{ __('Choose') }}
                                    </label>
                                </div>
                                <x-input-error :messages="$errors->get('guest_background')" class="mt-2"/>
                            </div>
                        </div>
                    </div>
                    <button class="defaultButton btn btn-dark submitButton ml-auto mt-8" type="submit">
                        {{ __('Save Changes') }}
                    </button>
                </form>
            </div>
            <!-- General Settings Card -->
            <div class="rounded-md overflow-hidden">
                <div class="bg-white dark:bg-slate-800 px-5 py-7">
                    <div class="grid md:grid-cols-2 xl:grid-cols-2 gap-7">
                        @foreach($envDetails as $key => $value)
                            {{-- settings card --}}
                            <div class="generalSettings"
                                x-data="{open : false}"
                                x-ref="list1">
                                {{-- Header --}}
                                <div class="generalSettingsCardHead">
                                    <h4 class="generalSettingsCardTitle">
                                        {{ $key }}
                                    </h4>
                                    <button type="button" onclick="collapsedCard(`{{ $key }}`)">
                                        <iconify-icon icon="ic:round-keyboard-arrow-up"
                                                    class="generalSettingsCardIcon{{$key}} transition-all duration-300 text-3xl dark:text-white" >
                                        </iconify-icon>
                                    </button>
                                </div>
                                {{-- Body --}}
                                <div class="settingBox"
                                    id="settingBox{{ $key }}">
                                    <form class="space-y-5 sdc"
                                        method="POST"
                                        action="{{ route('general-settings.update') }}">
                                        @csrf
                                        @method('PUT')

                                        @foreach($value as $item)
                                            <div class="input-group">
                                                <label for="{{ $item['key'] }}"
                                                    class="font-medium text-sm text-textColor mb-2 inline-block">
                                                    {{ $item['key'] }}
                                                </label>
                                                <input type="text"
                                                    name="{{ $item['key'] }}"
                                                    id="{{ $item['key'] }}"
                                                    class="w-full border border-slate-300 bg-[#FBFBFB] py-[10px] px-4 outline-none focus:outline-none focus:ring-0 focus:border-[#000000] shadow-none !rounded-md text-base text-black overflow=hidden read-only:cursor-not-allowed read-only:bg-slate-200"
                                                    value="{{ $item['data']['value'] }}"
                                                    placeholder="{{ $item['key'] }}">
                                            </div>
                                        @endforeach
                                        <button class="defaultButton submitButton btn btn-dark" type="submit">
                                            {{ __('Save Changes') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Feature Toggles Section -->
          
            {{-- kasih note true for enabled surat jalan "false" untuk disabled surat jalan --}}
            <h2 
                class="text-lg font-semibold text-textColor dark:text-white">
                {{ __('Note') }}
            </h2>
            <p class="text-sm text-textColor dark:text-white">
                {{ __('If you want to enable the delivery note, please set the value to "true" and if disabled set to "false"') }}
            </p>
        </div>
    </div>
    @push('scripts')
        <script>

            // IMAGE PREVIEW
            let imagePreview = function (event, id) {
                let output = document.getElementById(id);
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function () {
                    URL.revokeObjectURL(output.src) // free memory
                }
            };

            // COLLPASED CARD
            function collapsedCard(key){
                $('#settingBox'+key).toggleClass('hideContent');
                $('.generalSettingsCardIcon'+key).toggleClass('rotate-icon');
            }

        </script>
    @endpush
</x-app-layout>
