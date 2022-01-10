<?php

namespace App\Http\Controllers;

use App\Services\PhoneFilterServices;
use Illuminate\Http\Request;
use App\Services\PhoneServices;

class PhoneController extends Controller
{

    protected $PhoneServices;
    protected $PhoneFilterServices;

    public function __construct(PhoneServices $PhoneServices, PhoneFilterServices $PhoneFilterServices)
    {
        $this->PhoneServices = $PhoneServices;
        $this->PhoneFilterServices = $PhoneFilterServices;
    }

    /**
     * Handle the incoming requests to get the phones and countries to return them to the view
     *
     * @return array
     */
    public function PhonesCountries()
    {
        $phones = $this->PhoneServices->listAllPhonesData();
        $countries = $this->PhoneServices->listAllCountries();
        return view('phones.phones', ['phones' => $phones, 'countries' => $countries]);
    }

    /**
     * Handle the incoming requests to get the phones and countries filtered and return them to the view
     *
     * @return array
     */
    public function filterPhones(Request $request)
    {
        $phones = $this->PhoneFilterServices->listFilteredPhonesData($request);
        $countries = $this->PhoneServices->listAllCountries();
        return view('phones.phones', ['phones' => $phones, 'countries' => $countries]);
    }
}
