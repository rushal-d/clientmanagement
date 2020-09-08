<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
 
    public function sendSMS($content) {         
        $ch = curl_init();         
        curl_setopt($ch, CURLOPT_URL,"http://sms.bmpinfology.com/api/v3/sms?");         
        curl_setopt($ch, CURLOPT_POST, 1);         
        curl_setopt($ch, CURLOPT_POSTFIELDS,$content);         
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);         
        $server_output = curl_exec ($ch);         
        curl_close ($ch);         
        return $server_output;
    }

        public function phone(){
        $token = 'Xp5FYrORhfbmehhp470rmcARrDOg1cDAuV1';         
        $to = '9843094233';         
        $sender    = 'BMPInfology';         
        $message = 'Hello';

         // set post fields         
        $content =[         
            'token'=>rawurlencode($token),         
            'to'=>rawurlencode($to),         
            'sender'=>rawurlencode($sender),         
            'message'=>rawurlencode($message),         
        ];

        $thesmscentral_response = sendSMS($content);         
        echo $thesmscentral_response; 
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'category' => 'required'
        ]);

        //Insert
        $post = new Category;
        $post->category = $request->input('category');
        $post->save();

        return redirect()->route('category.create')->with('success', 'Successfully inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
