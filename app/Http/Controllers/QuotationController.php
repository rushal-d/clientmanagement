<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Servicetype;
use App\Service;
use App\Quotation_Service;
use \Carbon\Carbon;
use NumberToWords\NumberToWords;
use PDF;
use Barryvdh\Snappy;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Pending Quotations";

        $client = Client::pluck('org_name', 'id');

        $servicetypes = Servicetype::pluck('title', 'id');

        $quotations = Quotation_Service::where('status', 0)
        ->groupBy('quotation_id');
        $difference = Carbon::now();

        // dd($difference);
        if(!empty($request->client_id)){
            $quotations = $quotations->where('client_id', $request->client_id);
        }

        if(!empty($request->servicetype_id))
        {
            $quotations = $quotations->where('servicetype_id', $request->servicetype_id);
        }

        $quotations = $quotations
        ->paginate(50);
        return view('quotation.index', ['difference' => $difference, 'title' => $title, 'client' => $client, 'quotations' => $quotations, 'servicetypes' => $servicetypes]);
    }

    public function finalized(Request $request){
        $title = "Finalized Quotations";

        $client = Client::pluck('org_name', 'id');

        $servicetypes = Servicetype::pluck('title', 'id');

        $quotations = Quotation_Service::where('status', 1)
        ->groupBy('quotation_id');

        $difference = Carbon::now();

        // dd($difference);
        if(!empty($request->client_id))
        {
            $quotations = $quotations->where('client_id', $request->client_id);
        }

        if(!empty($request->servicetype_id))
        {
            $quotations = $quotations->where('servicetype_id', $request->servicetype_id);
        }

        $quotations = $quotations
        ->paginate(50);
        return view('quotation.finalized', ['difference' => $difference, 'title' => $title, 'client' => $client, 'quotations' => $quotations, 'servicetypes' => $servicetypes]);
    }

    public function groupInvoice(Request $request){
        $quotations = Quotation_Service::where('quotation_id', $request->quotation_id)->get();
        //number to words
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('en');
        return view('quotation.groupinvoice', ['quotations' => $quotations, 'numberTransformer' => $numberTransformer]);
    }

