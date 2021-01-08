<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [
                'name' => 'Intracto', 
                'logo' => 'Logo-Intracto-Positief-Grijs@3x-100-rgb.jpg',
                'website' => 'https://www.intracto.com/nl-be',
                'email' => 'info@intracto.com', 
                'phone' => '+32 (0)14 28 29 20', 
                'address' => 'Zavelheide 15', 
                'city' => 'Herentals', 
                'postal_code' => '2200', 
                'province' => 'Antwerp', 
                'slogan' => 'You never walk alone!',
                'description' => 'Intracto geeft als digital agency de ondernemingen van morgen vorm op gebied van marketing, strategie, communicatie en technologie. Onze campussen in België en Nederland barsten van het talent om uitdagende projecten naar een hoger niveau te tillen.', 
            ],
            [
                'name' => 'Marbles', 
                'logo' => 'Marbles_logo_v2.svg',
                'website' => 'https://www.marbles.be/',
                'email' => 'hallo@marbles.be', 
                'phone' => '+32 (0)36 20 26 79', 
                'address' => 'Borsbeeksebrug 1', 
                'city' => 'Antwerp', 
                'postal_code' => '2600', 
                'province' => 'Antwerp', 
                'slogan' => '', 
                'description' => 'Hi! Wij zijn Marbles, een team florerende mensen dat met creatieve oplossingen wereldwijd geluk wilt creëren. Da’s onze purpose, ons kompas als het ware.

                Van geluk krijg je nooit genoeg. Het is een euforie die we iedereen gunnen, of dat nu met een kick-ass salescampagne, een fonkelnieuwe website of het verzilveren van jouw marketingdoelstellingen gebeurt. Doe je mee?', 
            ],
            [
                'name' => 'November Five', 
                'logo' => '5d9a3e944aefbe6e27975f54_logo-black.svg',
                'website' => 'https://novemberfive.co/',
                'email' => 'info@novemberfive.co', 
                'phone' => '+32 (0)3 500 92 21', 
                'address' => 'Scheldestraat 11', 
                'city' => 'Antwerp', 
                'postal_code' => '2000', 
                'province' => 'Antwerp', 
                'slogan' => 'We create digital experiences', 
                'description' => 'At November Five, we create defining digital experiences that make people & businesses thrive. It’s much more than just building websites or apps. We build digital products that are useful for businesses and their customers.',
            ],
            [
                'name' => 'Esign', 
                'logo' => 'df5206583153fd43a078.jpg',
                'website' => 'https://www.esign.eu/nl',
                'email' => 'hello@esign.eu', 
                'phone' => '+32 9 241 86 50', 
                'address' => 'Stropkaai 55', 
                'city' => 'Gent', 
                'postal_code' => '9000', 
                'province' => 'Oost-Vlaanderen', 
                'slogan' => 'Esign, digital creatives', 
                'description' => 'De Esign signatuur, da’s de combinatie van technologische know-how en onuitputtelijke creativiteit. Sinds de vroege digitale middeleeuwen - 2002 om precies te zijn - vertalen we het verhaal van onze klanten naar websites, webshops, webapplicaties en andere digitale belevenissen. We zijn graag betrokken van concept tot eindfase, en gaan pas naar huis als de puntjes op de i staan.',
            ],
            [
                'name' => 'Capgemini', 
                'logo' => 'Capgemini_Logo_Color_CMYK.jpg',
                'website' => 'https://www.capgemini.com/',
                'email' => 'info@capgemini.com', 
                'phone' => '+32 27 08 11 11', 
                'address' => 'Bessenveldstraat 19', 
                'city' => 'Diegem', 
                'postal_code' => '1831', 
                'province' => 'Vlaams-Brabant', 
                'slogan' => 'Consulting, Technology, Outsourcing', 
                'description' => 'A global leader in consulting, technology services and digital transformation, Capgemini is at the forefront of innovation to address the entire breadth of clients’ opportunities in the evolving world of cloud, digital and platforms.',
            ]
            
        ];

        foreach ($companies as $company) {
            Company::updateOrCreate($company);
        }
    }
}
