<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        :root {
            @if ($isGenereratedPdf)
                --page_width: 19cm;
                --paper_size: A4
            @endif
            @if ($isDirectPrint)
                --page_width: 18.6cm;
                --paper_size: 21.70cm 28cm
            @endif
        }
        @page {
            size: var(--paper_size);
            margin: 0;
        }
        
        html, body {
            @if ($isDirectPrint)
                width: 18.4cm;
            @elseif ($isGenereratedPdf)
                width: 21cm;
            @else
                width: 21cm;
            @endif
            height: 29.7cm;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            @if ($isGenereratedPdf)
                margin: 1cm;
                padding-top: 170px;
            @elseif ($isDirectPrint)
                padding: .5cm 1cm;
                padding-top: 170px;
            @endif
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
        .page-content {
            page-break-inside: always !important;
            width: var(--page_width);
        }
        .header {
            @if ($isGenereratedPdf | $isDirectPrint)
                position: fixed;
            @endif
            width: var(--page_width);
            @if ($isGenereratedPdf)
                top: 1cm
            @endif
            @if ($isDirectPrint)
                top: .5cm
            @endif
        }
    </style>
    @stack('css')
</head>
<body>
    <div class="header">
        <table border="0" style="width: 100%">
            <tr>
                @if (!$isDirectPrint)
                    <td class="logo-container" style="padding-right:5px">
                        <img src="{{ $isGenereratedPdf ? public_path('upload/outlets/' . $outlet?->logo) : asset('upload/outlets/' . $outlet?->logo) }}" alt="{{ $outlet->name }}">
                    </td>
                @endif
                <td class="outlet-header" width="{{ $isDirectPrint ? '70%' : '50%' }}">
                    <p><strong style="font-size: 16px">Koyasai</strong></p>
                    <p style="font-size: 15px">{{ $outlet->name }}</p>
                    <p>{{ $outlet->address }}</p>
                    <p>Telepon: +62 851-9898-9744 | Email: info@gubugbuah.com</p>
                </td>
                <td style="text-align: right" valign="top">
                    @yield('right_header')
                </td>
            </tr>
        </table>
        <table border="0" style="width: 100%">
            <td>
                <br>
                <p>Kepada Yth: {{ $customer->name }}</p>
                <p>Alamat: {{ $customer->address }}</p>
            </td>
        </table>
    </div>
    <div class="page-content">
        @yield('content')
    </div>
</body>
</html>
