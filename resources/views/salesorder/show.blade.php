<x-app-layout>
<div class="flex-grow flex flex-col lg:flex-row">
    <!-- Products Section -->
    <div class="flex flex-col bg-blue-gray-50 w-full h-full py-4">
        <!-- Search Bar -->
        <div class="flex px-2 flex-row relative">
            <div class="absolute left-5 top-3 px-2 py-2 rounded-full bg-sky-500 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input
                type="text"
                id="search-input"
                class="bg-white rounded-3xl shadow text-lg w-full h-16 py-4 pl-16 transition-shadow focus:shadow-2xl focus:outline-none"
                placeholder="Cari menu ..." />
        </div>

        <!-- mode table / gird badge -->
        <div class="flex justify-start px-2 mt-2">
    <div class="flex">
        <!-- Badge -->
        <button id="tableMode" class="flex items-center justify-center bg-white text-blue-gray-500 rounded-lg px-3 py-1 mr-2">
            Table
        </button>
        <button id="gridMode" class="flex items-center justify-center bg-white text-blue-gray-500 rounded-lg px-3 py-1">
            Grid
        </button>
    </div>
</div>

<!-- Products Section -->
<div class="h-full overflow-hidden mt-4">
    <!-- Table View -->
    <div id="tableView" class="hidden px-5">
        <table class="table-auto w-full bg-white rounded-lg shadow ">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="px-4 py-2">Image</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Unit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr 
                 role="button"
                    class="border-t cursor-pointer hover:bg-gray-100 add-to-cart"
                    data-product-id="{{ $product->id }}"
                    data-product-name="{{ $product->name }}"
                    data-product-price="{{ $product->selling_price }}"
                    data-product-image="{{ asset('upload/product/' . $product->image) }}"
                >
                    <td class="px-4 py-2">
                        <img src="{{ asset('upload/product/' . $product->image) }}" class="w-16 h-16 object-cover rounded-md" alt="{{ $product->name }}">
                    </td>
                    <td class="px-4 py-2">{{ $product->name }}</td>
                    <td class="px-4 py-2">Rp {{ number_format($product->selling_price) }}</td>
                    <td class="px-4 py-2">{{ $product->unit->name ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Grid View -->
    <div id="gridView" class="h-full overflow-y-auto px-2">
        <div class="product-grid grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-4 pb-3">
            @foreach ($products as $product)
            <div>
                <div
                    role="button"
                    class="select-none cursor-pointer transition-shadow overflow-hidden rounded-2xl p-2 bg-white shadow hover:shadow-lg add-to-cart"
                    data-product-id="{{ $product->id }}"
                    data-product-name="{{ $product->name }}"
                    data-product-price="{{ $product->selling_price }}"
                    data-product-image="{{ asset('upload/product/' . $product->image) }}">
                    <img src="{{ asset('upload/product/' . $product->image) }}" class="object-cover w-full h-24 sm:h-44 lg:h-52" alt="{{ $product->name }}">
                    <div class="flex flex-col sm:flex-row pb-3 px-3 text-sm mt-3">
                        <p class="flex-grow truncate mr-1">{{ $product->name }} <span class="font-semibold">( {{ $product->unit->name ?? '-' }} )</span></p>
                        <p class="nowrap font-semibold">Rp {{ number_format($product->selling_price) }}</p>
                    </div>
                </div>
            </div>
            @endforeach 
            @foreach ($products as $product)
            <div>
                <div
                    role="button"
                    class="select-none cursor-pointer transition-shadow overflow-hidden rounded-2xl p-2 bg-white shadow hover:shadow-lg add-to-cart"
                    data-product-id="{{ $product->id }}"
                    data-product-name="{{ $product->name }}"
                    data-product-price="{{ $product->selling_price }}"
                    data-product-image="{{ asset('upload/product/' . $product->image) }}">
                    <img src="{{ asset('upload/product/' . $product->image) }}" class="object-cover w-full h-24 sm:h-44 lg:h-52" alt="{{ $product->name }}">
                    <div class="flex flex-col sm:flex-row pb-3 px-3 text-sm mt-3">
                        <p class="flex-grow truncate mr-1">{{ $product->name }} <span class="font-semibold">( {{ $product->unit->name ?? '-' }} )</span></p>
                        <p class="nowrap font-semibold">Rp {{ number_format($product->selling_price) }}</p>
                    </div>
                </div>
            </div>
            @endforeach 
        </div>
    </div>
</div>

    </div>

    <!-- Cart Section -->
    <div class="w-full lg:w-5/12 flex flex-col bg-blue-gray-50 h-full rounded-lg bg-white p-4">
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

                <div id="cart-items-list" class="flex-1 w-full px-4 overflow-auto">
                </div>
            </div>

            <!-- Customer and Coupon Selection -->
            <div class="flex flex-col bg-white rounded-3xl p-4 mt-4">
                <select id="customer" name="customer" class="w-full text-base lg:text-lg font-semibold text-blue-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:bg-white focus:shadow-lg py-3 px-2 focus:outline-none">
                    <option value="">- Select Customer -</option>
                    @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
                <select id="coupon" name="coupon" class="w-full mt-3 text-base lg:text-lg font-semibold text-blue-gray-700 bg-white border-2 border-gray-200 rounded-lg focus:bg-white focus:shadow-lg py-3 px-2 focus:outline-none">
                    <option value="">- Select Coupon -</option>
                    @foreach ($coupons as $coupon)
                    <option value="{{ $coupon->id }}">{{ $coupon->code }}</option>
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
                    <tbody id="receiptItems"></tbody>
                </table>
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
        function loadCart() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            updateCartUI(cart);
        }

        function updateCart(cart) {
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartUI(cart);
        }

        function updateCartUI(cart) {
            if (cart.length === 0) {
                $("#empty-cart").show();
                $("#cart-items").hide();
                $("#total-price").text("Rp 0");
                $("#cart-count").text(0);
            } else {
                $("#empty-cart").hide();
                $("#cart-items").show();

                let cartItemsHtml = '';
                let totalPrice = 0;
                cart.forEach(function(item) {
                    totalPrice += item.price * item.qty ;
                    cartItemsHtml += `
                    <div class="select-none mb-3 bg-blue-gray-50 rounded-lg w-full text-blue-gray-700 py-3 px-2 flex justify-center">
                        <img src="${item.image}" alt="" class="rounded-lg h-12 w-12 bg-white shadow mr-2 mt-2">
                        <div class="flex-grow">
                            <h5 class="text-base font-medium mb-2">${item.name}</h5>
                            <div class="flex items-center space-x-3">
                                <div class="flex items-center">
                                    <input 
                                        type="number" 
                                        class="qty-edit w-16 h-8 text-sm bg-gray-50 rounded border border-gray-100 px-2" 
                                        value="${item.qty}" 
                                        min="1"
                                        data-product-id="${item.id}"
                                    >
                                    <span class="text-sm ml-1">pcs</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-sm mr-1">Rp</span>
                                    <input 
                                        type="number" 
                                        class="price-edit w-24 h-8 text-sm bg-gray-50 rounded border border-gray-100 px-2" 
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
                $("#total-price").text("Rp " + Intl.NumberFormat().format(totalPrice));
                $("#cart-count").text(cart.length);
            }
        }

        $(".add-to-cart").click(function() {
            const productId = $(this).data("product-id");
            const name = $(this).data("product-name");
            const price = $(this).data("product-price");
            const image = $(this).data("product-image");

            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const index = cart.findIndex(item => item.id === productId);
            if (index >= 0) {
                cart[index].qty += 1;
            } else {
                cart.push({
                    id: productId,
                    name,
                    price,
                    image,
                    qty: 1
                });
            }
            updateCart(cart);
        });

        $(document).on("click", ".delete-item", function() {
            const productId = $(this).data("product-id");
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const index = cart.findIndex(item => item.id === productId);
            if (index >= 0) {
                cart.splice(index, 1);
                updateCart(cart);
            }
        });

        $(document).on("change", ".qty-edit", function() {
            const productId = $(this).data("product-id");
            let newQty = parseInt($(this).val()) || 1;

            if (newQty < 1) {
                newQty = 1;
                $(this).val(1);
            }

            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const index = cart.findIndex(item => item.id === productId);
            if (index >= 0) {
                cart[index].qty = newQty;
                updateCart(cart);
            }
        });

        $(document).on("change", ".price-edit", function() {
            const productId = $(this).data("product-id");
            let newPrice = parseInt($(this).val()) || 0;

            if (newPrice < 0) {
                newPrice = 0;
                $(this).val(0);
            }

            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const index = cart.findIndex(item => item.id === productId);
            if (index >= 0) {
                cart[index].price = newPrice;
                updateCart(cart);
            }
        });

        $("#clear-cart").click(function() {
            localStorage.removeItem("cart");
            loadCart();
        });

        // change price by custpm
        $("#customer").change(function() {
            const customerId = $(this).val();
            const cart = JSON.parse(localStorage.getItem('cart')) || [];

            if (customerId) {
                $.ajax({
                    url: "{{ route('pos.getPriceByCustomer') }}",
                    type: "GET",
                    data: {
                        _token: "{{ csrf_token() }}",
                        customer: customerId,
                    },
                    success: function(response) {
                        let cart = JSON.parse(localStorage.getItem("cart")) || [];

                        cart.forEach((item) => {
                            const productData = response.find(p => p.product_id === item.id);
                            if (productData) {
                                item.price = productData.price;
                            }
                        });

                        localStorage.setItem("cart", JSON.stringify(cart));

                        updateCart(cart);
                    },

                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

        });

        $("#submit-payment").click(function() {
            console.log("Submit payment");
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cash = parseInt($("#cash").val()) || 0;
            const totalPrice = cart.reduce((total, item) => total + (item.price * item.qty), 0);
            const change = cash - totalPrice;
            const customer = $("select[name='customer']").val();

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
            const item = JSON.parse(localStorage.getItem('cart')) || [];
            const cash = parseInt($("#cash").val()) || 0;
            const totalPrice = item.reduce((total, item) => total + (item.price * item.qty), 0);
            const change = cash - totalPrice;
            const customer = $("select[name='customer']").val();
            const outlet = "{{ $outlet->id }}";

            $.ajax({
                url: "{{ route('pos.store') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    items: item,
                    cash,
                    total: totalPrice,
                    change,
                    customer,
                    outlet
                },
                success: function(response) {
                    console.log(response);
                    localStorage.removeItem("cart");
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
                    console.error(error);
                }
            });

        });

        loadCart();
    });
</script>
<script>
    $(document).ready(function() {
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

        $("#coupon").change(function() {
        const couponId = $(this).val();
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        let subtotal = 0;

        // Calculate subtotal
        cart.forEach(item => {
            subtotal += item.price * item.qty;
        });

        // Apply coupon discount
        let discount = 0;
        if (couponId) {
            $.ajax({
            url:    `{{ route('coupon.get') }}`,
                type: "GET",
                data: {
                    coupon_id: couponId
                },
                success: function(response) {
                    console.log(response);
                    if (response.type === 'percentage') {
                        discount = subtotal * (response.value / 100);
                    } else {
                        discount =  response.amount 
                    }
                    updateSubtotalAndDiscount(subtotal, discount);
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
        $("#subtotal").text("Rp " + subtotal);
        $("#discount").text("Rp " + discount);
        $("#total-price").text("Rp " + (subtotal - discount));
    }

    });
</script>
<!-- js tampilan mode product -->
<script>
    const tableView = document.getElementById('tableView');
    const gridView = document.getElementById('gridView');
    const tableMode = document.getElementById('tableMode');
    const gridMode = document.getElementById('gridMode');

    // default grid
    tableView.classList.add('hidden');
    tableMode.addEventListener('click', () => {
        tableView.classList.remove('hidden');
        gridView.classList.add('hidden');
        tableMode.classList.add('bg-white', 'text-blue-gray-500');
        gridMode.classList.remove('bg-white', 'text-blue-gray-500');
    });

    gridMode.addEventListener('click', () => {
        tableView.classList.add('hidden');
        gridView.classList.remove('hidden');
        tableMode.classList.remove('bg-white', 'text-blue-gray-500');
        gridMode.classList.add('bg-white', 'text-blue-gray-500');
    });
 

</script>
@endpush

</x-app-layout>

