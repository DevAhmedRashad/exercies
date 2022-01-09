<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PhoneServices;

class PhoneController extends Controller
{
    /** @var PhoneServices */
    protected $PhoneServices;

    public function __construct(PhoneServices $PhoneServices)
    {
        $this->PhoneServices = $PhoneServices;
    }

    /**
     * Handle the incoming request to list all phones.
     *
     * @return array to view
     */
    public function allPhones()
    {
        $phones = $this->PhoneServices->listAllPhones();
        return view('phones.phones', ['phones' => $phones]);
    }
}
