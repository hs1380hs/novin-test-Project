<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use GuzzleHttp\Client;

class CountryController extends Controller
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function importCountriesData()
    {
        $response = $this->client->get('https://restcountries.com/v3.1/all');

        $data = json_decode($response->getBody(), true);
//        $data1 = $data[0];
//        dd($data1['timezones']);
        foreach ($data as $countryData) {
            Country::updateOrCreate(
                [   'name' => $countryData['name']['official'],
                    'population' => $countryData['population'],
                    'area' => $countryData['area'],
                    'latlng' => json_encode($countryData['latlng']),
                    'timezones' => $countryData['timezones'][0],
                ]
            );
        }

        return response()->json(['message' => 'Countries data imported successfully']);
    }
}
