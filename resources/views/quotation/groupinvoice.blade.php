@extends('layouts.app')
@section('styles')

@endsection

@section('content')

<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
{{--            <button id="printInvoice" onclick="myFunction()" class="btn btn-info"><i class="fa fa-print"></i>Print</button>--}}
           <a  href="{{route('quotation.pdf', ['quotation_id' => $quotations->first()->quotation_id])}}" class="btn btn-info"><i class="fa fa-file-pdf"></i> Export as PDF</a>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
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
                        <div class="text-gray-light">Quotation To:</div>
                        <h2 class="to">{{$quotations->first()->client->org_name}}</h2>
                        <div class="address">{{$quotations->first()->client->address}}</div>
                        <div class="email">{{$quotations->first()->client->email}}</div>
                    </div>
                    <div class="col invoice-details">
                    <h1 class="invoice-id">Quotation #{{$quotations->first()->quotation_id}}</h1>
                    <div class="date">Date of quotation: {{$quotations->first()->date}}</div>
                    {{-- <div class="date">Due Date: {{$invoice->expiry_date}}</div> --}}
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
                    @foreach($quotations as $quotation)
                        <tr>
                            <td>
                                <p><b>{{$loop->iteration}}.</b></p>
                            </td>
                            <td class="text-left">
                                <h3>
                                    <p>{{$quotation->notes}}</p>
                                    <small>{{$quotation->servicetype->title}}</small>
                                </h3>
                            </td>
                            <td class="unit"></td>
                            <td class="qty"></td>
                            <td class="qty"></td>
                            <td class="total">
                                <h3>
                                    <p>{{$quotation->amount}} /-</p>
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
                                {{$quotations->sum('amount')}} /-
                        </td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">VAT(13%)</td>
                        <td>
                            @if($quotations->first()->main_taxable == 'Yes')
                                {{$quotations->sum('amount') * 13/100}} /-
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
                                @if($quotations->first()->main_taxable == 'Yes')
                                    {{$quotations->sum('amount') + ((13/100)*$quotations->sum('amount'))}} /-
                                @else
                                    {{$quotations->sum('amount')}} /-
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">GRAND TOTAL(In Words)</td>
                            <td style="text-transform: capitalize">
                                @if($quotations->first()->main_taxable == 'Yes')
                                    {{$numberTransformer->toWords($quotations->sum('amount') + ((13/100)*$quotations->sum('amount')))}} Rupees Only /-
                                @else
                                    {{$numberTransformer->toWords($quotations->sum('amount'))}} Rupees Only /-
                                @endif
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <div class="thanks" style="margin-top:20px">Thank you for doing business with us!</div>
{{--                <div class="notices">--}}
{{--                    <div>NOTICE:</div>--}}
{{--                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>--}}
{{--                </div>--}}
            </main>
{{--            <footer>--}}
{{--                Invoice was created on a computer and is valid without the signature and seal.--}}
{{--            </footer>--}}
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
        function myFunction() {
            window.print();
        }
    </script>
@endsection
