<?php

namespace App\Http\Controllers;

use Exception;
use Redirect;
use Illuminate\Http\Request;

class RegisterController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Should insert data to db with verified field as false
        error_log($request->fname);
        error_log($request->lname);
        error_log($request->email);
        error_log($request->password);
        if(session()->get('verification_code') == null){
            $code = rand(1000, 9999);
            session()->put('verification_code', $code);
        }

        session()->put('name', $request->fname.' '.$request->lname);
        session()->put('email', $request->email);
        
        return view('verify', ['email' => $request->email, 'code' => session()->get('verification_code')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request)
    {
        error_log(session()->get('verification_code'));
        error_log($request->code);
        if($request->code == session()->get('verification_code')){
            session()->forget('verification_code');
            return view('home', ['name' => session()->get('name'), 'email' => session()->get('email')]);
        }else{
            return Redirect::back()->withErrors('Code mismatch');
        }
                
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resend(Request $request)
    {
        $code = rand(1000, 9999);
        session()->put('verification_code', $code);
        return Redirect::back()->with(['email' => session()->get('email'), 'code' => session()->get('verification_code')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        session()->forget('name');
        session()->forget('email');
        return redirect('/');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
