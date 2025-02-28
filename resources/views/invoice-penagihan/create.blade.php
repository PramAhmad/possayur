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
                        <select name="sales_order_id" id="sales_order_id" class="form-control">
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
                        <input type="hidden" name="outlet_id" id="outlet_id">
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
                                <tr>
                                    <td colspan="3" class="px-6 py-4 font-semibold">{{ __('Totals') }}:</td>
                                    <td class="px-6 py-4"></td> <!-- Surat Jalan Qty total -->
                                    <td class="px-6 py-4" id="total-invoice-qty">0</td>
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

                <button type="submit" class="btn inline-flex justify-center btn-dark mt-4 w-full">
                    {{ __('Save Invoice') }}
                </button>
            </div>
        </form>
    </div>

    @push('scripts')
 <script>
    $(document).ready(function() {
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

        $('#total-invoice-qty').text(totalInvoiceQty);
        $('#total-amount').text(formatCurrency(totalAmount));
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
                                <td>${item.product.unit.name}</td>
                                <td>${item.qty}</td>
                                <td>${suratJalanQty}</td>
                                <td>
                                    <input type="number" 
                                           name="invoice_quantities[]" 
                                           class="form-control qty-input" 
                                           value="${suratJalanQty}" 
                                           min="0"
                                           max="${item.qty}">
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
            success: function(response) {
                alert('Invoice created successfully.');
            },
            error: function(xhr) {
                console.error('Error creating invoice:', xhr);
                alert('Error occurred. Please try again.');
            }
        });
    });
});
 </script>
    @endpush
</x-app-layout>