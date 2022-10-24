<?php

namespace App\Http\Controllers;

use App\Services\ZippopotamAPI;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($zipcode=null)
    {
        $zipApi = new ZippopotamAPI($zipcode);

        if($zipcode){

            $data = $zipApi->postResponse();

        }else{

            $data = null;
        }

        //dd($data);

        return view('home', compact('data', 'zipcode'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeZipCode(Request $request)
    {
         //Validate request
         $request->validate([
            'zipcode' => ['required','numeric','digits:5'],
        ]);

        return redirect()->route('home', $request->zipcode);
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