//    public function finalizedquotation(Request $request){
//        $quotations = Quotation_Service::where('quotation_id', $request->quotation_id)
//        ->where('status', 1)->get();
//        //number to words
//        $numberToWords = new NumberToWords();
//        $numberTransformer = $numberToWords->getNumberTransformer('en');
//        return view('quotation.groupinvoice', ['quotations' => $quotations, 'numberTransformer' => $numberTransformer]);
//    }

    public function showfinalizedquotation(Request $request){
        $title = "Quotations of Client";
        $servicetypes = Servicetype::pluck('title', 'id');
        $quotations = Quotation_Service::where('quotation_id', $request->quotation_id)
        ->paginate(50);
        return view('quotation.showbyquotation', ['quotations' => $quotations, 'title' => $title, 'servicetypes' => $servicetypes]);
    }

    public function invoice($id){

        $invoice = Quotation_Service::find($id);

        if($invoice->taxable_stat == 'Yes')
        {
            $grandtotal = (13/100 * $invoice->amount) + $invoice->amount;
        }else{
            $grandtotal = $invoice->amount;
        }

        // dd($grandtotal);

        return view('quotation.invoice', ['invoice' => $invoice, 'grandtotal' => $grandtotal]);
    }

    public function pdf(Request $request){
        $quotations = Quotation_Service::where('quotation_id', $request->quotation_id)->get();
        $quotation = $quotations->first()->quotation_id;
        $name = $quotations->first()->client->org_name;
//        //number to words
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('en');
        $pdf = PDF::loadView('quotation.blah', ['quotations' => $quotations, 'numberTransformer' => $numberTransformer]);
        return $pdf->download('Quotation'.' #'.$quotation.'-'.$name.'.pdf');
//        return view('quotation.blah', ['quotations' => $quotations, 'numberTransformer' => $numberTransformer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = Client::pluck('org_name', 'id');

        $servicetype = Servicetype::pluck('title', 'id');

        return view('quotation.create', ['client' => $client, 'servicetype' => $servicetype]);
    }

    public function addToServices(Request $request){
        $client = Client::pluck('org_name', 'id');
        $servicetype = Servicetype::pluck('title', 'id');
        $quotations = Quotation_Service::where('quotation_id', $request->quotation_id)->get();
        // ->where('status', 0)->get();
        return view('quotation.addtoservices', ['client' => $client, 'servicetype' => $servicetype, 'quotations' => $quotations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client_id = $request->client_id;
        $main_taxable = $request->main_taxable;
        $latest_quotation = Quotation_Service::max('quotation_id');
            if(!empty($latest_quotation)){
                $quotation_id = $latest_quotation + 1;
            }
            else{
                $quotation_id = 1;
            }
        $quotations = $request->quotation;
        foreach($quotations as $quotation){
            $quote = new Quotation_Service();
            $quote->quotation_id = $quotation_id;
            $quote->client_id = $client_id;
            $quote->main_taxable = $main_taxable;
            $quote->servicetype_id = $quotation['servicetype_id'];
            $quote->amount = $quotation['amount'];

            $quote->taxable_stat = $quotation['taxable'] ?? null;
            $quote->notes = $quotation['notes'];
            $quote->date = $quotation['date'];
            $quote->date_np = $quotation['date_np'];
            $quote->recurring_stat = $quotation['recurring'] ?? null;
            $quote->recurring_type = $quotation['type'];
            if($quote->recurring_stat != "No" && $quote->recurring_stat != null){
                $quote->expiry_date = Carbon::parse($quotation['date'])->addMonth($quotation['type']);
            }
            else{
                $quote->expiry_date = null;
            }
            $quote->status = 0;
            $quote->next_status = 0;
            $quote->save();
        }

        // dd($request->input('type'));
        // if($request->type != 0){
        //     $services->expiry_date = Carbon::parse($request->input('date'))->addYear($request->input('type'));
        // }
        // else{
        //     $services->expiry_date = null;
        // }

        return redirect('/quotation');
    }

    public function storeToServices(Request $request){

        $client_id = $request->client_id;
        $quotations = $request->quotation;
        $main_taxable = $request->main_taxable;
        $change_status = Quotation_Service::where('quotation_id', $request->quotation_id)->update([
            'next_status' => 1
        ]);
        $latest_service = Service::max('service_id');
        if(!empty($latest_service)){
            $service_id = $latest_service + 1;
        }else{
            $service_id = 1;
        }
        foreach($quotations as $quotation){
            $quote = new Service();
            $quote->client_id = $client_id;
            $quote->service_id = $service_id;
            $quote->main_taxable = $main_taxable;
            $quote->servicetype_id = $quotation['servicetype_id'];
            $quote->amount = $quotation['amount'];
            $quote->taxable_stat = $quotation['taxable'] ?? null;
            $quote->notes = $quotation['notes'];
            $quote->date = $quotation['date'];
            $quote->recurring_stat = $quotation['recurring'] ?? null;
            $quote->recurring_type = $quotation['type'];
            if($quote->recurring_stat != "No" && $quote->recurring_stat != null){
                $quote->expiry_date = Carbon::parse($quotation['date'])->addYear($quotation['type']);
            }
            else{
                $quote->expiry_date = null;
            }
            $quote->save();
        }

        return redirect()->route('quotation.finalized');
    }

    public function addquotation(Request $request){
        $quotation = Quotation_Service::where('quotation_id', $request->quotation_id)->first();
        $client = Client::pluck('org_name', 'id');
        $selectedClient = $quotation->client;
        $selectedTax = $quotation->main_taxable;
        $servicetype = Servicetype::pluck('title', 'id');

        return view('quotation.addquotationextra', ['quotation' => $quotation, 'selectedTax' => $selectedTax, 'selectedClient' => $selectedClient, 'client' => $client, 'servicetype' => $servicetype]);
    }

    public function savequotation(Request $request){
        $client_id = $request->client_id;
        $main_taxable = $request->main_taxable;
        $quotation_id = $request->quotation_id;
        $quotations = $request->quotation;
        foreach($quotations as $quotation){
            $quote = new Quotation_Service();
            $quote->quotation_id = $quotation_id;
            $quote->client_id = $client_id;
            $quote->main_taxable = $main_taxable;
            $quote->servicetype_id = $quotation['servicetype_id'];
            $quote->amount = $quotation['amount'];
            $quote->taxable_stat = $quotation['taxable'] ?? null;
            $quote->notes = $quotation['notes'];
            $quote->date = $quotation['date'];
            $quote->recurring_stat = $quotation['recurring'] ?? null;
            $quote->recurring_type = $quotation['type'];
            $quote->expiry_date = null;
            $quote->status = 0;
            $quote->save();
        }
        return redirect()->route('quotation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $quotation = Quotation_Service::find($id);
        // dd($quotation);
    }

    public function showByQuotation(Request $request){
        $title = "Quotations of Client";

        $servicetypes = Servicetype::pluck('title', 'id');

        $quotations = Quotation_Service::where('quotation_id', $request->quotation_id)
        ->where('status', 0)
        ->paginate(50);
        // dd($quotations);


        return view('quotation.showbyquotation', ['quotations' => $quotations, 'title' => $title, 'servicetypes' => $servicetypes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::pluck('org_name', 'id');

        $servicetype = Servicetype::pluck('title', 'id');

        $quotation = Quotation_Service::find($id);
        // dd($quotation);
        return view('quotation.edit', ['client' => $client, 'servicetype' => $servicetype, 'quotation' => $quotation]);
    }

    public function bulkEdit(Request $request){
        $client = Client::pluck('org_name', 'id');
        $servicetype = Servicetype::pluck('title', 'id');
        $quotations = Quotation_Service::where('quotation_id', $request->quotation_id)
        ->paginate(50);
        return view('quotation.bulkedit', ['quotations' => $quotations, 'client' => $client, 'servicetype' => $servicetype]);
    }

    public function bulkEditFinalized(Request $request){
        $client = Client::pluck('org_name', 'id');
        $servicetype = Servicetype::pluck('title', 'id');
        $quotations = Quotation_Service::where('quotation_id', $request->quotation_id)
            ->paginate(50);
        return view('quotation.bulkeditfinalized', ['quotations' => $quotations, 'client' => $client, 'servicetype' => $servicetype]);
    }

    public function bulkUpdate(Request $request)
    {
        // dd($request->all());
        $main_taxable = $request->main_taxable;
        $quotations = $request->quotation;
        foreach($quotations as $id => $quotation){
            $quote = Quotation_Service::find($id);
            $quote->main_taxable = $main_taxable;
            $quote->servicetype_id = $quotation['servicetype_id'];
            $quote->amount = $quotation['amount'];
            $quote->taxable_stat = $quotation['taxable'];
            $quote->notes = $quotation['notes'];
            $quote->date = $quotation['date'];
            $quote->date_np = $quotation['date_np'];
            $quote->recurring_stat = $quotation['recurring'];
            $quote->recurring_type = $quotation['type'];
            if($quote->recurring_stat != "No" && $quote->recurring_stat != null){
                $quote->expiry_date = Carbon::parse($quotation['date'])->addMonth($quotation['type']);
            }
            else{
                $quote->expiry_date = null;
            }
            // $quote->status = 0;
            $quote->save();
        }
        return redirect()->route('quotation.index');
    }

    public function bulkUpdateFinalized(Request $request){
        $main_taxable = $request->main_taxable;
        $quotations = $request->quotation;
        foreach($quotations as $id => $quotation){
            $quote = Quotation_Service::find($id);
            $quote->main_taxable = $main_taxable;
            $quote->servicetype_id = $quotation['servicetype_id'];
            $quote->amount = $quotation['amount'];
            $quote->taxable_stat = $quotation['taxable'];
            $quote->notes = $quotation['notes'];
            $quote->date = $quotation['date'];
            $quote->date_np = $quotation['date_np'];
            $quote->recurring_stat = $quotation['recurring'];
            $quote->recurring_type = $quotation['type'];
            if($quote->recurring_stat != "No" && $quote->recurring_stat != null){
                $quote->expiry_date = Carbon::parse($quotation['date'])->addMonth($quotation['type']);
            }
            else{
                $quote->expiry_date = null;
            }
            // $quote->status = 0;
            $quote->save();
        }
        return redirect()->route('quotation.finalized');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quotation = Quotation_Service::find($id);
        $quotation->status = 1;
        $quotation->save();
        return redirect()->route('quotation.showbyquotation');
    }

    public function updateQuotation(Request $request){
        $quotations = Quotation_Service::where('quotation_id', $request->quotation_id)
        ->where('status', 0)->get();
        // dd($quotation);
        foreach($quotations as $quotation){
            $quotation->status = 1;
            $quotation->save();
        }
        return redirect()->route('quotation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quotation = Quotation_Service::find($id);
        $quotation->delete();

        return redirect()->route('quotation.finalized');
    }

    public function bulkDelete(Request $request){
        $quotation = Quotation_Service::where('quotation_id', $request->quotation_id)
        ->where('status', 0)->delete();

        return redirect()->route('quotation.index');
    }
}
