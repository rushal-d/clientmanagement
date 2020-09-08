<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;
use \App\Client;
use App\Service;
use App\Quotation_Service;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $category = Category::pluck('category', 'id');
        $title = "Clients";

        $clients = Client::select();

        if(!empty($request->org_name))
        {
            $clients = $clients->where('org_name', 'like', '%'. $request->org_name. '%');
        }

        if(!empty($request->contact_person))
        {

            $clients = $clients->where('contact_person_name', 'like', '%'. $request->contact_person. '%');
        }

        $clients = $clients->latest()
        ->paginate(50);


        return view('clients.index', ['title' => $title, 'clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //pluck from the parent table
        // $category = Category::pluck('category', 'id');

        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'org' => 'required'
        ]);

        //Insert
        $post = new Client;
        $post->org_name = $request->input('org');
        $post->address = $request->input('address');
        $post->pan_no = $request->input('vatpan');
        $post->phone = $request->input('phone');
        $post->website = $request->input('website');

        $allContactName = implode(', ', $request->input('contact_person_name'));
        // foreach($request->input('contact_person_name') as $contact_person_name) {
            // $allContactName.= $contact_person_name . ', ';
        // }
        $post->contact_person_name = $allContactName;

        // $post->contact_person_name = $request->input('contact_person_name');
        $post->email = $request->input('email');
        $post->notes = $request->input('notes');
        $post->save();

        return redirect('/client')->with('success', 'Details Inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);

        return view('clients.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //pluck from the parent table

        $client = Client::find($id);

        $allContactNames = explode(', ', $client->contact_person_name );
        // dd($allContactName);
        return view('clients.edit', ['client' => $client, 'allContactNames' => $allContactNames]);
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
        $this->validate($request, [
            'org' => 'required'
        ]);

        //Insert
        $post = Client::find($id);
        $post->org_name = $request->input('org');
        $post->address = $request->input('address');
        $post->pan_no = $request->input('vatpan');
        $post->phone = $request->input('phone');
        $post->website = $request->input('website');
        // dd($request->input('contact_person_name'));
        $allContactName = implode(', ', $request->input('contact_person_name'));
        // dd($allContactName);
            $post->contact_person_name = $allContactName;
        // $post->contact_person_name = $request->input('contact_person_name');
        $post->email = $request->input('email');
        $post->notes = $request->input('notes');
        $post->save();

        return redirect('/client')->with('success', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clients = Client::find($id);

        $services = Service::where('client_id', $clients->id)->delete();
        $quotations = Quotation_Service::where('client_id', $clients->id)->delete();

        $clients->delete();

        return redirect('/client');
    }
}
