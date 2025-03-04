@extends('print-document.layout')

@section('title', 'Sales Order ' . $salesOrder->reference_no)

@section('content')
    <table style="width: 100%" class="table-product">
        <thead>
            <tr>
                <th class="text-center" style="width:1%">NO</th>
                <th class="text-center" style="width: 43%">PRODUCT</th>
                <th class="text-center" style="width: 1%">QTY</th>
                <th class="text-center">UNIT</th>
                <th class="text-center" style="width:20%">UNIT PRICE</th>
                <th class="text-center" style="width:20%">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salesOrder?->products as $product)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>
                        {{ $product?->product?->name }}
                        @if ($product->variant)
                            <div style="font-size: 10px; color: #666;">Variant: {{ $product?->variant?->name }}</div>
                        @endif
                        @if ($product->batch)
                            <div style="font-size: 10px; color: #666;">Batch: {{ $product?->batch?->batch_no }}</div>
                        @endif
                    </td>
                    <td class="text-center">{{ $product?->qty }}</td>
                    <td class="text-center">{{ $product?->product?->unit?->code }}</td>
                    <td>
                        <table class="table-text-currency" style="width: 100%">
                            <tr>
                                <td style="width: 50%" class="text-left">Rp.</td>
                                <td style="width: 50%" class="text-right">{{ number_format($product?->unit_price, 0, ',', '.') }}</td>
                            </tr>
                        </table>
                    </td>
                    <td class="text-right">
                        <table class="table-text-currency" style="width: 100%">
                            <tr>
                                <td style="width: 50%" class="text-left">Rp.</td>
                                <td style="width: 50%" class="text-right">{{ number_format($product?->total_price, 0, ',', '.') }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            @endforeach
            <tr class="font-bold">
                <td colspan="5" class="text-right"><strong>Grand Total</strong></td>
                <td style="width:20%">
                    <table class="table-text-currency" style="width: 100%">
                        <tr>
                            <td style="width: 50%" class="text-left">Rp.</td>
                            <td style="width: 50%" class="text-right">{{ number_format($salesOrder->grandtotal, 0, ',', '.') }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
@endsection

@section('right_header')
    <p><strong style="font-size: 16px">SALES ORDER</strong></p>
    <p>Tanggal: {{ $salesOrder->created_at->format('d M Y') }}</p>
    <p>SO Number: {{ $salesOrder->reference_no }}</p>
@endsection