<html>
<head>
    <title>
        Invoice
    </title>

{{--    <link href="{{asset('css/style.css')}}" rel="stylesheet">--}}
</head>
<body>
<style>

    #invoice{
        /*padding: 30px;*/
    }

    .invoice {
        position: relative;
        background-color: #FFF;
        min-height: 680px;
        padding: 15px
    }

    .invoice header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #3989c6
    }

    .invoice .company-details {
        text-align: right
    }

    .invoice .company-details .name {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .contacts {
        margin-bottom: 20px
    }

    .invoice .invoice-to {
        text-align: left
    }

    .invoice .invoice-to .to {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .invoice-details {
        text-align: right
    }

    .invoice .invoice-details .invoice-id {
        margin-top: 0;
        color: #3989c6
    }

    .invoice main {
        padding-bottom: 50px
    }

    .invoice main .thanks {
        margin-top: 100px !important;
        font-size: 1.8em;
        margin-bottom: 50px
    }

    .invoice main .notices {
        padding-left: 6px;
        border-left: 6px solid #3989c6;
    }

    .invoice main .notices .notice {
        font-size: 1.2em
    }

    .invoice table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px
    }

    .invoice table td,.invoice table th {
        padding: 15px;
        background: #eee;
        border-bottom: 1px solid #fff
    }

    html, body {
        display: block;
    }

    .invoice table th {
        white-space: nowrap;
        font-weight: 400;
        font-size: 16px
    }

    .invoice table td h3 {
        margin: 0;
        font-weight: 400;
        /* color: #3989c6; */
        font-size: 1.2em
    }

    .invoice table .qty,.invoice table .total,.invoice table .unit {
        text-align: right;
        /* font-size: 1.2em */
    }

    .invoice table .no {
        color: #fff;
        font-size: 1.6em;
        background: #3989c6
    }

    .invoice table .unit {
        /* background: #ddd */
    }

    .invoice table .total {
        background: #3989c6;
        color: #fff
    }

    .invoice table tbody tr:last-child td {
        border: none
    }

    .invoice table tfoot td {
        background: 0 0;
        border-bottom: none;
        white-space: nowrap;
        text-align: right;
        padding: 10px 20px;
        font-size: 1.2em;
        border-top: 1px solid #aaa
    }

    .invoice table tfoot tr:first-child td {
        border-top: none
    }

    .invoice table tfoot tr:nth-child(3) td {
        color: #000;
        font-size: 1.4em;
        border-top: 1px solid #3989c6
    }

    .invoice table tfoot tr td:first-child {
        border: none
    }

    .invoice footer {
        width: 100%;
        text-align: center;
        color: #777;
        border-top: 1px solid #aaa;
        padding: 8px 0
    }

    @media print {
        .invoice {
            font-size: 11px!important;
            overflow: hidden!important
        }

        .invoice footer {
            position: absolute;
            bottom: 10px;
            page-break-after: always
        }

        .invoice>div:last-child {
            page-break-before: always
        }
    }
</style>
<div id="invoice">
    <div class="toolbar hidden-print">
        <div class="text-right">
            {{-- <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button> --}}
            {{--                <a class="btn btn-info" href = "{{route('service.pdf', ['service_id' => $services->first()->service_id])}}"><i class="fa fa-file-pdf"></i> Export as PDF</a>--}}
        </div>
{{--        <hr>--}}
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://www.bmpinfology.com/">
                            <img src="{{ public_path('images\bmp.png') }}" data-holder-rendered="true" />
                        </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            BMP Infology Pvt. Ltd.
                        </h2>
                        <div>Baluwatar, Kathmandu, Nepal</div>
                        <div>+977-1-4416816</div>
                        <div>VAT: 602459664</div>
                        <a target="_blank" href="https://www.bmpinfology.com/">
                            bmpinfology.com
                        </a>
                        <div>contact@bmpinfology.com</div
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">Invoice To:</div>
                        <h2 class="to">{{$services->first()->client->org_name}}</h2>
                        @if($services->first()->client->pan_no != null)
                        <div class="pan_no">VAT/PAN: {{$services->first()->client->pan_no}}</div>
                        @endif
                        <div class="address">{{$services->first()->client->address}}</div>
                        <div class="email">{{$services->first()->client->email}}</div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">Invoice #{{$services->first()->service_id}}</h1>
                        <div class="date">Date of service: {{$services->first()->date}}</div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th class="text-left"><h4>S.N.</h4></th>
                        <th class="text-left"><h4>SERVICES</h4></th>
                        <th class="text-right"></th>
                        <th class="text-right"></th>
                        <th class="text-right"></th>
                        <th class="text-right"><h4>Amount(in NPR.)</h4></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td>
                                <h3>
                                    <p><b>{{$loop->iteration}}.</b></p>
                                </h3>
                            </td>
                            <td class="text-left">
                                <h3>
                                    <p>{{$service->servicetype->title}}</p>
                                    <small>{{$service->notes}}</small>
                                </h3>
                                {{-- <small>{{$quotations->notes}}</small> --}}
                            </td>
                            <td class="unit"></td>
                            <td class="qty"></td>
                            <td class="qty"></td>
                            <td class="total">
                                <h3>
                                    <p>{{$service->amount}} /-</p>
                                </h3>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2">SUBTOTAL</td>
                        <td>
                            {{$services->sum('amount')}} /-
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2">VAT(13%)</td>
                        <td>
                            @if($services->first()->main_taxable == 'Yes')
                                {{$services->sum('amount') * 13/100}} /-
                            @else
                                <p>-</p>
                            @endif
                        </td>
                    </tr>
                    {{-- <tr>
                        <td colspan="2"></td>
                        <td colspan="2">TAX 25%</td>
                        <td>$1,300.00</td>
                    </tr> --}}
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2">GRAND TOTAL</td>
                        <td>
                            @if($services->first()->main_taxable == 'Yes')
                                {{$services->sum('amount') + ((13/100)*$services->sum('amount'))}} /-
                            @else
                                {{$services->sum('amount')}} /-
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2">GRAND TOTAL(In Words)</td>
                        <td style="text-transform: capitalize">
                            @if($services->first()->main_taxable == 'Yes')
                                {{$numberTransformer->toWords($services->sum('amount') + ((13/100)*$services->sum('amount')))}} Rupees Only /-
                            @else
                                {{$numberTransformer->toWords($services->sum('amount'))}} Rupees Only /-
                            @endif
                        </td>
                    </tr>
                    </tfoot>
                </table>
                <div class="thanks" style="margin-top:20px">Thank you for doing business with us!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">This invoice is for reference purpose only, an original VAT bill will be presented after the confirmation.</div>
                </div>
            </main>
            <footer>
{{--                Invoice was created on a computer and is valid without the signature and seal.--}}
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
</body>
</html>




