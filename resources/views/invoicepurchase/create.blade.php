<x-app-layout>
<div class="mb-6">
            {{-- BreadCrumb --}}
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>
    <div class="container mx-auto p-4">
        <form id="invoicePurchaseForm" class="max-w-6xl mx-auto">
            @csrf
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="grid sm:grid-cols-2 gap-x-8 gap-y-4">
                    <div class="input-area">
                        <label for="purchase_order_id" class="block font-medium">Purchase Order</label>
                        <select name="purchase_order_id" id="purchase_order_id" class="form-control w-full">
                            <option value="">Select Purchase Order</option>
                            @foreach($purchaseOrders as $po)
                            <option value="{{ $po->id }}">{{ $po->reference_no }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-area">
                        <label for="outlet_id" class="block font-medium">Outlet</label>
                        <select name="outlet_id" id="outlet_id" class="form-control w-full">
                            <option value="">Select Outlet</option>
                            @foreach($outlets as $outlet)
                            <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div id="products-list" class="mt-6 ">
                    <table class="min-w-full border border-gray-200 divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Product Name') }}
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Price') }}
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Original Qty') }}
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Invoice Qty') }}
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Return Qty') }}
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Invoice Total') }}
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Return Total') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody id="products-table-body" class="bg-white divide-y divide-gray-200">
                        </tbody>
                        <tfoot class="bg-gray-50">
                            <tr>
                                <td colspan="3" class="px-6 py-4 font-semibold">Totals:</td>
                                <td class="px-6 py-4" id="total-invoice-qty">0</td>
                                <td class="px-6 py-4" id="total-return-qty">0</td>
                                <td colspan="2" class="px-8 py-4 text-end" id="total-amount"></td>
                            </tr>
                        </tfoot>

                    </table>
                </div>

                <div class="mt-6">
                    <button type="submit" class="btn inline-flex justify-center btn-dark mt-4 w-full">
                        Create Invoice Purchase
                    </button>
                </div>
            </div>
        </form>
    </div>

 @push('scripts')
 <!-- swal cdn -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script>
        $(document).ready(function() {
    const $purchaseOrderSelect = $('#purchase_order_id');
    const $outletSelect = $('#outlet_id');
    const $productsTableBody = $('#products-table-body');
    const $invoicePurchaseForm = $('#invoicePurchaseForm');

    function formatCurrency(amount) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(amount);
    }

    function updateTableTotals() {
        let totalInvoiceQty = 0;
        let totalReturnQty = 0;
        let totalInvoiceSubtotal = 0;
        let totalReturnSubtotal = 0;
        let totalAmount = 0;

        $productsTableBody.find('tr').each(function() {
            const $row = $(this);
            const originalQty = parseFloat($row.data('original-qty')) || 0;
            const unitPrice = parseFloat($row.data('unit-price')) || 0;
            const $invoicedQtyInput = $row.find('.invoiced-qty');
            
            // Validate invoice quantity
            const invoicedQty = Math.min(
                parseFloat($invoicedQtyInput.val()) || 0, 
                originalQty
            );
            $invoicedQtyInput.val(invoicedQty);

            const invoiceSubtotal = unitPrice * invoicedQty;
            const returnQty = Math.max(originalQty - invoicedQty, 0);
            const returnSubtotal = unitPrice * returnQty;

            $row.find('.return-qty').text(returnQty);
            $row.find('.invoice-subtotal').text(formatCurrency(invoiceSubtotal));
            $row.find('.return-subtotal').text(formatCurrency(returnSubtotal));

            totalInvoiceQty += invoicedQty;
            totalReturnQty += returnQty;
            totalInvoiceSubtotal += invoiceSubtotal;
            totalReturnSubtotal += returnSubtotal;
        });

        totalAmount = totalInvoiceSubtotal + totalReturnSubtotal;

        $('#total-invoice-qty').text(totalInvoiceQty);
        $('#total-return-qty').text(totalReturnQty);
        
            $('#total-amount').html(`
            <div>Invoice Subtotal: ${formatCurrency(totalInvoiceSubtotal)}</div>
            <div>Return Subtotal: ${formatCurrency(totalReturnSubtotal)}</div>
            <div class="font-bold">Total Amount: ${formatCurrency(totalAmount)}</div>
        `);
    }

    function fetchProductsForPurchaseOrder(purchaseOrderId) {
    if (!purchaseOrderId) return;

    $.ajax({
        url: `/invoicepurchase/get-products/${purchaseOrderId}`,
        method: 'GET',
        success: function(response) {
            $productsTableBody.empty();
            console.log(response);
            response.products.forEach(function(productItem) {
                const product = productItem.product;
                const row = `
                    <tr data-product-id="${product.id}" 
                        data-unit-price="${product.cost_price}"
                        data-original-qty="${productItem.quantity}"> <!-- Gunakan quantity dari ProductPurchase -->
                        <td class="px-6 py-3">${product.name}</td>
                        <td class="px-6 py-3">${formatCurrency(product.cost_price)}</td>
                        <td class="px-6 py-3">${productItem.quantity}</td> <!-- Tampilkan quantity dari ProductPurchase -->
                        <td class="px-6 py-3">
                            <input type="number" 
                                class="form-control invoiced-qty" 
                                max="${productItem.quantity}" 
                                min="0" 
                                value="${productItem.quantity}">
                        </td>
                        <td class="return-qty">0</td>
                        <td class="invoice-subtotal">${formatCurrency(0)}</td>
                        <td class="return-subtotal">${formatCurrency(0)}</td>
                    </tr>
                `;
                $productsTableBody.append(row);
            });

            // set outlet cuy
            $outletSelect.val(response.outlet_id).prop('disabled', true);

            $productsTableBody.find('.invoiced-qty').on('input', updateTableTotals);
            updateTableTotals();
        },
        error: function() {
            alert('Failed to load products for the selected purchase order.');
        }
    });
}
$purchaseOrderSelect.on('change', function() {
    const selectedPurchaseOrderId = $(this).val();
    if (!selectedPurchaseOrderId) {
        $outletSelect.val('').prop('disabled', false); // Aktifkan kembali dan reset nilai
        $productsTableBody.empty(); // Kosongkan tabel produk
        updateTableTotals(); // Update total
    } else {
        fetchProductsForPurchaseOrder(selectedPurchaseOrderId);
    }
});
function handleInvoicePurchaseSubmit(e) {
    e.preventDefault();

    // Calculate totals before submission
    let totalInvoiceQty = 0;
    let totalReturnQty = 0;
    let totalInvoiceAmount = 0;
    let totalReturnAmount = 0;

    const products = $productsTableBody.find('tr').map(function() {
        const $row = $(this);
        const originalQty = parseFloat($row.data('original-qty')) || 0;
        const unitPrice = parseFloat($row.data('unit-price')) || 0;
        const invoicedQty = parseFloat($row.find('.invoiced-qty').val()) || 0;
        const returnQty = originalQty - invoicedQty;

        const invoiceAmount = invoicedQty * unitPrice;
        const returnAmount = returnQty * unitPrice;

        totalInvoiceQty += invoicedQty;
        totalReturnQty += returnQty;
        totalInvoiceAmount += invoiceAmount;
        totalReturnAmount += returnAmount;

        return {
            product_id: $row.data('product-id'),
            unit_price: unitPrice,
            original_quantity: originalQty,
            invoiced_quantity: invoicedQty,
            return_quantity: returnQty,
            invoice_amount: invoiceAmount,
            return_amount: returnAmount
        };
    }).get();

    const formData = {
        _token: '{{ csrf_token() }}',
        purchase_order_id: $purchaseOrderSelect.val(),
        outlet_id: $outletSelect.val(),
        products: products,
        total_invoice_qty: totalInvoiceQty,
        total_return_qty: totalReturnQty,
        total_invoice_amount: totalInvoiceAmount,
        total_return_amount: totalReturnAmount,
        total_amount: totalInvoiceAmount + totalReturnAmount
    };

    $.ajax({
        url: '{{ route("invoicepurchase.store") }}',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(formData),
        success: function() {
            swal("Success", "Invoice Purchase created successfully", "success")
                .then(() => {
                    window.location.href = '{{ route("invoicepurchase.index") }}';
                });
        },
        error: function(xhr) {
            const errorMessage = xhr.responseJSON?.message || 'Failed to create invoice. Please check your input.';
            swal("Error", errorMessage, "error");
        }
    });
}
    $purchaseOrderSelect.on('change', function() {
        fetchProductsForPurchaseOrder($(this).val());
    });

    $invoicePurchaseForm.on('submit', handleInvoicePurchaseSubmit);
});
     </script>
 @endpush
</x-app-layout>