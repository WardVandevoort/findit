<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AjaxController extends Controller
{
    public function checkEmail(Request $request){
        $rules = [
            'email' => ['required','email','max:255','regex:/(^test(.*)|r\d{7,8})@student\.thomasmore\.be$/i']
        ];

        $messages = [
            'email.required' => 'E-mailadres vereist.',
            'email.email' => 'Gelieve een geldig e-mailadres in te vullen.',
            'email.max' => 'E-mailadres mag niet boven de 255 karakters bevaten',
            'email.regex' => 'Gelieve een Thomas More e-mailadres te gebruiken.'
        ];
        
        $email = $request->input('email');
        $emailExist = User::where('email', $email)->first();
        if($emailExist){
            $accountExist = true;
        }else{
            $accountExist = false;
            $validation = $request->validate($rules, $messages);
            
        }
        return response()->json([
            'accountExist' => $accountExist,
            'email' => $email
            ]);
    }
}
