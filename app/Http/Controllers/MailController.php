<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

use App\Mail\AssemblyMail;

class MailController extends Controller
{
    public function sendAssemblyMail(Request $request){
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'contact' => $request->contact,
            'tasks' => $request->tasks,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'delivery' => $request->delivery,
        ];

        Mail::to('saylerplay@gmail.com')->send(new AssemblyMail($data));

        return redirect('/');
    }
}
