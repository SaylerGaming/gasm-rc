<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

use App\Mail\{
    AssemblyMail,
    doorToDoorMail   
};

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

        Mail::to('pc.assembly@gasmrc.kz')->send(new AssemblyMail($data));

        return redirect('/');
    }
    public function sendDoorToDoorMail(Request $request){
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'contact' => $request->contact,
            'description' => $request->description,
            'timeDay' => $request->timeDay,
            'timeFrom' => $request->timeFrom,
            'timeTo' => $request->timeTo,
            'isImmediately' => $request->isImmediately,
            'address' => $request->address,
        ];

        Mail::to('home.visit@gasmrc.kz')->send(new DoorToDoorMail($data));

        return redirect('/');
    }
}
