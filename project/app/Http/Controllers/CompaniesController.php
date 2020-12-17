<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
class CompaniesController extends Controller
{
    public function index(){
        $data['companies'] = \DB::table('companies')->get();
        return view('companies/index', $data);
    }

    public function show($company){
        $data['company'] = \App\Models\Company::where('id', $company)->with('internships')->first();

        /*--------------------------------Guzzle-API------------------------------------*/
         //get the current company address
         $get_companyAdress = \DB::select("SELECT city,address FROM companies WHERE id = $company");
         $companyAdress = $get_companyAdress[0]->address;
         $companycity = $get_companyAdress[0]->city;
        //get the API key from the .env file
        $localiq_Api_Key=env('LOCATIONIQ_API_KEY');
        //API request url
        $url_Locationiq = "https://api.locationiq.com/v1/autocomplete.php?key=$localiq_Api_Key&q=$companyAdress";

        // get the Long & Lat of address
        $getLocation = Http::get($url_Locationiq)->json();
        $lat =$getLocation['0']['lat'];
        $lon =$getLocation['0']['lon'];

        //get api key from the .env file
        $here_Api_Key = env('HERE_API_KEY');
        $url_Hereapi ="https://discover.search.hereapi.com/v1/discover?at=$lat,$lon&cat=railway-station&q=railway+station&limit=5&apiKey=$here_Api_Key";

        $get_stations=Http::get($url_Hereapi)->json();


        $stations['stations']= $get_stations['items'];
        //dd($stations);
        /*-------------------------------End-Guzzle-API------------------------------------*/

        return view('companies/show', $data,$stations);
    }

    public function create(){
        return view('companies/create');
    }

    public function store(Request $request){
        $name = $request->input('name');
        $city = $request->input('city');
        $email;
        $phone;
        $address = $request->input('address');
        $postal_code = $request->input('postal_code');
        $province;
        $company = new \App\Models\Company();

        /*--------------Old CODE-------------*/
        //$apiKey = "7ojNfkml0g9ZeF401eY0tS4GHy1Eor0_JSOVfrXVG50";
        //$url = "https://discover.search.hereapi.com/v1/discover?at=51.030136,4.488213&limit=1&q=$name . $city&apiKey=$apiKey";
        //$response = Http::get($url)->json();
        /*-------------End-Old-CODE-------------*/
        $response = "";
        $userId = Auth::id();
        if(empty($response['items'])){
            $company->admin_id = $userId;
            $company->name = $name;
            $company->city = $city;
            $company->email = null;
            $company->phone = null;
            $company->address = $address;
            $company->postal_code = $postal_code;
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

    public function update(Request $request){
        $company_id = $request->input('company_id');
        $name = $request->input('name');
        $slogan = $request->input('slogan');
        $description = $request->input('description');
        $address = $request->input('address');
        $city = $request->input('city');
        $postal_code = $request->input('postal_code');
        $province = $request->input('province');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $switch;

        if($name != null && $name != ' '){
            $data = \App\Models\Company::where('id', $company_id)->update(['name' => $name]);
            return redirect('/companies/' . $company_id);
        }
        else if($slogan != null && $slogan != ' '){
            $data = \App\Models\Company::where('id', $company_id)->update(['slogan' => $slogan]);
            return redirect('/companies/' . $company_id);
        }
        else if($description != null && $description != ' '){
            $data = \App\Models\Company::where('id', $company_id)->update(['description' => $description]);
            return redirect('/companies/' . $company_id);
        }
        else if($address != null && $address != ' ' &&
        $city != null && $city != ' ' &&
        $postal_code != null && $postal_code != ' ' &&
        $province != null && $province != ' '){
            $data = \App\Models\Company::where('id', $company_id)->update(
            ['address' => $address,
            'city' => $city,
            'postal_code' => $postal_code,
            'province' => $province]);
            return redirect('/companies/' . $company_id);
        }
        else if($phone != null && $phone != ' '){
            $data = \App\Models\Company::where('id', $company_id)->update(['phone' => $phone]);
            return redirect('/companies/' . $company_id);
        }
        else if($email != null && $email != ' ' && strrpos($email, '@') != false && (strrpos($email, '.com') != false || strrpos($email, '.be') != false)){
            $data = \App\Models\Company::where('id', $company_id)->update(['email' => $email]);
            return redirect('/companies/' . $company_id);
        }
        else{
            return redirect('/companies/' . $company_id);
        }


    }

}
