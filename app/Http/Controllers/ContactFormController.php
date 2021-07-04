<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class ContactFormController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }


    function store(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'message' => 'required',
        ]);

        DB::table('messages')->insert([
            'name' => $request->input('name') ?? 'anonymous sender',
            'email' => $request->input('email') ?? 'anon@anon.com',
            'message' => $request->input('message')
        ]);


        return redirect('contact')->with('message', 'Votre message est en cours de traitement, restez en contact.');
    }
}
