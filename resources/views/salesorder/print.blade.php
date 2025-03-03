<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Order {{ $salesOrder->reference_no }}</title>
    <style>
        @page {
            size: A4;
            margin: 0;
        }
        
        html, body {
            width: 187mm;
            height: 297mm;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            @if ($isGenereratedPdf)
                margin: 1cm;
            @endif
            @if ($isDirectPrint)
                margin: .5cm 1cm;
            @endif
            padding: 0;
            letter-spacing: normal
        }
        p {
            padding: 0;
            margin:0
        }

        table.table-product {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        .table-product th, .table-product td {
            padding: 5px;
            text-align: left;
            border: 1px solid #000;
        }
        .table-text-currency {
            border-spacing: 0
        }
        .table-text-currency td {
            border: unset;
            padding: 0;
        }

        .text-center {
            text-align: center !important;
        }

        .text-right {
            text-align: right !important;
        }
        .logo-container {
            width: 80px;
            text-align: left;
        }
        .logo-container img {
            max-width: 100%;
            height: auto;
        }
        .page-print {
            page-break-inside: auto !important;
            margin-top: 120px;
            width: 187mm;
        }
        .kop-surat {
            position: fixed;
            top: 0;
            width: 187mm;
        }
    </style>
</head>
<body>
    <div class="kop-surat">
        <table border="0" style="width: 100%">
            <tr>
                @if (!$isDirectPrint)
                    <td class="logo-container" style="padding-right:5px">
                        <img src="{{ $isGenereratedPdf ? public_path('upload/outlets/' . $salesOrder?->outlet?->logo) : asset('upload/outlets/' . $salesOrder?->outlet?->logo) }}" alt="{{ $salesOrder->outlet->name }}">
                    </td>
                @endif
                <td class="outlet-header" width="{{ $isDirectPrint ? '70%' : '50%' }}">
                    <p><strong style="font-size: 16px">Koyasai</strong></p>
                    <p style="font-size: 15px">{{ $salesOrder->outlet->name }}</p>
                    <p>{{ $salesOrder->outlet->address }}</p>
                    <p>Telepon: +62 851-9898-9744 | Email: info@gubugbuah.com</p>
                </td>
                <td style="text-align: right" valign="top">
                    <p><strong style="font-size: 16px">SALES ORDER</strong></p>
                    <p>Tanggal: {{ $salesOrder->created_at->format('d M Y') }}</p>
                    <p>SO Number: {{ $salesOrder->reference_no }}</p>
                    {{-- <p><strong>Kepada Yth:</strong> {{ $salesOrder->customer->name }}</p>
                    <p><strong>Alamat:</strong> {{ $salesOrder->customer->address }}</p> --}}
                </td>
            </tr>
        </table>
        <table border="0" style="width: 100%">
            <td>
                <br>
                <p>Kepada Yth: {{ $salesOrder->customer->name }}</p>
                <p>Alamat: {{ $salesOrder->customer->address }}</p>
            </td>
        </table>
    </div>
    <br>
    <div class="page-print" style="position: relative">
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
    </div>
</body>
</html>
