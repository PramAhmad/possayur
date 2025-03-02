<x-app-layout>
    <div>
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>
        <form id="invoiceForm" class="max-w-6xl m-auto">
            @csrf
            @method('POST')
            <div class="bg-white dark:bg-slate-800 rounded-md p-5 pb-6">
                <div class="grid sm:grid-cols-2 gap-x-8 gap-y-4">
                    <div class="input-area">
                        <label for="sales_order_id" class="form-label">{{ __('Sales Order') }}</label>
                        <select name="sales_order_id" id="sales_order_id" class="form-control sales_order_id">
                            <option value="">{{ __('Select Sales Order') }}</option>
                            @foreach ($salesOrders as $so)
                            <option value="{{ $so->id }}">{{ $so->reference_no }}</option>
                            @endforeach
                        </select>
                        <div class="error-message text-red-500 mt-1" id="sales_order_id_error"></div>
                    </div>

                    <div class="input-area">
                        <label for="outlet_id" class="form-label">{{ __('Outlet') }}</label>
                        <input type="text" id="outlet_name" class="form-control" readonly>
                    </div>

                    <div class="input-area">
                        <label for="note" class="form-label">{{ __('Note') }}</label>
                        <textarea name="note" id="note" class="form-control" rows="3"></textarea>
                    </div>
                </div>

                <div id="products-list" class="mt-6 hidden">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Products List') }}</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3">{{ __('Product Name') }}</th>
                                    <th class="px-6 py-3">{{ __('Price') }}</th>
                                    <th class="px-6 py-3">{{ __('Unit') }}</th>
                                    <th class="px-6 py-3">{{ __('Order Qty') }}</th>
                                    <th class="px-6 py-3">{{ __('Surat Jalan Qty') }}</th>
                                    <th class="px-6 py-3">{{ __('Invoice Qty') }}</th>
                                    <th class="px-6 py-3">{{ __('Subtotal') }}</th>
                                </tr>
                            </thead>
                            <tbody id="products-table-body" class="bg-white divide-y divide-gray-200"></tbody>
                            <tfoot class="bg-gray-50">
                                <tr class="row-total-discount hidden">
                                    <td colspan="4" class="px-6 py-4 font-semibold">Total Discount <span class="coupon-type-amount"></span>:</td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4 text-center"></td>
                                    <td class="px-6 py-4" id="total-discount">0</td>
                                </tr>
                                <tr class="row-total-paid-amount hidden">
                                    <td colspan="4" class="px-6 py-4 font-semibold">Paid Amount:</td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4 text-center"></td>
                                    <td class="px-6 py-4" id="total-paid-amount">0</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="px-6 py-4 font-semibold">{{ __('Totals') }}:</td>
                                    <td class="px-6 py-4"></td>
                                    <td class="px-6 py-4 text-center" id="total-invoice-qty">0</td>
                                    <td class="px-6 py-4" id="total-amount">0</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <!-- <div class="grid sm:grid-cols-2 gap-x-8 gap-y-4 mt-4">
                    <div class="input-area">
                        <label for="discount" class="form-label">{{ __('Discount') }}</label>
                        <input type="number" name="discount" id="discount" class="form-control" min="0" step="0.01">
                    </div>
                    <div class="input-area">
                        <label for="grandtotal" class="form-label">{{ __('Grand Total') }}</label>
                        <input type="text" id="grandtotal" class="form-control" readonly>
                    </div>
                </div> -->

                <button type="submit" class="btn inline-flex justify-center btn-dark mt-4">
                    {{ __('Submit') }}
                </button>
                <a href="{{ route('suratjalan.index') }}" class="btn py-3 inline-flex justify-center btn-outline-dark mt-3">Back</a>
            </div>
        </form>
    </div>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js" defer integrity="sha512-4MvcHwcbqXKUHB6Lx3Zb5CEAVoE9u84qN+ZSMM6s7z8IeJriExrV3ND5zRze9mxNlABJ6k864P/Vl8m0Sd3DtQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            $(document).ready(function() {
                let couponId = null
                let couponType = null
                let couponAmount = 0
                let totalPaidAmount = 0

                function formatCurrency(amount) {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(amount);
                }

                function updateTotals() {
                    let totalInvoiceQty = 0;
                    let totalAmount = 0;

                    $('#products-table-body tr').each(function() {
                        const price = parseFloat($(this).data('price'));
                        const invoiceQty = parseFloat($(this).find('input[name="invoice_quantities[]"]').val() || 0);

                        totalInvoiceQty += invoiceQty;
                        totalAmount += price * invoiceQty;
                    });

                    let totalDiscount = 0;

                    if (couponId !== null) {
                        if (couponType == 'percentage') {
                            totalDiscount = (totalAmount * couponAmount) / 100
                            totalAmount = totalAmount - totalDiscount
                        } else {
                            totalDiscount = couponAmount
                            totalAmount = totalAmount > 0 ? totalAmount - totalDiscount : totalAmount
                        }
                    }

                    totalAmount = totalAmount - totalPaidAmount

                    $('#total-invoice-qty').text(totalInvoiceQty);
                    $('#total-amount').text(formatCurrency(totalAmount));
                    $('#total-discount').text(formatCurrency(totalDiscount));
                    $('#total-paid-amount').text(formatCurrency(totalPaidAmount));

                    if (couponId != null) {
                        $('tr.row-total-discount').removeClass('hidden');
                    } else {
                        $('tr.row-total-discount').addClass('hidden');
                    }

                    if (totalPaidAmount > 0) {
                        $('tr.row-total-paid-amount').removeClass('hidden');
                    } else {
                        $('tr.row-total-paid-amount').addClass('hidden');
                    }
                }

                function updateSubtotal(row) {
                    const price = parseFloat(row.data('price'));
                    const quantity = parseFloat(row.find('.qty-input').val() || 0);
                    const subtotal = price * quantity;

                    row.find('.adjusted-subtotal').text(formatCurrency(subtotal));
                }

                $('#sales_order_id').change(function() {
                    const salesOrderId = $(this).val();
                    if (salesOrderId) {
                        $.ajax({
                            url: `/invoice/get-products/${salesOrderId}`,
                            type: 'GET',
                            success: function(response) {
                                console.log('Sales Order details:', response);
                                $('#outlet_id').val(response.salesorder.outlet.id);
                                $('#outlet_name').val(response.salesorder.outlet.name);
                                const tableBody = $('#products-table-body');
                                tableBody.empty();

                                couponId = response?.salesorder?.coupon_id
                                couponType = response?.salesorder?.coupon_type
                                couponAmount = parseFloat(response?.salesorder?.coupon_amount)
                                totalPaidAmount = parseFloat(response?.salesorder?.paid_amount)

                                if (couponType === 'percentage') {
                                    $('.coupon-type-amount').text(`(${couponAmount}%)`);
                                } else {
                                    $('.coupon-type-amount').text('')
                                }

                                $('#products-list').removeClass('hidden');

                                response.products.forEach(function(item) {
                                    const suratJalanQty = item.surat_jalan_qty || 0;
                                    let variantInfo = '';
                                    let batchInfo = '';
                                    let variantId = null;
                                    let batchId = null;

                                    if (item.variant) {
                                        variantInfo = `Variant: ${item.variant.name}`;
                                        variantId = item.variant.id;
                                    }

                                    if (item.batch) {
                                        batchInfo = `Batch: ${item.batch.batch_no}`;
                                        batchId = item.batch.id;
                                    }

                                    const row = `
                                            <tr 
                                                data-price="${item.unit_price}" 
                                                data-product-id="${item.product.id}"
                                                data-variant-id="${variantId}"
                                                data-batch-id="${batchId}"
                                            >
                                                <td>
                                                    ${item.product.name}
                                                    <div class="text-sm text-gray-500 mt-1">
                                                        ${variantInfo} ${batchInfo ? ' | ' + batchInfo : ''}
                                                    </div>
                                                </td>
                                                <td>${formatCurrency(item.unit_price)}</td>
                                                <td>${item.product?.unit?.name ?? '-'}</td>
                                                <td class="text-center">${item.qty}</td>
                                                <td class="text-center">${suratJalanQty}</td>
                                                <td class="text-center">
                                                    <input type="number" 
                                                        name="invoice_quantities[]" 
                                                        class="form-control qty-input text-center" 
                                                        value="${suratJalanQty}" 
                                                        min="0"
                                                        max="${item.product.qty}">
                                                </td>
                                                <td class="adjusted-subtotal">
                                                    ${formatCurrency(item.unit_price * suratJalanQty)}
                                                </td>
                                            </tr>`;
                                    tableBody.append(row);
                                });

                                updateTotals();

                                $('.qty-input').on('input', function() {
                                    const row = $(this).closest('tr');
                                    const maxQty = parseFloat(row.find('td:nth-child(3)').text());
                                    const suratJalanQty = parseFloat(row.find('td:nth-child(4)').text());
                                    const enteredQty = parseFloat($(this).val() || 0);

                                    if (enteredQty > Math.min(maxQty, suratJalanQty)) {
                                        alert('Invoice Qty cannot exceed Order Qty or Surat Jalan Qty.');
                                        $(this).val(Math.min(maxQty, suratJalanQty));
                                    }

                                    updateSubtotal(row);
                                    updateTotals();
                                });
                            },
                            error: function(xhr) {
                                console.error('Error fetching Sales Order details:', xhr);
                                alert('Error fetching details. Please try again.');
                            }
                        });
                    } else {
                        $('#products-list').addClass('hidden');
                    }
                });

                $('#invoiceForm').submit(function(e) {
                    e.preventDefault();
                    let grandTotal = 0;
                    const productDetails = [];
                    const returnDetails = [];
                    let totalReturnQty = 0;
                    let totalReturnGrandtotal = 0;

                    $('#products-table-body tr').each(function() {
                        const $row = $(this);
                        const orderQty = parseFloat($row.find('td:nth-child(3)').text());
                        const suratJalanQty = parseFloat($row.find('td:nth-child(4)').text());
                        const invoiceQty = parseFloat($row.find('.qty-input').val() || 0);

                        const productDetail = {
                            product_id: $row.data('product-id'),
                            variant_id: $row.data('variant-id'),
                            batch_id: $row.data('batch-id'),
                            price: parseFloat($row.data('price')),
                            order_qty: orderQty,
                            surat_jalan_qty: suratJalanQty,
                            invoice_qty: invoiceQty,
                            subtotal: parseFloat($row.data('price')) * invoiceQty
                        };

                        const returnQty = orderQty - invoiceQty;
                        const returnGrandTotal = returnQty * parseFloat($row.data('price'));
                        grandTotal += productDetail.subtotal;

                        if (returnQty > 0) {
                            const returnItem = {
                                product_id: $row.data('product-id'),
                                variant_id: $row.data('variant-id'),
                                batch_id: $row.data('batch-id'),
                                return_qty: returnQty,
                                price: parseFloat($row.data('price')),
                                subtotal: returnQty * parseFloat($row.data('price'))
                            };
                            returnDetails.push(returnItem);
                            totalReturnGrandtotal += returnGrandTotal;
                            totalReturnQty += returnQty;
                        }

                        productDetails.push(productDetail);
                    });

                    const formData = {
                        sales_order_id: $('#sales_order_id').val(),
                        outlet_id: $('#outlet_id').val(),
                        note: $('#note').val(),
                        total_qty: $('#total-invoice-qty').text(),
                        grandtotal: grandTotal,
                        products: productDetails,
                        returns: {
                            total_qty: totalReturnQty,
                            total_grandtotal: totalReturnGrandtotal,
                            products: returnDetails
                        },
                        _token: $('input[name="_token"]').val()
                    };

                    $.ajax({
                        url: "{{ route('invoice.store') }}",
                        type: 'POST',
                        data: JSON.stringify(formData),
                        contentType: 'application/json',
                        beforeSend: function() {
                            // swal
                            Swal.fire({
                                title: 'Please wait...',
                                html: 'Creating invoice...',
                                didOpen: () => {
                                    Swal.showLoading();
                                }
                            });
                        },
                        success: function(response) {
                            // swal
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Invoice created successfully.'
                            }).then(function() {
                                window.location.href = `{{ route('invoice.index') }}`;
                            });

                        },
                        error: function(xhr) {
                            console.error('Error creating invoice:', xhr);
                            // swal
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Error creating invoice. Please try again.'
                            });
                        }
                    });
                });

                $('.sales_order_id').select2({
                    dropdownCssClass: "select2-font"
                })
            });
        </script>
    @endpush
    @push('styles')
        <style>
            .select2-container--default .select2-selection--single {
                border-color: rgb(226, 232, 240, 1) !important;
                border-width: 1px !important;
            }

            .select2-font,
            .select2-selection__rendered {
                font-size: .875rem;
            }

            .select2-container .select2-selection--single {
                height: 2.3rem;
            }
        </style>
    @endpush
</x-app-layout>