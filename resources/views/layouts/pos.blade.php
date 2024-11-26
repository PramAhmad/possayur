<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind POS</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{asset('style.css')}}"> -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #cfd8dc;
            border-radius: 5px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #b0bec5;
            border-radius: 5px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #90a4ae;
        }

        .bg-sky-50,
        .hover\:bg-sky-50:hover {
            background-color: #e0f7fa;
        }

        .bg-sky-100,
        .hover\:bg-sky-100:hover {
            background-color: #b2ebf2;
        }

        .bg-sky-200,
        .hover\:bg-sky-200:hover {
            background-color: #80deea;
        }

        .bg-sky-300,
        .hover\:bg-sky-300:hover {
            background-color: #4dd0e1;
        }

        .bg-sky-400,
        .hover\:bg-sky-400:hover {
            background-color: #26c6da;
        }

        .bg-sky-500,
        .hover\:bg-sky-500:hover {
            background-color: #00bcd4;
        }

        .bg-sky-600,
        .hover\:bg-sky-600:hover {
            background-color: #00acc1;
        }

        .bg-sky-700,
        .hover\:bg-sky-700:hover {
            background-color: #0097a7;
        }

        .bg-sky-800,
        .hover\:bg-sky-800:hover {
            background-color: #00838f;
        }

        .bg-sky-900,
        .hover\:bg-sky-900:hover {
            background-color: #006064;
        }


        .text-sky-50,
        .hover\:text-sky-50:hover {
            color: #e0f7fa;
        }

        .text-sky-100,
        .hover\:text-sky-100:hover {
            color: #b2ebf2;
        }

        .text-sky-200,
        .hover\:text-sky-200:hover {
            color: #80deea;
        }

        .text-sky-300,
        .hover\:text-sky-300:hover {
            color: #4dd0e1;
        }

        .text-sky-400,
        .hover\:text-sky-400:hover {
            color: #26c6da;
        }

        .text-sky-500,
        .hover\:text-sky-500:hover {
            color: #00bcd4;
        }

        .text-sky-600,
        .hover\:text-sky-600:hover {
            color: #00acc1;
        }

        .text-sky-700,
        .hover\:text-sky-700:hover {
            color: #0097a7;
        }

        .text-sky-800,
        .hover\:text-sky-800:hover {
            color: #00838f;
        }

        .text-sky-900,
        .hover\:text-sky-900:hover {
            color: #006064;
        }

        .bg-blue-gray-50,
        .hover\:bg-blue-gray-50:hover {
            background-color: #eceff1;
        }

        .bg-blue-gray-100,
        .hover\:bg-blue-gray-100:hover {
            background-color: #cfd8dc;
        }

        .bg-blue-gray-200,
        .hover\:bg-blue-gray-200:hover {
            background-color: #b0bec5;
        }

        .bg-blue-gray-300,
        .hover\:bg-blue-gray-300:hover {
            background-color: #90a4ae;
        }

        .bg-blue-gray-400,
        .hover\:bg-blue-gray-400:hover {
            background-color: #78909c;
        }

        .bg-blue-gray-500,
        .hover\:bg-blue-gray-500:hover {
            background-color: #607d8b;
        }

        .bg-blue-gray-600,
        .hover\:bg-blue-gray-600:hover {
            background-color: #546e7a;
        }

        .bg-blue-gray-700,
        .hover\:bg-blue-gray-700:hover {
            background-color: #455a64;
        }

        .bg-blue-gray-800,
        .hover\:bg-blue-gray-800:hover {
            background-color: #37474f;
        }

        .bg-blue-gray-900,
        .hover\:bg-blue-gray-900:hover {
            background-color: #263238;
        }

        .text-blue-gray-50,
        .hover\:text-blue-gray-50:hover {
            color: #eceff1;
        }

        .text-blue-gray-100,
        .hover\:text-blue-gray-100:hover {
            color: #cfd8dc;
        }

        .text-blue-gray-200,
        .hover\:text-blue-gray-200:hover {
            color: #b0bec5;
        }

        .text-blue-gray-300,
        .hover\:text-blue-gray-300:hover {
            color: #90a4ae;
        }

        .text-blue-gray-400,
        .hover\:text-blue-gray-400:hover {
            color: #78909c;
        }

        .text-blue-gray-500,
        .hover\:text-blue-gray-500:hover {
            color: #607d8b;
        }

        .text-blue-gray-600,
        .hover\:text-blue-gray-600:hover {
            color: #546e7a;
        }

        .text-blue-gray-700,
        .hover\:text-blue-gray-700:hover {
            color: #455a64;
        }

        .text-blue-gray-800,
        .hover\:text-blue-gray-800:hover {
            color: #37474f;
        }

        .text-blue-gray-900,
        .hover\:text-blue-gray-900:hover {
            color: #263238;
        }

        .bg-teal-50,
        .hover\:bg-teal-50:hover {
            background-color: #e0f2f1;
        }

        .bg-teal-100,
        .hover\:bg-teal-100:hover {
            background-color: #b2dfdb;
        }

        .bg-teal-200,
        .hover\:bg-teal-200:hover {
            background-color: #80cbc4;
        }

        .bg-teal-300,
        .hover\:bg-teal-300:hover {
            background-color: #4db6ac;
        }

        .bg-teal-400,
        .hover\:bg-teal-400:hover {
            background-color: #26a69a;
        }

        .bg-teal-500,
        .hover\:bg-teal-500:hover {
            background-color: #009688;
        }

        .bg-teal-600,
        .hover\:bg-teal-600:hover {
            background-color: #00897b;
        }

        .bg-teal-700,
        .hover\:bg-teal-700:hover {
            background-color: #00796b;
        }

        .bg-teal-800,
        .hover\:bg-teal-800:hover {
            background-color: #00695c;
        }

        .bg-teal-900,
        .hover\:bg-teal-900:hover {
            background-color: #0f172a;
        }

        .text-teal-50,
        .hover\:text-teal-50:hover {
            color: #e0f2f1;
        }

        .text-teal-100,
        .hover\:text-teal-100:hover {
            color: #b2dfdb;
        }

        .text-teal-200,
        .hover\:text-teal-200:hover {
            color: #80cbc4;
        }

        .text-teal-300,
        .hover\:text-teal-300:hover {
            color: #4db6ac;
        }

        .text-teal-400,
        .hover\:text-teal-400:hover {
            color: #26a69a;
        }

        .text-teal-500,
        .hover\:text-teal-500:hover {
            color: #009688;
        }

        .text-teal-600,
        .hover\:text-teal-600:hover {
            color: #00897b;
        }

        .text-teal-700,
        .hover\:text-teal-700:hover {
            color: #334155;
        }

        .text-teal-800,
        .hover\:text-teal-800:hover {
            color: #1f2937;
        }

        .text-teal-900,
        .hover\:text-teal-900:hover {
            color: #0f172a;
        }

        .nowrap {
            white-space: nowrap;
        }

        .glass {
            background-color: rgba(100, 120, 130, .6);
            backdrop-filter: blur(10px);
        }

        table td {
            vertical-align: top;
        }

        #receipt-content {
            max-height: 70vh;
        }

        @media print {
            .hide-print {
                display: none !important;
            }

            .print-area {
                display: block;
            }
        }
    </style>
    <style>
        @media (max-width: 1024px) {
            .nav-menu {
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
            }

            .nav-menu.active {
                transform: translateX(0);
            }
        }
    </style>
