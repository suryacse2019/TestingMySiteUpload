<?php

namespace App\Http\Controllers;

use App\Mail\sendingEmail;
use Illuminate\Http\Request;
use App\Models\contact;
// use Illuminate\Support\Facades\Mail;
//use Mail;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact= new contact();
        $contact->name=$request->name;
        $contact->number=$request->number;
        $contact->email=$request->email;
        $contact->address=$request->address;
        $contact->save();


         $data = array(
            'name'      =>   $request->name,
            'number'    =>   $request->number,
            'email'     =>   $request->email,
            'address'   =>   $request->address
        );
    
    \Mail::to('fegnevurdu@vusra.com')->send(new sendingEmail($data));
     
    return back()->with('success', 'Thanks for contacting us!');


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
