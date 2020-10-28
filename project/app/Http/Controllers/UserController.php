<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(){
        if (Auth::check()) {
            return redirect('/');
        }
        
        $userTypes = ['0' => 'student', '1' => 'werkgever'];
        return view('users/register')->with('userTypes', $userTypes);
    }

    public function handleRegister(Request $request){
        $rules = [
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required'
        ];

        $messages = [
            'firstname.required' => 'Voornaam is vereist.',
            'lastname.required' => 'Achternaam is vereist.',
            'email.required' => 'E-mailadres vereist.',
            'email.email' => 'Gelieve een geldig e-mailadres in te vullen.',
            'email.max' => 'E-mailadres mag niet boven de 255 karakters bevaten',
            'email.regex' => 'Gelieve een Thomas More e-mailadres te gebruiken.',
            'password.required' => 'Wachtwoord vereist',
            'password.confirmed' => 'De wachtwoorden komen niet overeen.',
            'password.min' => 'Voer een wachtwoord in met minstens 8 karakters.',
            'password_confirmation.required' => 'Bevestiging van wachtwoord vereist'
        ];

        if($request->input('companyAdmin') == 0){
            $rules['email'] = 'required|email|max:255|unique:users|regex:/(.*)student\.thomasmore\.be$/i';
        }

        $validation = $request->validate($rules,$messages);

        $user = new User();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = \Hash::make($request->input('password'));
        $user->company_admin = $request->input('companyAdmin');
        $user->save();

        return redirect('/login')->withInput(
            $request->except(['password', 'password_confirmation'])
        );

    }

    public function login(){
        if (Auth::check()) {
            return redirect('/');
        }

        return view('users/login');
    }

    public function handleLogin(Request $request){
        $credentials = $request->only(['email', 'password']);
        if( Auth::attempt($credentials) ){
            return redirect('/');
        }
        return view('users/login');
    }

    public function profile(){
        $user = Auth::user();
        return view('users/profile')->with('user', $user);
    }

    public function update(Request $request){
        $user = Auth::user();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->date_of_birth = $request->input('dateOfBirth');
        $user->gender = $request->input('gender');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->province = $request->input('province');
        $user->postal_code = $request->input('postal_code');
        $user->save();

        $request->session()->flash('message', 'Profiel geupdate!');

        return redirect('/user/profile');
    }
}
