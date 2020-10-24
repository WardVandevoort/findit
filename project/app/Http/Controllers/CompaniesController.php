<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CompaniesController extends Controller
{
    public function index(){
        $data['companies'] = \DB::table('companies')->get();
        return view('companies/index', $data);
    }

    public function show($company){
        $data['company'] = \App\Models\Company::where('id', $company)->with('internships')->first();
        return view('companies/show', $data);
    }

    public function create(){
        return view('companies/create');
    }

    public function store(Request $request){
        $name = $request->input('name');
        $city = $request->input('city');
        $email;
        $phone;
        $address;
        $postalCode;
        $province;
        $company = new \App\Models\Company();
        $apiKey = "7ojNfkml0g9ZeF401eY0tS4GHy1Eor0_JSOVfrXVG50";

        $url = "https://discover.search.hereapi.com/v1/discover?at=51.030136,4.488213&limit=1&q=$name . $city&apiKey=$apiKey";
        $response = Http::get($url)->json();
        if(empty($response['items'])){
            $company->name = $name;
            $company->city = $city;
            $company->email = null;
            $company->phone = null;
            $company->address = null;
            $company->postal_code = null;
            $company->province = null;
            $company->slogan = null;
            $company->description = null;

            $companyExists = \App\Models\Company::where('name', $name)->where('city', $city)->first();
            if($companyExists != null){
                echo('Company already exists!');
                return;
            }
            else{
                $company->save();
                $data = \App\Models\Company::where('name', $name)->where('city', $city)->first();
    
                return redirect('/companies/' . $data['id']);
            }
            
           
            
        }
        else{
            $response = $response['items'][0];
            $company->name = $name;

            if(!empty($response['contacts'][0]['email'][0]['value'])){
                $email = $response['contacts'][0]['email'][0]['value'];
            }
            else{
                $email = null;
            }
            $company->email = $email;

            if(!empty($response['contacts'][0]['phone'][0]['value'])){
                $phone = $response['contacts'][0]['phone'][0]['value'];
            }
            else{
                $phone = null;
            }
            $company->phone = $phone;

            if(!empty($response['address']['street']) && !empty($response['address']['houseNumber'])){
                $address = $response['address']['street'] . ' ' . $response['address']['houseNumber'];
            }
            else{
                $address = null;
            }
            $company->address = $address;
            $company->city = $city;

            if(!empty($response['address']['postalCode'])){
                $postalCode = $response['address']['postalCode'];
            }
            else{
                $postalCode = null;
            }
            $company->postal_code = $postalCode;

            if(!empty($response['address']['state'])){
                $province = $response['address']['state'];
            }
            else{
                $province = null;
            }
            $company->province = $province;

            $company->slogan = null;
            $company->description = null;

            $companyExists = \App\Models\Company::where('name', $name)->where('city', $city)->first();
            if($companyExists != null){
                echo('Company already exists!');
                return;
            }
            else{
                $company->save();
                $data = \App\Models\Company::where('name', $name)->where('city', $city)->first();

                return redirect('/companies/' . $data['id']);
            }
            
        }
    
    }

}
