<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 09/01/2022
 * Time: 02:08 AM
 */

namespace App\Services;


use App\ServicesDatabase\PhonesDB;

class PhoneServices
{
    protected $PhoneDB;
    protected $Regex;
    protected $Paginate;

    public function __construct(PhonesDB $PhoneDB, Regex $Regex, Paginate $Paginate)
    {
        $this->PhoneDB = $PhoneDB;
        $this->Regex = $Regex;
        $this->Paginate = $Paginate;
    }

    //get all data from database and pass it to regex rules and return it
    protected function getData(){
        //Get all phones from DB
        $phones = $this->PhoneDB->listAllPhones();
        return $this->Regex->PhoneRegex($phones);
    }

    //return all phones data
    public function listAllPhonesData()
    {
        return $this->Paginate->paginate($this->getData());
    }

    //return all countries only for the drop down countries input
    public function listAllCountries()
    {
        $allData = $this->getData();

        $countries = [];
        //loop on all data and filter the duplicated country name from the array
        foreach ($allData as $country){
            if(!in_array($country['country'], $countries)){
                array_push($countries, $country['country']);
            }
        }
        return $countries;
    }
}