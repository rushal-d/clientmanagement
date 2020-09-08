<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Servicetype;
use App\Service;
use \Carbon\Carbon;
use NumberToWords\NumberToWords;
use PDF;
use Barryvdh\Snappy;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Services";

        $client = Client::pluck('org_name', 'id');

        $servicetypes = Servicetype::pluck('title', 'id');

        $services = Service::groupBy('service_id');

        $difference = Carbon::now();

        if(!empty($request->client_id))
        {
            $services = $services->where('client_id', $request->client_id);
        }

        if(!empty($request->servicetype_id))
        {
            $services = $services->where('servicetype_id', $request->servicetype_id);
        }
        $services = $services
        ->paginate(50);
        return view('services.index', ['difference' => $difference,
                                            'title' => $title,
                                            'client' => $client,
                                            'services' => $services,
                                            'servicetypes' => $servicetypes]);
    }

    public function bulkInvoice(Request $request){
        $services = Service::where('service_id', $request->service_id)->get();
        //number to words
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('en');
        return view('services.bulkinvoice', ['services' => $services, 'numberTransformer' => $numberTransformer]);
    }

    public function pdf(Request $request){
        $services = Service::where('service_id', $request->service_id)->get();
        $invoice = $services->first()->service_id;
        $name = $services->first()->client->org_name;
//        dd($title);
//        dd($name);
//        //number to words
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('en');
        $pdf = PDF::loadView('services.blah', ['services' => $services, 'numberTransformer' => $numberTransformer]);
        return $pdf->download('Invoice'.' #'.$invoice.'-'.$name.'.pdf');
//        return view('services.blah', ['services' => $services, 'numberTransformer' => $numberTransformer]);
    }


    public function invoice($id){

        $invoice = Service::find($id);

        if($invoice->taxable_stat == 'Yes')
        {
            $grandtotal = (13/100 * $invoice->amount) + $invoice->amount;
        }else{
            $grandtotal = $invoice->amount;
        }

        // dd($grandtotal);

        return view('services.invoice', ['invoice' => $invoice, 'grandtotal' => $grandtotal]);
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

        return view('services.create', ['client' => $client, 'servicetype' => $servicetype]);
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
        $latest_service = Service::max('service_id');
            if(!empty($latest_service)){
                $service_id = $latest_service + 1;
            }
            else
            {
                $service_id = 1;
            }
        $services = $request->service;
        foreach($services as $service){
            $serv = new Service();
            $serv->client_id = $client_id;
            $serv->main_taxable = $main_taxable;
            $serv->service_id = $service_id;
            $serv->servicetype_id = $service['servicetype_id'];
            $serv->amount = $service['amount'];
            $serv->taxable_stat = $service['taxable'] ?? null;
            $serv->notes = $service['notes'];
            $serv->date = $service['date'];
            $serv->date_np = $service['date_np'];
            $serv->recurring_stat = $service['recurring'] ?? null;
            $serv->recurring_type = $service['type'];
            if($serv->recurring_stat != "No" && $serv->recurring_stat != null){
                $serv->expiry_date = Carbon::parse($service['date'])->addMonth($service['type']);
            }
            else{
                $serv->expiry_date = null;
            }
            $serv->save();
        }
        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $title = "Services Subscribed";
        $servicetypes = Servicetype::pluck('title', 'id');
        $difference = Carbon::now();
        $services = Service::where('service_id', $request->service_id)
        ->paginate(50);
        return view('services.show', ['services' => $services, 'title' => $title, 'servicetypes' => $servicetypes, 'difference' => $difference]);
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

        $service = Service::find($id);

        return view('services.edit', ['client' => $client, 'servicetype' => $servicetype, 'service' => $service]);
    }

    public function addService(Request $request){
        $service = Service::where('service_id', $request->service_id)->first();
        $client = Client::pluck('org_name', 'id');
        $selectedClient = $service->client;
        $selectedTax = $service->main_taxable;
        $servicetype = Servicetype::pluck('title', 'id');

        return view('services.addserviceextra', ['service' => $service,
                                                        'selectedTax' => $selectedTax,
                                                        'selectedClient' => $selectedClient,
                                                        'client' => $client,
                                                        'servicetype' => $servicetype]);
    }

    public function saveService(Request $request){
        $client_id = $request->client_id;
        $main_taxable = $request->main_taxable;
        $service_id = $request->service_id;

        $services = $request->service;
        foreach($services as $service){
            $serv = new Service();
            $serv->service_id = $service_id;
            $serv->client_id = $client_id;
            $serv->main_taxable = $main_taxable;
            $serv->servicetype_id = $service['servicetype_id'];
            $serv->amount = $service['amount'];
            $serv->taxable_stat = $service['taxable'] ?? null;
            $serv->notes = $service['notes'];
            $serv->date = $service['date'];
            $serv->recurring_stat = $service['recurring'] ?? null;
            $serv->recurring_type = $service['type'];
            if($serv->recurring_stat != "No" && $serv->recurring_stat != null){
                $serv->expiry_date = Carbon::parse($service['date'])->addYear($service['type']);
            }
            else{
                $serv->expiry_date = null;
            }
            $serv->save();
        }
        return redirect()->route('service.index');
    }

    public function bulkEdit(Request $request){
        $client = Client::pluck('org_name', 'id');
        $servicetype = Servicetype::pluck('title', 'id');
        $services = Service::where('service_id', $request->service_id)
        ->paginate(50);
        return view('services.bulkedit', ['services' => $services, 'client' => $client, 'servicetype' => $servicetype]);
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
        $service = Service::find($id);

        $service->client_id = $request->input('client_id');
        $service->servicetype_id = $request->input('servicetype_id');
        $service->amount = $request->input('amount');
        $service->taxable_stat = $request->input('taxable');
        $service->notes = $request->input('notes');
        $service->date = $request->input('date');
        $service->recurring_type = $request->input('type');
        $service->recurring_stat = $request->input('recurring');
        if($request->recurring != "No"){
            $service->expiry_date = Carbon::parse($request->input('date'))->addMonth($request->input('type'));
        }
        else{
            $service->expiry_date = null;
        }

        $service->save();

        return redirect('/service');
    }

    public function bulkUpdate(Request $request){
        $main_taxable = $request->main_taxable;
        $services = $request->service;
        foreach($services as $id => $service){
            $serv = Service::find($id);
            $serv->main_taxable = $main_taxable;
            $serv->servicetype_id = $service['servicetype_id'];
            $serv->amount = $service['amount'];
            $serv->taxable_stat = $service['taxable'];
            $serv->notes = $service['notes'];
            $serv->date = $service['date'];
            $serv->date_np = $service['date_np'];
            $serv->recurring_stat = $service['recurring'];
            $serv->recurring_type = $service['type'];
            if($serv->recurring_stat != "No" && $serv->recurring_stat != null){
                $serv->expiry_date = Carbon::parse($service['date'])->addMonth($service['type']);
            }
            else{
                $serv->expiry_date = null;
            }
            $serv->save();
        }
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);

        $service->delete();

        return redirect('/service');
    }

    public function bulkDelete(Request $request){
        $service = Service::where('service_id', $request->service_id)->delete();
        return redirect()->route('service.index');
    }
}
