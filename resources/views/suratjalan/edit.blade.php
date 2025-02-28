<x-app-layout>
    <div>
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>
        <form id="suratJalanForm" class="max-w-6xl m-auto">
            @csrf
            @method('PUT')
            <div class="bg-white dark:bg-slate-800 rounded-md p-5 pb-6">
                <div class="grid sm:grid-cols-2 gap-x-8 gap-y-4">
                
                    <div class="input-area">
                        <label for="sales_order_id" class="form-label">{{ __('No PO') }}</label>
                        <select name="sales_order_id" id="sales_order_id" class="form-control" disabled>
                            <option value="{{ $suratJalan->sales_order_id }}">{{ $suratJalan->salesOrder->reference_no }}</option>
                        </select>
                        <div class="error-message text-red-500 mt-1" id="sales_order_id_error"></div>
                    </div>

                    <div class="input-area">
                        <label for="packer" class="form-label">{{ __('Packer') }}</label>
                        <input type="text" name="packer" id="packer" class="form-control" value="{{ $suratJalan->packer }}">
                        <div class="error-message text-red-500 mt-1" id="packer_error"></div>
                    </div>

                    <div class="input-area">
                        <label for="driver" class="form-label">{{ __('Driver') }}</label>
                        <input type="text" name="driver" id="driver" class="form-control" value="{{ $suratJalan->driver }}">
                        <div class="error-message text-red-500 mt-1" id="driver_error"></div>
                    </div>

                    <div class="input-area">
                        <label for="due_date" class="form-label">{{ __('Due Date') }}</label>
                        <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $suratJalan->due_date }}">
                        <div class="error-message text-red-500 mt-1" id="due_date_error"></div>
                    </div>
                </div>

                <div id="products-list" class="mt-6">
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
                                    <td class="px-6 py-4 text-center" id="total-original-qty">0</td>
                                    <td class="px-6 py-4" id="total-original-amount">0</td>
                                    <td class="px-6 py-4 text-center" id="total-adjusted-qty">0</td>
                                    <td class="px-6 py-4" id="total-adjusted-amount">0</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <button type="submit" class="btn inline-flex justify-center btn-dark mt-4 w-full">
                    {{ __('Update') }}
                </button>
            </div>
        </form>
    </div>
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

            function loadProducts() {
                const suratJalanId = {{ $suratJalan->id }};

                if (suratJalanId) {
                    $.ajax({
                        url: `/suratjalan/get-products/${suratJalanId}?is_edit=true`,
                        type: 'GET',
                        success: function(response) {
                            const tableBody = $('#products-table-body');
                            tableBody.empty();

                            response.products.forEach(function(item) {
                                const adjustedQty = item.adjusted_qty !== undefined ? item.adjusted_qty : item.qty;
                                
                                const row = `
                                <tr data-price="${item.unit_price}" data-original-qty="${item.qty}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        ${item.product.name}
                                        <input type="hidden" name="product_ids[]" value="${item.product_id}">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        ${formatCurrency(item.unit_price)}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        ${item.qty}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        ${formatCurrency(item.unit_price * item.qty)}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="number" 
                                            name="adjusted_quantities[]" 
                                            class="form-control qty-input text-center" 
                                            value="${adjustedQty}"
                                            min="0"
                                            max="${item.product.qty}"
                                            required>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap adjusted-subtotal">
                                        ${formatCurrency(item.unit_price * adjustedQty)}
                                    </td>
                                </tr>
                            `;
                                tableBody.append(row);
                            });

                            updateTotals();

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
                }
            }

            // Load initial data
            loadProducts();

            $('#suratJalanForm').submit(function(e) {
                e.preventDefault();
                $('.error-message').text('');
                const totals = updateTotals();
                const suratJalanId = "{{ $suratJalan->id }}";

                const products = [];
                $('#products-table-body tr').each(function() {
                    const row = $(this);
                    const productId = row.find('input[name="product_ids[]"]').val();
                    const price = parseFloat(row.data('price'));
                    const originalQty = parseFloat(row.data('original-qty'));
                    const adjustedQty = parseFloat(row.find('input[name="adjusted_quantities[]"]').val() || 0);

                    products.push({
                        product_id: productId,
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
                    url: `/suratjalan/${suratJalanId}`,
                    type: 'PUT',
                    data: JSON.stringify(formData),
                    contentType: 'application/json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Surat Jalan updated successfully.');
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
                            alert('Error updating Surat Jalan. Please try again.');
                        }
                    }
                });
            });
        });
    </script>
    @endpush
</x-app-layout>