<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="{{ $allSetting->favicon_url }}" />
    <title>Invoice</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <style type="text/css">
        * {
            font-size: 14px;
            line-height: 24px;
            font-family: 'Ubuntu', sans-serif;
            text-transform: capitalize;
        }

        .btn {
            padding: 7px 10px;
            text-decoration: none;
            border: none;
            display: block;
            text-align: center;
            margin: 7px;
            cursor: pointer;
        }

        .btn-info {
            background-color: #999;
            color: #FFF;
        }

        .btn-primary {
            background-color: #6449e7;
            color: #FFF;
            width: 100%;
        }

        td,
        th,
        tr,
        table {
            border-collapse: collapse;
        }

        tr {
            border-bottom: 1px dotted #ddd;
        }

        td,
        th {
            padding: 7px 0;
            width: 50%;
        }

        table {
            width: 100%;
        }

        tfoot tr th:first-child {
            text-align: left;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        small {
            font-size: 11px;
        }

        @media print {
            * {
                font-size: 12px;
                line-height: 20px;
            }

            td,
            th {
                padding: 5px 0;
            }

            .hidden-print {
                display: none !important;
            }

            @page {
                margin: 1.5cm 0.5cm 0.5cm;
            }

            @page: first {
                margin-top: 0.5cm;
            }

            /*tbody::after {
                content: ''; display: block;
                page-break-after: always;
                page-break-inside: avoid;
                page-break-before: avoid;
            }*/
        }
    </style>
</head>

<body>

    <div style="max-width:400px;margin:0 auto">
        @if (preg_match('~[0-9]~', url()->previous()))
            @php $url = '../../pos'; @endphp
        @else
            @php $url = url()->previous(); @endphp
        @endif
        <div class="hidden-print">
            <table>
                <tr>
                    <td><a href="{{ $url }}" class="btn btn-info"><i class="fa fa-arrow-left"></i>
                            Back</a> </td>
                    <td><button onclick="window.print();" class="btn btn-primary">
                            <i class="dripicons-print"></i>
                            Print</button></td>
                </tr>
            </table>
            <br>
        </div>

        <div id="receipt-data">
            <div class="centered">
                <img src="{{ $allSetting->logo_url }}" height="100" width="250" style="margin:10px 0;">
                <h2>{{ $setting->title }}</h2>

                <p>Address: {{ $setting->address }}
                    <br>Phone Number: {{ $setting->phone }}
                </p>
            </div>
            <p>Date:
                {{ $order->date }}<br>
                customer: Walk-In Customer
            </p>
            <table class="table-data">
                <tbody>
                    @foreach ($allProduct as $key => $value)
                        <tr>
                            <td colspan="2">
                                {{ $value->products->title }}
                                <br>{{ $value->qty }} x
                                {{ $value->price }}
                            </td>
                            <td style="text-align:right;vertical-align:bottom">
                                {{ $value->total }}
                            </td>
                        </tr>
                    @endforeach

                    <!-- <tfoot> -->
                    <tr>
                        <th colspan="2" style="text-align:left">SubTotal</th>
                        <th style="text-align:right">
                            {{ $order->subtotal }}
                        </th>
                    </tr>
                    @if ($order->discount)
                        <tr>
                            <td colspan="2">Discount</td>
                            <td style="text-align:right">
                                {{ $order->discount }}
                            </td>
                        </tr>
                    @endif
                    @if ($order->tax)
                        <tr>
                            <td colspan="2">Tax</td>
                            <td style="text-align:right">
                                {{ $order->tax }}
                            </td>
                        </tr>
                    @endif


                    <tr>
                        <th colspan="2" style="text-align:left">Grand total</th>
                        <th style="text-align:right">
                            {{ $order->total }}
                        </th>
                    </tr>
                    <tr>
                        <th class="centered" colspan="3">In Words:
                            <span></span>
                            <span>{{$order->getCurrency($order->total)}}</span>
                        </th>

                    </tr>
                </tbody>
                <!-- </tfoot> -->
            </table>
            <table>
                <tbody>
                    <tr>
                        <td class="centered" colspan="3">
                            Thank you for shopping with us. Please come again</td>
                    </tr>
                    <tr>
                        <td class="centered" colspan="3">
                            <img style="margin-top:10px;" src="{{ $setting->qr_url }}" alt="QRcode" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

    <script type="text/javascript">
        localStorage.clear();

        function auto_print() {
            window.print();
        }
        setTimeout(auto_print, 1000);
    </script>

</body>

</html>
