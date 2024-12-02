<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" class="light nav-floating">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-favicon />
    <title>{{ config('app.name', 'dashcode') }}</title>

    @vite(['resources/css/app.scss', 'resources/js/custom/store.js'])
    @stack('styles')
</head>

<body class="font-inter dashcode-app" id="body_class">
    <div class="app-wrapper">

        <!-- BEGIN: Sidebar Navigation -->
        <x-sidebar-menu />
        <!-- End: Sidebar -->

        <!-- BEGIN: Settings -->
        <x-dashboard-settings />
        <!-- End: Settings -->

        <div class="flex flex-col justify-between min-h-screen">
            <div>
                <!-- BEGIN: header -->
                <x-dashboard-header />
                <!-- BEGIN: header -->

                <div class="content-wrapper transition-all duration-150 ltr:ml-0 xl:ltr:ml-[248px] rtl:mr-0 xl:rtl:mr-[248px]" id="content_wrapper">
                    <div class="page-content">
                        <div class="transition-all duration-150 container-fluid" id="page_layout">
                            <main id="content_layout">
                                <!-- Page Content -->
                                {{ $slot }}
                            </main>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BEGIN: footer -->
            <x-dashboard-footer />
            <!-- BEGIN: footer -->

        </div>
    </div>

    @vite(['resources/js/app.js', 'resources/js/main.js'])
    <!-- jqurey cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- data tables cdn -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.0.2/cleave.min.js" integrity="sha512-SvgzybymTn9KvnNGu0HxXiGoNeOi0TTK7viiG0EGn2Qbeu/NFi3JdWrJs2JHiGA1Lph+dxiDv5F9gDlcgBzjfA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    @stack('scripts')
</body>

</html>