<x-app-layout>
    <div>
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>
        <form id="suratJalanForm" class="max-w-6xl m-auto">
            @csrf
            @method('POST')
            <div class="bg-white dark:bg-slate-800 rounded-md p-5 pb-6">
                <div class="grid sm:grid-cols-2 gap-x-8 gap-y-4">
                
                    <div class="input-area">
                        <label for="sales_order_id" class="form-label">{{ __('No PO') }}</label>
                        <select name="sales_order_id" id="sales_order_id" class="form-control">
                            <option value="">{{ __('Select No PO') }}</option>
                            @foreach ($salesOrder as $s)
                            <option value="{{ $s->id }}">{{ $s->reference_no }}</option>
                            @endforeach
                        </select>
                        <div class="error-message text-red-500 mt-1" id="sales_order_id_error"></div>
                    </div>

                    <div class="input-area">
                        <label for="packer" class="form-label">{{ __('Packer') }}</label>
                        <input type="text" name="packer" id="packer" class="form-control" value="{{ old('packer') }}">
                        <div class="error-message text-red-500 mt-1" id="packer_error"></div>
                    </div>

                    <div class="input-area">
                        <label for="driver" class="form-label">{{ __('Driver') }}</label>
                        <input type="text" name="driver" id="driver" class="form-control" value="{{ old('driver') }}">
                        <div class="error-message text-red-500 mt-1" id="driver_error"></div>
                    </div>

                    <div class="input-area">
                        <label for="due_date" class="form-label">{{ __('Due Date') }}</label>
                        <input type="date" name="due_date" id="due_date" class="form-control" value="{{ old('due_date') }}">
                        <div class="error-message text-red-500 mt-1" id="due_date_error"></div>
                    </div>
                </div>



                <div id="products-list" class="mt-6 hidden">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Products List') }}</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
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
                                        {{ __('Subtotal') }}
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Adjusted Qty') }}
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Adjusted Subtotal') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="products-table-body" class="bg-white divide-y divide-gray-200">
                            </tbody>
                            <tfoot class="bg-gray-50">
                                <tr>
                                    <td colspan="2" class="px-6 py-4 font-semibold">Totals:</td>
                                    <td class="px-6 py-4" id="total-original-qty">0</td>
                                    <td class="px-6 py-4" id="total-original-amount">0</td>
                                    <td class="px-6 py-4" id="total-adjusted-qty">0</td>
                                    <td class="px-6 py-4" id="total-adjusted-amount">0</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <button type="submit" class="btn inline-flex justify-center btn-dark mt-4 w-full">
                    {{ __('Save') }}
                </button>
            </div>
        </form>
    </div>
    </div>

    @push('scripts')
   <script>$(document).ready(function() {
    function formatCurrency(amount) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(amount);
    }

    function updateTotals() {
        let totalOriginalQty = 0;
        let totalOriginalAmount = 0;
        let totalAdjustedQty = 0;
        let totalAdjustedAmount = 0;

        $('#products-table-body tr').each(function() {
            const price = parseFloat($(this).data('price'));
            const originalQty = parseFloat($(this).data('original-qty'));
            const adjustedQty = parseFloat($(this).find('input[name="adjusted_quantities[]"]').val() || 0);

            totalOriginalQty += originalQty;
            totalOriginalAmount += price * originalQty;
            totalAdjustedQty += adjustedQty;
            totalAdjustedAmount += price * adjustedQty;
        });

        $('#total-original-qty').text(totalOriginalQty);
        $('#total-original-amount').text(formatCurrency(totalOriginalAmount));
        $('#total-adjusted-qty').text(totalAdjustedQty);
        $('#total-adjusted-amount').text(formatCurrency(totalAdjustedAmount));

        return {
            totalOriginalQty,
            totalOriginalAmount,
            totalAdjustedQty,
            totalAdjustedAmount
        };
    }

    $('#sales_order_id').change(function() {
        const salesOrderId = $(this).val();
        if (salesOrderId) {
            $('#products-list').removeClass('hidden');

            $.ajax({
                url: `/suratjalan/get-products/${salesOrderId}`,
                type: 'GET',
                success: function(response) {
                    const tableBody = $('#products-table-body');
                    tableBody.empty();

                    response.products.forEach(function(item) {
                        // Prepare variant and batch information
                        const variantInfo = item.variant 
                            ? ` (Variant: ${item.variant.name})` 
                            : '';
                        const batchInfo = item.batch 
                            ? ` (Batch: ${item.batch.batch_number})` 
                            : '';

                        const row = `
                        <tr data-price="${item.unit_price}" data-original-qty="${item.qty}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                ${item.product.name}${variantInfo}${batchInfo}
                                <input type="hidden" name="product_ids[]" value="${item.product_id}">
                                ${item.variant ? `<input type="hidden" name="variant_ids[]" value="${item.variant.id}">` : ''}
                                ${item.batch ? `<input type="hidden" name="batch_ids[]" value="${item.batch.id}">` : ''}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                ${formatCurrency(item.unit_price)}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                ${item.qty}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                ${formatCurrency(item.unit_price * item.qty)}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="number" 
                                       name="adjusted_quantities[]" 
                                       class="form-control qty-input" 
                                       value="${item.qty}"
                                       min="0"
                                       max="${item.qty}"
                                       required>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap adjusted-subtotal">
                                ${formatCurrency(item.unit_price * item.qty)}
                            </td>
                        </tr>
                    `;
                    tableBody.append(row);
                    });

                    // Set outlet_id if available
                    if (response.outlet_id) {
                        $('#outlet_id').val(response.outlet_id);
                    }

                    updateTotals();

                    // Add event listener for quantity changes
                    $('.qty-input').on('input', function() {
                        const row = $(this).closest('tr');
                        const price = parseFloat(row.data('price'));
                        const quantity = parseFloat($(this).val() || 0);
                        row.find('.adjusted-subtotal').text(formatCurrency(price * quantity));
                        updateTotals();
                    });
                },
                error: function(xhr) {
                    console.error('Error fetching products:', xhr);
                    alert('Error fetching products. Please try again.');
                }
            });
        } else {
            $('#products-list').addClass('hidden');
        }
    });

    $('#suratJalanForm').submit(function(e) {
        e.preventDefault();
        $('.error-message').text('');
        const totals = updateTotals();

        const products = [];
        $('#products-table-body tr').each(function() {
            const row = $(this);
            const productId = row.find('input[name="product_ids[]"]').val();
            const variantId = row.find('input[name="variant_ids[]"]').val() || null;
            const batchId = row.find('input[name="batch_ids[]"]').val() || null;
            const price = parseFloat(row.data('price'));
            const originalQty = parseFloat(row.data('original-qty'));
            const adjustedQty = parseFloat(row.find('input[name="adjusted_quantities[]"]').val() || 0);

            products.push({
                product_id: productId,
                variant_id: variantId,
                batch_id: batchId,
                unit_price: price,
                original_qty: originalQty,
                adjusted_qty: adjustedQty,
                original_subtotal: price * originalQty,
                adjusted_subtotal: price * adjustedQty
            });
        });

        const formData = {
            packer: $('#packer').val(),
            driver: $('#driver').val(),
            due_date: $('#due_date').val(),
            outlet_id: $('#outlet_id').val(),
            sales_order_id: $('#sales_order_id').val(),
            products: products,
            summary: {
                total_original_qty: totals.totalOriginalQty,
                total_original_amount: totals.totalOriginalAmount,
                total_adjusted_qty: totals.totalAdjustedQty,
                total_adjusted_amount: totals.totalAdjustedAmount
            },
            _token: $('input[name="_csrf"]').val()
        };

        $.ajax({
            url: "{{ route('suratjalan.store') }}",
            type: 'POST',
            data: JSON.stringify(formData),
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    alert('Surat Jalan created successfully.');
                    window.location.href = "{{ route('suratjalan.index') }}";
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    Object.keys(errors).forEach(key => {
                        $(`#${key}_error`).text(errors[key][0]);
                    });
                } else {
                    alert('Error creating Surat Jalan. Please try again.');
                }
            }
        });
    });
});</script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
    <script>

    </script>
    @endpush
</x-app-layout>