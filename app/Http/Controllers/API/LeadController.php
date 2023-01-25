<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Mail\NewContact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
   public function store(Request $request)
   {
    $data = $request->all();
    $validation = Validator::make($data, [
      'name'=>'required',
      'email'=>'required|email',
      'message'=>'required',
    ]);

    if($validation->fails()){
      return response()->json([
         'success'=>false,
         'errors' => $validation->errors()

      ]);
    }
    $new_lead = new Lead();
    $new_lead->fill($data);
    $new_lead->save();

    Mail::to('salernomarco48@gmail.com')->send(new NewContact($new_lead));

    return response()->json([
      'success' => true,
    ]);

   }
}