<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicetype;
use App\Service;

class ServicetypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Service Types";

        $servicetypes = Servicetype::select();

        if(!empty($request->title))
        {
            $servicetypes = $servicetypes->where('title', 'like', '%'. $request->title. '%');
        }

        $servicetypes = $servicetypes
        ->paginate(50);

        return view('servicetypes.index', ['title' => $title, 'servicetypes' => $servicetypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicetypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $servicetypes = new Servicetype;
        $servicetypes->title = $request->input('title');
        $servicetypes->description = $request->input('description');
        $servicetypes->VAT = "13";

        $servicetypes->save();

        return redirect('/servicetype');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "Service Info";
        $servicetype = Servicetype::find($id);

        return view('servicetypes.show', ['title' => $title, 'servicetype' => $servicetype]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicetype = Servicetype::find($id);

        return view('servicetypes.edit')->with('servicetype', $servicetype);
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
        $servicetype = Servicetype::find($id);

        $servicetype->title = $request->input('title');
        $servicetype->description = $request->input('description');

        $servicetype->save();

        return redirect('/servicetype');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicetypes = Servicetype::find($id);

        $services = Service::where('servicetype_id', $servicetypes->id)->delete();

        $servicetypes->delete();
        
        return redirect('/servicetype');
    }
}
