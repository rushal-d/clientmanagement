@extends('layouts.app')
@section('styles')

@endsection

@section('content')

<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
{{--             <a onclick="printJS('printable', 'html')" id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</a>--}}
            <a class="btn btn-info" href = "{{route('service.pdf', ['service_id' => $services->first()->service_id])}}"><i class="fa fa-file-pdf"></i> Export as PDF</a>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto" id="printable">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://www.bmpinfology.com/">
                            <img src="{{ asset('images/bmp.png') }}" data-holder-rendered="true" />
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
                        <div>contact@bmpinfology.com</div>
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
                                    <p>{{$service->notes}}</p>
                                    <small>{{$service->servicetype->title}}</small>
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
{{--                <div class="notices">--}}
{{--                    <div>NOTICE:</div>--}}
{{--                    <div class="notice">This invoice is for reference purpose only, an original VAT bill will be presented after the confirmation.</div>--}}
{{--                </div>--}}
            </main>
            <footer>
                This invoice is for reference purpose only, an original VAT bill will be presented after the confirmation.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{asset('js/print.js')}}"></script>
@endsection