</head>

<body class="bg-blue-gray-50 ">
    <!-- noprint-area -->
    <div class="hide-print flex flex-row h-screen antialiased text-blue-gray-800">
        <!-- left sidebar -->
        <button id="nav-toggle" class="lg:hidden fixed top-4 left-4 z-50 p-2 rounded-lg bg-sky-500 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="toggle-open h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="toggle-close hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Navigation Menu -->
        <div class="nav-menu fixed lg:relative top-0 left-0 h-full z-40">
            <div class="flex flex-col items-center h-screen py-4 flex-shrink-0 w-20 bg-sky-500">
                <!-- Logo -->
                <a href="#" class="flex items-center justify-center h-12 w-12 md:mt-0 mt-20 bg-sky-50 text-sky-700 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32.623 32.605" class="w-8 h-8">
                        <path d="M15.612 0c-.36.003-.705.01-1.03.021C8.657.223 5.742 1.123 3.4 3.472.714 6.166-.145 9.758.019 17.607c.137 6.52.965 9.271 3.542 11.768 1.31 1.269 2.658 2 4.73 2.57.846.232 2.73.547 3.56.596.36.021 2.336.048 4.392.06 3.162.018 4.031-.016 5.63-.221 3.915-.504 6.43-1.778 8.234-4.173 1.806-2.396 2.514-5.731 2.516-11.846.001-4.407-.42-7.59-1.278-9.643-1.463-3.501-4.183-5.53-8.394-6.258-1.634-.283-4.823-.475-7.339-.46z" fill="#fff" />
                        <path d="M16.202 13.758c-.056 0-.11 0-.16.003-.926.031-1.38.172-1.747.538-.42.421-.553.982-.528 2.208.022 1.018.151 1.447.553 1.837.205.198.415.313.739.402.132.036.426.085.556.093.056.003.365.007.686.009.494.003.63-.002.879-.035.611-.078 1.004-.277 1.286-.651.282-.374.392-.895.393-1.85 0-.688-.066-1.185-.2-1.506-.228-.547-.653-.864-1.31-.977a7.91 7.91 0 00-1.147-.072z" fill="#00dace" />
                    </svg>
                </a>

                <!-- Navigation Links -->
                <ul class="flex flex-col space-y-2 mt-12">
                    <li>
                        <a href="{{ route('pos.show', ['id' => $id]) }}" class="flex items-center">
                            <span class="flex items-center justify-center h-12 w-12 rounded-2xl   hover:bg-sky-400
                     {{ request()->routeIs('pos.show') ? 'bg-sky-300 shadow-lg text-white ' : 'text-sky-100' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('salesorder.index', ['id' => $id]) }}" class="flex items-center">
                            <span class="flex items-center justify-center h-12 w-12 rounded-2xl 
                     {{ request()->routeIs('salesorder.index') ? 'bg-sky-300 shadow-lg text-white ' : 'text-sky-100' }}  hover:bg-sky-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </span>
                        </a>
                    </li>


                    <li>
                        <a href="#"
                            class="flex items-center">
                            <span class="flex items-center justify-center text-sky-100 hover:bg-sky-400 h-12 w-12 rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.index')}}"
                            class="flex items-center">
                            <span class="flex items-center justify-center text-sky-100 hover:bg-sky-400 h-12 w-12 rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>

                            </span>
                        </a>
                    </li>
                </ul>

                <!-- Info Link -->
                <a href="#" class="mt-auto flex items-center justify-center text-sky-200 hover:text-sky-100 h-10 w-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>

        @yield('content')
    </div>

    <div id="print-area" class="print-area"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#nav-toggle').click(function() {
                $('.nav-menu').toggleClass('active');
                $('.toggle-open').toggleClass('hidden');
                $('.toggle-close').toggleClass('hidden');
            });

            // Close menu when clicking outside
            $(document).click(function(event) {
                if (!$(event.target).closest('.nav-menu').length &&
                    !$(event.target).closest('#nav-toggle').length) {
                    $('.nav-menu').removeClass('active');
                    $('.toggle-open').removeClass('hidden');
                    $('.toggle-close').addClass('hidden');
                }
            });

            // Handle window resize
            $(window).resize(function() {
                if ($(window).width() >= 1024) {
                    $('.nav-menu').removeClass('active');
                    $('.toggle-open').removeClass('hidden');
                    $('.toggle-close').addClass('hidden');
                }
            });
        });
    </script>
    @stack('js')

</body>

</html>