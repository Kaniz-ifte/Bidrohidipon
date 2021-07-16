<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;

class PagesController extends Controller
{
    public function index()
    {

      return view('index');
    }



    public function contactSubmit(Request $request){

      // return dd($request->all());

      // akhane mail er code lekh..
      $this->validate($request, [
                'name' =>  'required',
       'email' =>  'required',
       'message' =>  'required',

      ]);

         $data = array(
               'name' =>$request->name,
               'sender_email' =>$request->email,
               'message'   =>   $request->message,
               'phone'   =>   $request->phone



         );



         Mail::to(env('MAIL_TO_ADDRESS'))->send(new SendMail($data));
         return redirect()->back();



    }
}
