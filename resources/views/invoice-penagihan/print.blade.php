<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice {{ $invoice?->reference_number }}</title>
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
    </style>
</head>
<body>
    <!-- Kop Surat -->
    <div class="kop-surat">
        <table border="0" style="width: 100%">
            <tr>
                @if (!$isDirectPrint)
                    <td class="logo-container" style="padding-right:5px">
                        <img src="{{ $isGenereratedPdf ? public_path('upload/outlets/' . $invoice?->salesOrder?->outlet?->logo) : asset('upload/outlets/' . $invoice?->salesOrder?->outlet?->logo) }}" alt="{{ $invoice->salesOrder->outlet->name }}">
                    </td>
                @endif
                <td class="outlet-header" width="{{ $isDirectPrint ? '70%' : '50%' }}">
                    <p><strong style="font-size: 16px">Koyasai</strong></p>
                    <p style="font-size: 15px">{{ $invoice?->salesorder?->outlet->name }}</p>
                    <p>{{ $invoice?->salesorder?->outlet->address }}</p>
                    <p>Telepon: +62 851-9898-9744 | Email: info@gubugbuah.com</p>
                </td>
                <td style="text-align: right" valign="top">
                    <p><strong style="font-size: 16px">INVOICE</strong></p>
                    <p><strong>{{ $invoice?->reference_number }}</strong></p>
                    <p>Tanggal: {{ $invoice->created_at->format('d M Y') }}</p>
                    <p>No. PO: {{ $invoice?->salesorder?->reference_no }}</p>
                </td>
            </tr>
        </table>
        <table border="0" style="width: 100%">
            <td>
                <br>
                <p>Kepada Yth: {{ $invoice?->salesorder?->customer->name }}</p>
                <p>Alamat: {{ $invoice?->salesorder?->customer->address }}</p>
            </td>
        </table>
    </div>

    <br>
    <div class="page-print">
        <table style="width: 100%" class="table-product">
            <thead>
                <tr>
                    <th class="text-center" style="width:1%">No</th>
                    <th class="text-center" style="width: 43%">Keterangan</th>
                    <th class="text-center" colspan="2">Qty</th>
                    <th class="text-center" style="width:20%">Harga Satuan</th>
                    <th class="text-center" style="width:20%">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice?->productInvoices as $product)
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
                        <td class="text-center" style="width:8%">{{ $product?->qty }}</td>
                        <td class="text-center" style="width:8%">{{ $product?->product?->unit?->code }}</td>
                        <td>
                            <table class="table-text-currency" style="width: 100%">
                                <tr>
                                    <td style="width: 50%" class="text-left">Rp.</td>
                                    <td style="width: 50%" class="text-right">{{ number_format($product?->price, 0, ',', '.') }}</td>
                                </tr>
                            </table>
                        </td>
                        <td class="text-right">
                            <table class="table-text-currency" style="width: 100%">
                                <tr>
                                    <td style="width: 50%" class="text-left">Rp.</td>
                                    <td style="width: 50%" class="text-right">{{ number_format($product?->total, 0, ',', '.') }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                @if ($invoice?->total_discount > 0)
                    <tr>
                        <td colspan="5" class="text-right" style="border-bottom: unset;border-left:unset"><strong>Discount</strong></td>
                        <td>
                            <table class="table-text-currency" style="width: 100%">
                                <tr>
                                    <td style="width: 50%" class="text-left"><strong>Rp.</strong></td>
                                    <td style="width: 50%" class="text-right"><strong>{{ number_format($invoice?->total_discount, 0, ',', '.') }}</strong></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                @endif
                @if ($invoice?->paid_amount > 0)
                    <tr>
                        <td colspan="5" class="text-right" style="border-bottom: unset;{{ $invoice?->total_discount > 0 ? 'border-top:unset' : '' }};border-left:unset"><strong>Paid Amount</strong></td>
                        <td>
                            <table class="table-text-currency" style="width: 100%">
                                <tr>
                                    <td style="width: 50%" class="text-left"><strong>Rp.</strong></td>
                                    <td style="width: 50%" class="text-right"><strong>{{ number_format($invoice?->paid_amount, 0, ',', '.') }}</strong></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                @endif
                <tr>
                    <td colspan="5" class="text-right" style="border-bottom: unset;border-top:unset; border-left:unset"><strong>Total</strong></td>
                    <td>
                        <table class="table-text-currency" style="width: 100%">
                            <tr>
                                <td style="width: 50%" class="text-left"><strong>Rp.</strong></td>
                                <td style="width: 50%" class="text-right"><strong>{{ number_format($invoice?->grandtotal, 0, ',', '.') }}</strong></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tfoot>
        </table>

        <table style="width: 100%; font-size: 12px;">
            <tr>
                <td valign="top" colspan="2">
                    <p><strong><i>Terbilang:</i></strong></p>
                    <p><i>{{ idrAmountInWords($invoice->grandtotal) }}</i></p>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <br>
                    <p><strong>Note:</strong></p>
                    <p>Untuk pembayaran via transfer bisa melalui Bank BCA dengan nomor rekening 8832 901 902 a.n {{ $invoice->salesOrder->outlet->name }}</p>
                    <p>Atau bisa menghubungi kami di {{ $invoice->salesOrder->outlet->phone }}</p>
                </td>
                <td valign="top" style="width:40%">
                    <table style="width: 100%">
                        <tr>
                            <td style="width: 45%" class="text-center"><strong>Tanda Terima</strong></td>
                            <td></td>
                            <td style="width: 45%" class="text-center"><strong>Hormat Kami</strong></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-center">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
                            <td></td>
                            <td class="text-center">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
