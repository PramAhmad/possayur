<x-app-layout>
    @push('styles')
    <style>
        .hs-select {
            width: 100%;
        }

        .truncate {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding-left: 1rem;
            margin-top: 0.6rem;
            color: #9ca3af;
        }
    </style>
    @endpush
    <div class="flex-grow flex flex-col lg:flex-row">
        <!-- Products Section -->
        <div class="flex flex-col bg-blue-gray-50  w-full h-full py-4">
            <div class="flex px-2 w-full flex-row relative dark:bg-gray-800" id="search-table">
                <div class="absolute left-5 top-3 z-10 px-2 py-2 rounded-full bg-sky-500 text-white ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                <!-- Product Search Select -->
                <select id="product-select" data-hs-select='{
        "hasSearch": true,
        "searchPlaceholder": "Search products...",
        "placeholder": "Choose a product",
        "toggleClasses": "bg-white rounded-3xl shadow text-lg w-full h-16 py-4 pl-12 pr-9 transition-shadow focus:shadow-2xl focus:outline-none",
        "dropdownClasses": "mt-2 max-h-72 w-full overflow-y-auto bg-white border rounded-lg z-20",
        "optionClasses": "py-2 px-4 hover:bg-gray-100 cursor-pointer flex items-center",
        "optionTemplate": "<div class=\"flex items-center\"><div class=\"mr-3\" data-icon></div><div class=\"text-gray-800\" data-title></div></div>"
    }' class="w-full px-10">
                    <option value="">Choose a product</option>

                    @foreach ($products as $product)
                    <option value="{{ $product->id }}" data-product-id="{{ $product->id }}"
                        data-price="{{ $product->selling_price }}"
                        data-unit="{{ $product->unit->id ?? '-' }}"
                        data-image="{{ asset($product->image ? 'upload/product/' . $product->image : 'images/default.png') }}"
                        data-hs-select-option='{
                               "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"{{ asset($product->image ? 'upload/product/' . $product->image : 'images/default.png') }}\" alt=\"{{ addslashes($product->name) }}\" style=\"width: 30px; height: 30px;\" />"
            }' role="button">
                        {{ $product->name }} - Rp {{ number_format($product->selling_price) }}
                    </option>

                    @if ($product->variants->count() > 0)
                    @foreach ($product->variants as $variant)
                    <option value="{{ $variant->id }}" data-product-id="{{ $product->id }}"
                        data-variant-id="{{ $variant->id }}" data-price="{{ $variant->additional_price }}"
                        data-hs-select-option='{
                                                                "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"{{ asset('upload/product/' . $product->image) }}\" alt=\"{{ addslashes($product->name) }}\" style=\"width: 30px; height: 30px;\" />"
                                                            }' data-image="{{ asset('upload/product/' . ($variant->image ?? $product->image)) }}
                                                        ">
                        {{ $variant->name }} - Rp {{ number_format($variant->additional_price) }}
                    </option>
                    @endforeach
                    @endif

                    @if ($product->batches->count() > 0)
                    @foreach ($product->batches as $batch)
                    <option value="{{ $batch->id }}" data-product-id="{{ $product->id }}"
                        data-batch-id="{{ $batch->id }}" data-price="{{ $batch->price }}" data-hs-select-option='{
                                                        "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"{{ asset('upload/product/' . $product->image) }}\" alt=\"{{ addslashes($product->name) }}\" style=\"width: 30px; height: 30px;\" />"
                                                    }' data-image="{{ asset('upload/product/' . ($batch->image ?? $product->image)) }}">
                        {{ $batch->batch_no }} - Rp {{ number_format($batch->price) }}
                    </option>
                    @endforeach
                    @endif
                    @endforeach
                </select>
            </div>



            <!-- End Select -->

            <div class="flex px-2 flex-row relative" id="search-grid">
                <div class="absolute left-5 top-3 px-2 py-2 rounded-full bg-sky-500 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" id="search-input"
                    class="bg-white rounded-3xl shadow text-lg w-full h-16 py-4 pl-16 transition-shadow focus:shadow-2xl focus:outline-none"
                    placeholder="Search Product ..." />
            </div>

            <!-- mode table / gird badge -->
            <div class="flex justify-start px-2 mt-2">
                <div class="flex">
                    <!-- Badge -->
                    <button id="tableMode"
                        class="flex items-center justify-center bg-white text-blue-gray-500 rounded-lg px-3 py-1 mr-2">
                        Table
                    </button>
                    <button id="gridMode"
                        class="flex items-center justify-center bg-white text-blue-gray-500 rounded-lg px-3 py-1">
                        Grid
                    </button>
                </div>
            </div>

            <!-- Products Section -->
            <div class="h-full overflow-hidden mt-4">
                <!-- card mode table view -->
                <div id="chart-table" class="hidden px-5">
                    <table class="table-auto w-full bg-white rounded-lg shadow ">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700">
                                <th class="px-4 py-2 text-start">Image</th>
                                <th class="px-4 py-2 text-start">Name</th>
                                <th class="px-4 py-2 text-start">Price</th>
                                <th class="px-4 py-2 text-start">Unit</th>
                                <th class="px-4 py-2 text-start">Action</th>
                            </tr>
                        </thead>
                        <tbody class="items-chart-table">
                            <!-- display chart from products -->
                        </tbody>
                    </table>
                </div>

                <!-- Grid View -->
                <div id="product-grid" class="h-full overflow-y-auto px-2">
                    <div class="product-grid grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 pb-3">
                        @foreach ($products as $product)
                        <!-- Produk Utama -->
                        <div>
                            <div role="button"
                                class="select-none cursor-pointer transition-shadow overflow-hidden rounded-2xl p-2 bg-white shadow hover:shadow-lg add-to-cart"
                                data-product-id="{{ $product->id }}" data-product-name="{{ $product->name }}"
                        data-unit-id="{{ $product->unit->id ?? '-' }}"
                        data-unit-code="{{ $product->unit->code ?? '-' }}"

                                data-product-price="{{ $product->selling_price }}"
                                data-product-image="{{ asset($product->image ? 'upload/product/' . $product->image : 'images/default.png') }}"
                                data-batch-id="">
                                <img src="{{ asset($product->image ? 'upload/product/' . $product->image : 'images/default.png') }}"
                                    class="object-cover w-full h-24 sm:h-44 lg:h-52" alt="{{ $product->name }}">

                                <div class="flex flex-col sm:flex-row pb-3 px-3 text-sm mt-3">
                                    <p class="flex-grow truncate mr-1">
                                        {{ $product->name }}
                                        <span class="font-semibold"> {{ $product->unit->code ?? '-' }} </span>
                                    </p>
                                    <br>
                                </div>
                                <p class="px-3 pb-3  font-semibold">
                                    Rp {{ number_format($product->selling_price) }}
                                </p>
                            </div>
                        </div>

                        <!-- Variant dari Produk -->
                        @if ($product->variants->count() > 0)
                        @foreach ($product->variants as $variant)
                        <div>
                            <div role="button"
                                class="select-none cursor-pointer transition-shadow overflow-hidden rounded-2xl p-2 bg-white shadow hover:shadow-lg add-to-cart"
                                data-product-id="{{ $product->id }}" data-product-name="{{ $variant->name }}"
                                data-product-price="{{ $variant->additional_price }}"
                                data-product-image="{{ asset('upload/product/' . ($variant->image ?? $product->image)) }}"
                                data-variant-id="{{ $variant->id }}" data-batch-id="">
                                <img src="{{ asset(($variant->image ?? $product->image) ? 'upload/product/' . ($variant->image ?? $product->image) : 'images/default.png') }}"
                                    class="object-cover w-full h-24 sm:h-44 lg:h-40" alt="{{ $variant->name }}">

                                <div class="flex flex-col sm:flex-row  text-sm mt-3">
                                    <p class="flex-grow truncate mr-1">
                                        {{ $variant->name }}
                                        <span class="font-semibold">(
                                            {{ $variant->unit->name ?? $product->unit->name ?? '-' }} )</span>
                                    </p>
                                </div>
                                <p class="px-3 pb-3  font-semibold">
                                    Rp {{ number_format($variant->additional_price) }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                        @endif

                        <!-- Batch dari Produk -->
                        @if ($product->batches->count() > 0)
                        @foreach ($product->batches as $batch)
                        <div>
                            <div role="button"
                                class="select-none cursor-pointer transition-shadow overflow-hidden rounded-2xl p-2 bg-white shadow hover:shadow-lg add-to-cart"
                                data-product-id="{{ $product->id }}" data-product-name="{{ $batch->batch_no }}"
                                data-product-price="{{ $batch->price }}"
                                data-product-image="{{ asset('upload/product/' . ($batch->image ?? $product->image)) }}"
                                data-variant-id="" data-batch-id="{{ $batch->id }}">
                                <img src="{{ asset(($batch->image ?? $product->image) ? 'upload/product/' . ($batch->image ?? $product->image) : 'images/default.png') }}"
                                    class="object-cover w-full h-24 sm:h-44 lg:h-52" alt="{{ $batch->batch_no }}">

                                <div class="flex flex-col sm:flex-row pb-3 px-3 text-sm mt-3">
                                    <p class="flex-grow truncate mr-1">
                                        {{ $batch->batch_no }}
                                        <span class="font-semibold">(
                                            {{ $batch->unit->name ?? $product->unit->name ?? '-' }} )</span>
                                    </p>
                                    <p class="nowrap font-semibold">
                                        Rp {{ number_format($batch->price) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    @if(!request()->has('search'))
                    {{ $products->links() }}
                    @endif
                </div>
            </div>

        </div>

        <!-- Cart Section -->
        <div class="w-full lg:w-5/12 flex flex-col bg-blue-gray-50 h-full rounded-lg bg-white p-4" id="chart-grid">
            <div class="bg-white rounded-3xl flex flex-col h-full shadow">
                <!-- Empty Cart State -->
                <div id="empty-cart" class="flex-1 w-full p-4 opacity-25 select-none flex flex-col flex-wrap content-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <p>CART EMPTY</p>
                </div>

                <!-- Cart Items -->
                <div id="cart-items" class="flex-1 flex flex-col overflow-auto" style="display:none;">
                    <div class="h-16 text-center flex justify-center">
                        <div class="pl-8 text-left text-lg py-4 relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <div id="cart-count" class="text-center absolute bg-sky-500 text-white w-5 h-5 text-xs p-0 leading-5 rounded-full -right-2 top-3"></div>
                        </div>
                        <div class="flex-grow px-8 text-right text-lg py-4 relative">
                            <button id="clear-cart" class="text-blue-gray-300 hover:text-pink-500 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div id="cart-items-list" class="flex-1 w-full px-4 overflow-auto max-h-[500px]">
                    </div>
                </div>

                <!-- Customer and Coupon Selection -->
                <div class="flex flex-col bg-white rounded-3xl p-4 mt-4">
                    <select id="supplier" name="supplier" class="w-full text-base lg:text-lg font-semibold text-blue-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:bg-white focus:shadow-lg py-3 px-2 focus:outline-none">
                        <option value="">- Select supplier -</option>
                        @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>

                </div>
                <!-- Payment Section -->
                <div class="select-none h-auto w-full text-center pt-3 pb-4 px-4">
                    <div class="flex mb-1 text-base lg:text-lg font-semibold text-blue-gray-700">
                        <div>Subtotal</div>
                        <div id="subtotal" class="text-right w-full"></div>
                    </div>
                    <div class="flex mb-1 text-base lg:text-lg font-semibold text-blue-gray-700">

                        <div>Discount</div>
                        <div id="discount" class="text-right w-full"></div>
                    </div>

                    <div class="flex mb-3 text-base lg:text-lg font-semibold text-blue-gray-700">
                        <div>Total</div>
                        <div id="total-price" class="text-right w-full"></div>
                    </div>

                    <div class="mb-3 text-blue-gray-700 px-3 pt-2 pb-3 rounded-lg bg-blue-gray-50">
                        <div class="flex text-base lg:text-lg font-semibold">
                            <div class="flex-grow text-left">CASH</div>
                            <div class="flex text-right">
                                <div class="mr-2">Rp</div>
                                <input id="cash" type="text" class="w-24 lg:w-28 text-right bg-white shadow rounded-lg focus:bg-white focus:shadow-lg px-2 focus:outline-none">
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 mt-2">
                            <!-- Payment buttons-->
                        </div>
                    </div>
                    <div id="change-info" class="flex mb-3 text-base lg:text-lg font-semibold bg-sky-50 text-blue-gray-700 rounded-lg py-2 px-3" style="display:none;">
                        <div class="text-sky-800">CHANGE</div>
                        <div id="change-amount" class="text-right flex-grow text-sky-600"></div>
                    </div>
                    <div id="error-info" class="flex mb-3 text-base lg:text-lg font-semibold bg-pink-100 text-blue-gray-700 rounded-lg py-2 px-3" style="display:none;">
                        <div id="error-message" class="text-right flex-grow text-pink-600"></div>
                    </div>
                    <button id="submit-payment" class="text-white rounded-2xl text-base lg:text-lg w-full py-3 focus:outline-none bg-sky-500 hover:bg-sky-600">
                        SUBMIT
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div id="modalReceipt" class="fixed w-full h-screen left-0 top-0 z-10 flex flex-wrap justify-center content-center p-24 backdrop-blur-sm" style="display: none;">
        <div class="fixed glass w-full h-screen left-0 top-0 z-0" id="modalOverlay"></div>
        <div class="w-96 rounded-3xl bg-white shadow-xl overflow-hidden z-10">
            <div id="receipt-content" class="text-left w-full text-sm p-6 overflow-auto">
                <div class="text-center">
                    @if ($outlet->logo)
                    <img src="{{ asset('upload/outlets/' . $outlet->logo) }}" alt="{{ $outlet->name }}" class="wmb-3 w-8 h-8 inline-block">
                    @else
                    <span>{{ __('No Logo') }}</span>
                    @endif
                    <h2 class="text-xl font-semibold">{{$outlet->name}}</h2>
                    <p>{{$outlet->description ?? '-'}}</p>
                </div>
                <div class="flex mt-4 text-xs">
                    <div class="flex-grow">No: <span id="receiptNo"></span></div>
                    <div id="receiptDate"></div>
                </div>
                <hr class="my-2">
                <div>
                    <table class="w-full text-xs">
                        <thead>
                            <tr>
                                <th class="py-1 w-1/12 text-center">#</th>
                                <th class="py-1 text-left">Item</th>
                                <th class="py-1 w-2/12 text-center">Qty</th>
                                <th class="py-1 w-3/12 text-right">Subtotal</th>
                            </tr>
                        </thead>
                    </table>
                    <!-- Wrap the tbody in a div with max-height and overflow-y -->
                    <div style="max-height: 200px; overflow-y: auto;">
                        <table class="w-full text-xs">
                            <tbody id="receiptItems">
                                <!-- Product rows will be inserted here dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr class="my-2">
                <div>
                    <div class="flex font-semibold">
                        <div class="flex-grow">TOTAL</div>
                        <div id="totalPrice"></div>
                    </div>
                    <div class="flex text-xs font-semibold">
                        <div class="flex-grow">PAY AMOUNT</div>
                        <div id="payAmount"></div>
                    </div>
                    <hr class="my-2">
                    <div class="flex text-xs font-semibold">
                        <div class="flex-grow">CHANGE</div>
                        <div id="changeAmount"></div>
                    </div>
                </div>
            </div>
            <div class="p-4 w-full">
                <button id="proceedButton" class="bg-sky-500 text-white text-lg px-4 py-3 rounded-2xl w-full focus:outline-none">PROCEED</button>
            </div>
        </div>
    </div>

    @push('scripts')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function() {
            $('html').addClass('horizontalMenu');
            const CART_KEY = 'pochart';
            let currentDiscount = 0;
            $('#search-table').hide();

            // gice default menu is gridMode
            $('#gridMode').removeClass('bg-white text-blue-gray-500').addClass('bg-sky-500 text-white');
            $('#tableMode, #gridMode').on('click', function() {
                let mode = $(this).attr('id').replace('Mode', '').toLowerCase();

                // Remove active state from all mode buttons
                $('#tableMode, #gridMode').removeClass('bg-sky-500 text-white').addClass('bg-white text-blue-gray-500');

                // Add active state to clicked button
                $(this).removeClass('bg-white text-blue-gray-500').addClass('bg-sky-500 text-white');

                if (mode === 'table') {
                    $('#search-table').show();
                    $('#search-grid').hide();
                    $('#product-grid').hide();
                    $('#chart-grid').removeClass('lg:w-5/12').addClass('lg:w-5/12');
                    $('#chart-table').show();
                } else {
                    $('#search-grid').show();
                    $('#search-table').hide();
                    $('#product-grid').show();
                    $('#chart-grid').removeClass('lg:w-5/12').addClass('lg:w-5/12');
                    $('#chart-table').hide();
                }

                updateCartUI(JSON.parse(localStorage.getItem(CART_KEY)) || [], mode);
            });

            function getCurrentMode() {
                return $('#tableMode').hasClass('bg-sky-500') ? 'table' : 'grid';
            }

            function loadCart() {
                const cart = JSON.parse(localStorage.getItem(CART_KEY)) || [];
                updateCartUI(cart, getCurrentMode());
            }

            function updateCart(cart) {
                localStorage.setItem(CART_KEY, JSON.stringify(cart));
                updateCartUI(cart, getCurrentMode());


            }




            function updateCartUI(cart, mode) {
                let totalPrice = 0;
                let discount = 0;
                console.log(cart);
                console.log('ini adalah mode ' + mode);
                if (mode === 'grid') {
                    $('#cart-items-list').show();
                    if (cart.length === 0) {
                        console.log('cart empty');
                        $("#empty-cart").show();
                        $("#cart-items").hide();
                        $("#total-price").text("Rp 0");
                        $("#cart-count").text(0);



                    } else {
                        console.log('cart not empty');
                        $("#empty-cart").hide();
                        $("#cart-items").show();
                        console.log('cart empty di table');
                        let cartItemsHtml = '';
                        cart.forEach(function(item) {
                            totalPrice += item.price * item.qty;
                            cartItemsHtml += `
                    <div class="select-none mb-3 bg-blue-gray-50 rounded-lg w-full text-blue-gray-700 py-3 px-2 flex justify-center">
                        <img src="${item.image}" alt="" class="rounded-lg h-12 w-12 bg-white shadow mr-2 mt-2">
                        <div class="flex-grow">
                            <h5 class="text-base font-medium mb-2">${item.name}</h5>
                            <div class="flex items-center space-x-3">
                                <div class="flex items-center">
                                    <input 
                                        type="text" 
                                        class="qty-edit number_format w-16 h-8 text-sm bg-gray-50 rounded border border-gray-100 px-2" 
                                        value="${item.qty}" 
                                        data-product-id="${item.id}"
                                    >
                                    <span class="text-sm ml-1">${item.unit}</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-sm mr-1">Rp</span>
                                    <input 
                                        type="text" 
                                        class="price-edit number_format w-24 h-8 text-sm bg-gray-50 rounded border border-gray-100 px-2" 
                                        value="${item.price}" 
                                        min="0"
                                        data-product-id="${item.id}"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center pl-2">
                            <button class="delete-item rounded-lg text-center p-2 text-white bg-red-500 hover:bg-red-600 focus:outline-none" data-product-id="${item.id}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                `;
                        });
                        $("#cart-items-list").html(cartItemsHtml);
                    }
                } else if (mode === 'table') {
                    console.log(mode)
                    $('#cart-items-list').hide();
                    if (cart.length === 0) {
                        $("#chart-table tbody").html(`
                            <tr class="border border-slate-100 dark:border-slate-900 relative">
            <td class="table-cell text-center" colspan="8">
                <img src="{{asset('images/result-not-found.svg')}}" alt="page not found" class="w-64 m-auto" />
                <h2 class="text-xl text-slate-700 mb-8 -mt-4">Cart Empty.</h2>
            </td>
        </tr>
                        `);

                    } else {

                        $("#chart-table tbody").html('');
                        cart.forEach(function(item) {
                            totalPrice += item.price * item.qty;
                            const rowHtml = `
                    <tr>
                        <td class="px-4 py-2">
                            <img src="${item.image}" class="w-12 h-12 object-cover rounded-lg" alt="${item.name}">
                        </td>
                        <td class="px-4 py-2">${item.name}</td>
                            <td class="px-4 py-2">
                        <input 
                            type="text" 
                            class="price-edit-table number_format w-24 h-8 text-sm bg-gray-50 rounded border border-gray-100 px-2" 
                            value="${item.price}" 
                            min="0"
                            data-product-id="${item.id}"
                        >
                    </td>
                        <td class="px-4 py-2">
                            <input 
                                type="text" 
                                class="qty-edit-table number_format w-16 h-8 text-sm bg-gray-50 rounded border border-gray-100 px-2" 
                                value="${item.qty}" 
                                data-product-id="${item.id}"
                            >
                            <span class="text-sm ml-1">${item.unit}</span>

                        </td>
                        <td class="px-4 py-2">
                            <button class="delete-item rounded-lg text-center p-2 text-white bg-red-500 hover:bg-red-600 focus:outline-none" data-product-id="${item.id}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                `;
                            $("#chart-table tbody").append(rowHtml);
                        });
                    }
                }
                updateSubtotalAndDiscount(totalPrice, currentDiscount);
                $("#total-price").text("Rp " + Intl.NumberFormat().format(totalPrice - currentDiscount));
                $("#subtotal").text("Rp " + Intl.NumberFormat().format(totalPrice));
                $("#discount").text("Rp " + Intl.NumberFormat().format(currentDiscount));
                $("#cart-count").text(cart.length);
                $('.number_format').each(function() {
                    new Cleave(this, {
                        numeral: true,
                        numeralThousandsGroupStyle: 'thousand'
                    });
                });

            }
            // Tambahkan item ke keranjang
            $(".add-to-cart").click(function() {
                let productId = parseInt($(this).data("product-id"));
                const name = $(this).data("product-name");
                const price = parseFloat($(this).data("product-price"));
                const image = $(this).data("product-image");
                const variantId = $(this).data("variant-id") || null;
                const batchId = $(this).data("batch-id") || null;
                const unit = $(this).data("unit-code") || "pcs";

                if (!image || image === "") {
                    image = "{{ asset('images/default.png') }}";
                }

                let cart = JSON.parse(localStorage.getItem(CART_KEY)) || [];

                const index = cart.findIndex(
                    (item) =>
                    item.id === productId &&
                    item.variantId === variantId &&
                    item.batchId === batchId
                );

                if (index >= 0) {
                    cart[index].qty += 1;
                } else {
                    cart.push({
                        id: productId,
                        variantId,
                        batchId,
                        name,
                        price,
                        image,
                        unit,
                        qty: 1,
                    });
                }

                localStorage.setItem(CART_KEY, JSON.stringify(cart));

                updateCart(cart);
                updateCartUI(cart, getCurrentMode());
            });

            $("#product-select").change(function() {
                const selectedOptions = $(this).find(":selected");
                let cart = JSON.parse(localStorage.getItem(CART_KEY)) || [];

                selectedOptions.each(function() {
                    let productId = $(this).val();
                    const name = $(this).text();
                    const price = $(this).data("price");
                    const image = $(this).data("image");
                    const variantId = $(this).data("variant-id") || null;
                    const batchId = $(this).data("batch-id") || null;

                    const index = cart.findIndex(
                        (item) =>
                        item.productId === productId &&
                        item.variantId === variantId &&
                        item.batchId === batchId
                    );
                    productId = parseInt(productId);
                    if (index >= 0) {
                        cart[index].qty += 1;
                    } else {
                        cart.push({
                            id: productId,
                            variantId,
                            batchId,
                            name,
                            price,
                            image,
                            qty: 1,
                        });
                    }
                });

                localStorage.setItem(CART_KEY, JSON.stringify(cart));
                updateCartUI(cart, getCurrentMode());
            });


            // search in  grid mode
            $('#search-grid #search-input').on('input', function() {
                const searchTerm = $(this).val().toLowerCase();
                $('.product-grid > div').each(function() {
                    const $productCard = $(this).find('.add-to-cart');
                    const productName = $productCard.data('product-name').toLowerCase();
                    if (productName.includes(searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });



            // search in table mode
            $('#search-table #search-input').on('input', function() {
                const searchTerm = $(this).val().toLowerCase();
                $('#chart-table tbody tr').each(function() {
                    const productName = $(this).find('td:nth-child(2)').text().toLowerCase();
                    if (productName.includes(searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });

            // reset search handler
            $('#tableMode, #gridMode').on('click', function() {
                $('#search-grid #search-input, #search-table #search-input').val('');
                $('.product-grid > div, #chart-table tbody tr').show();
            });


            $(document).on("click", ".delete-item", function() {
                const productId = $(this).data("product-id");
                let cart = JSON.parse(localStorage.getItem(CART_KEY)) || [];
                const index = cart.findIndex(item => item.id === productId);
                if (index >= 0) {
                    cart.splice(index, 1);
                    updateCart(cart);
                }
            });

            $(document).on("change", ".qty-edit", function() {
                const productId = $(this).data("product-id");
                let newQty = parseFloat($(this).val());



                let cart = JSON.parse(localStorage.getItem(CART_KEY)) || [];
                const index = cart.findIndex(item => item.id === productId);
                // validate qty dari table product

                if (index >= 0) {
                    cart[index].qty = newQty;
                    updateCart(cart);
                }

            });
            // qty-edit-table
            $(document).on("change", ".qty-edit-table", function() {
                const productId = $(this).data("product-id");
                let newQty = parseInt($(this).val()) || 1;

                if (newQty < 1) {
                    newQty = 1;
                    $(this).val(1);
                }

                let cart = JSON.parse(localStorage.getItem(CART_KEY)) || [];
                const index = cart.findIndex(item => item.id === productId);
                if (index >= 0) {
                    cart[index].qty = newQty;
                    updateCart(cart, 'table');
                    updateCartUI(cart, 'table');
                }

            });


            $(document).on("change", ".price-edit", function() {
                const productId = $(this).data("product-id");
                let newPrice = parseInt($(this).val().replace(/,/g, '')) || 0;

                if (newPrice < 0) {
                    newPrice = 0;
                    $(this).val(0);
                }

                let cart = JSON.parse(localStorage.getItem(CART_KEY)) || [];
                const index = cart.findIndex(item => item.id === productId);
                if (index >= 0) {
                    cart[index].price = newPrice;
                    updateCart(cart, getCurrentMode());
                    updateCartUI(cart, getCurrentMode());
                }
            });
            $("#clear-cart").click(function() {
                localStorage.removeItem(CART_KEY);
                loadCart();
            });

            // change price by custpm
            $("#customer").change(function() {
                const customerId = $(this).val();
                const cart = JSON.parse(localStorage.getItem(CART_KEY)) || [];

                if (customerId) {
                    $.ajax({
                        url: "{{ route('pos.getPriceByCustomer') }}",
                        type: "GET",
                        data: {
                            _token: "{{ csrf_token() }}",
                            customer: customerId,
                        },
                        success: function(response) {
                            let cart = JSON.parse(localStorage.getItem(CART_KEY)) || [];

                            cart.forEach((item) => {
                                const productData = response.find(p => p.product_id === item.id);
                                if (productData) {
                                    item.price = productData.price;
                                }
                            });

                            localStorage.setItem(CART_KEY, JSON.stringify(cart));

                            updateCart(cart, getCurrentMode());

                        },

                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }

            });

            $("#submit-payment").click(function() {
                console.log("Submit payment");
                const cart = JSON.parse(localStorage.getItem(CART_KEY)) || [];
                const totalPrice = cart.reduce((total, item) => total + (item.price * item.qty), 0);
                const cash = parseInt($("#cash").val().replace(/,/g, '')) || 0;
                const change = cash - totalPrice;
                const customer = $("select[name='customer']").val();
                // cash change to Intl
                console.log(cash)


                if (change < 0) {
                    $("#error-message").text("Nominal uang kurang!");
                    $("#error-info").show();
                    $("#change-info").hide();
                    return;
                }
                if (cash === 0) {
                    $("#error-message").text("Nominal uang tidak boleh 0!");
                    $("#error-info").show();
                    $("#change-info").hide();
                    return;
                }
                if (customer === "") {
                    $("#error-message").text("Customer harus diisi!");
                    $("#error-info").show();
                    $("#change-info").hide();
                    return;
                }

                $("#receiptNo").text(new Date().getTime());
                $("#receiptDate").text(new Date().toLocaleString());
                $("#totalPrice").text("Rp " + totalPrice.toLocaleString());
                $("#payAmount").text("Rp " + cash.toLocaleString());
                $("#changeAmount").text("Rp " + change.toLocaleString());

                let receiptItemsHtml = '';
                cart.forEach((item, index) => {
                    receiptItemsHtml += `
    <tr>
        <td class="py-2 text-center">${index + 1}</td>
        <td class="py-2 text-left">
        ${item.name}<br/>
        <small>Rp ${item.price.toLocaleString()}</small>
        </td>
        <td class="py-2 text-center">${item.qty}</td>
        <td class="py-2 text-right">Rp ${(item.price * item.qty).toLocaleString()}</td>
    </tr>
    `;
                });
                $("#receiptItems").html(receiptItemsHtml);

                $("#modalReceipt").fadeIn();
            });

            $("#modalOverlay").click(function() {
                $("#modalReceipt").fadeOut();
            });

            $("#proceedButton").click(function() {

                $("#modalReceipt").fadeOut();
                const item = JSON.parse(localStorage.getItem(CART_KEY)) || [];
                const cash = parseInt($("#cash").val().replace(/,/g, '')) || 0;
                const totalPrice = item.reduce((total, item) => total + (item.price * item.qty), 0);
                const change = cash - totalPrice;
                const supplier = $("select[name='supplier']").val();
                const outlet = "{{ $outlet->id }}";

                $.ajax({
                    url: "{{ route('purchasepos.store') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        items: item,
                        cash,
                        total: totalPrice,
                        change,
                        supplier,
                        outlet
                    },
                    success: function(response) {
                        console.log(response);
                        localStorage.removeItem(CART_KEY);
                        loadCart();
                        $("#cash").val("");
                        $("#total-price").text("Rp 0");


                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Transaction success',
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Transaction failed',
                        });
                        console.error(error);
                    }
                });

            });
            // dynamix update total

            $("#coupon").change(function() {
                const couponId = $(this).val();
                const cart = JSON.parse(localStorage.getItem(CART_KEY)) || [];
                let subtotal = 0;
                cart.forEach(item => {
                    subtotal += item.price * item.qty;
                });

                // reset if no coupon
                currentDiscount = 0;

                if (couponId) {
                    $.ajax({
                        url: `{{ route('coupon.get') }}`,
                        type: "GET",
                        data: {
                            coupon_id: couponId
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.type === 'percentage') {
                                currentDiscount = subtotal * (response.value / 100);
                            } else {
                                currentDiscount = response.amount;
                            }

                            updateSubtotalAndDiscount(subtotal, currentDiscount);
                            updateCart(cart);

                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                } else {
                    updateSubtotalAndDiscount(subtotal, 0);
                }
            });

            function updateSubtotalAndDiscount(subtotal, discount) {
                currentDiscount = discount;
                const total = subtotal - discount;
                console.log(total)
                $("#subtotal").text("Rp " + subtotal);
                $("#discount").text("Rp " + discount);
                $("#total-price").text("Rp " + total);
            }
            loadCart();
        });
    </script>
    <script>
        $(document).ready(function() {
            let subtotal = 0;
            $('#search-input').on('keyup', function() {
                let keyword = $(this).val();
                $.ajax({
                    url: `{{route('pos.searchProducts')}}`,
                    type: 'GET',
                    data: {
                        keyword: keyword
                    },
                    success: function(response) {
                        $('.product-grid').empty();
                        if (response.length > 0) {
                            response.forEach(function(product) {
                                let productHtml = `
                            <div>
                                <div role="button"
                                    class="select-none cursor-pointer transition-shadow overflow-hidden rounded-2xl p-2 bg-white shadow hover:shadow-lg add-to-cart"
                                    data-product-id="${product.id}"
                                    data-product-name="${product.name}"
                                    data-product-price="${product.selling_price}"
                                    data-product-image="/upload/product/${product.image}">
                                    <img src="/upload/product/${product.image}"
                                        class="object-cover w-full h-52"
                                        alt="${product.name}">
                                    <div class="flex pb-3 px-3 text-sm mt-3">
                                        <p class="flex-grow truncate mr-1">${product.name}</p>
                                        <p class="nowrap font-semibold">Rp ${new Intl.NumberFormat().format(product.selling_price)}</p>
                                    </div>
                                </div>
                            </div>
                        `;
                                $('.product-grid').append(productHtml);
                            });
                        } else {
                            $('.product-grid').append('<p>No products found.</p>');
                        }
                    },
                    error: function() {
                        console.log('Error retrieving products.');
                    }
                });
            });


        });
    </script>
    <script src="{{asset('js/preline.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        new Cleave('#cash', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand',
            noImmediatePrefix: true
        });
    </script>
    @endpush

</x-app-layout>