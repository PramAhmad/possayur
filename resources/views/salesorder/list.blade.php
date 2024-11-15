@extends('layouts.pos')
@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-semibold text-sky-600 mb-4">Sales Orders</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border  border-sky-200 rounded-2xl shadow-lg ">
            <thead class="bg-sky-600 text-white rounded-t-xl">
                <tr>
                    <th class="px-4 py-4 rounded-tl-xl">#</th>
                    <th class="px-4 py-2">Customer</th>
                    <th class="px-4 py-2">Reference No</th>
                    <th class="px-4 py-2">Coupon</th>
                    <th class="px-4 py-2">Total Qty</th>
                    <th class="px-4 py-2">Total Discount</th>
                    <th class="px-4 py-2">Total Tax</th>
                    <th class="px-4 py-2">Grand Total</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Paid Amount</th>
                    <th class="px-4 py-2 rounded-tr-xl">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salesOrder as $order)
                <tr class="border-b border-sky-200">
                    <td class="px-4 py-4 text-center">
                        {{ $loop->iteration }}
                    </td>
                    <td class="px-4 py-4 text-center">{{ $order->customer->name }}</td>
                    <td class="px-4 py-4 text-center">{{ $order->reference_no }}</td>
                    <td class="px-4 py-4 text-center">{{ $order->coupon_id ?? '-' }}</td>
                    <td class="px-4 py-4 text-center">{{ $order->total_qty }}</td>
                    <td class="px-4 py-4 text-center">{{ $order->total_discount }}</td>
                    <td class="px-4 py-4 text-center">{{ $order->total_tax }}</td>
                    <td class="px-4 py-4 text-center">{{ 'Rp '. number_format($order->grandtotal) }}</td>
                    <td class="px-4 py-4 text-center">
                        @if ($order->status === 'pending')
                            <span class="px-3 py-1 text-sm font-semibold text-yellow-800 bg-yellow-200 rounded-full">Pending</span>
                        @elseif ($order->status === 'completed')
                            <span class="px-3 py-1 text-sm font-semibold text-green-800 bg-green-200 rounded-full">Completed</span>
                        @elseif ($order->status === 'canceled')
                            <span class="px-3 py-1 text-sm font-semibold text-red-800 bg-red-200 rounded-full">Canceled</span>
                        @endif
                    </td>

                    <td class="px-4 py-4 text-center">{{ 'Rp '. number_format($order->paid_amount) }}</td>
                    <td class="px-4 py-2 text-center">
    <div class="flex space-x-2 justify-center">
        <!-- Edit button -->
        <a href="" class="text-sky-600 hover:text-sky-900 p-2 border border-sky-300 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 7.125L16.862 4.487" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>
        </a>

        <!-- View button -->
        <a href="" class="text-gray-500 hover:text-gray-700 p-2 border border-gray-300 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
        </a>

        <!-- Delete button -->
        <a href="" class="text-red-300 hover:text-red-500    p-2 border border-red-300 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg>
        </a>
    </div>
</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
