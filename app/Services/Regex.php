<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 10/01/2022
 * Time: 05:15 PM
 */

namespace App\Services;


class Regex
{
    public function PhoneRegex($phones){

        $countries_array = [
            ['country' => 'Cameron', 'country_code' => '+237', 'pattern' => '/\(237\)\ ?[2368]\d{7,8}$/'],
            ['country' => 'Ethiopia', 'country_code' => '+251', 'pattern' =>  '/\(251\)\ ?[1-59]\d{8}$/'],
            ['country' => 'Morocco', 'country_code' => '+212', 'pattern' =>  '/\(212\)\ ?[5-9]\d{8}$/'],
            ['country' => 'Mozambique', 'country_code' => '+258', 'pattern' =>  '/\(258\)\ ?[28]\d{7,8}$/'],
            ['country' => 'Uganda', 'country_code' => '+256', 'pattern' =>  '/\(256\)\ ?\d{9}$/'],
        ];

        //empty array to hold all the countries phone data
        $countriesPhonesArray = [];

        //loop on the phones
        foreach ($phones as $phone){
            //default state
            $state = "NOK";

            foreach ($countries_array as $country){

                if(preg_match($country['pattern'], $phone->phone)){
                    $state = "OK";
                }

                //get the phone without the country code
                $country_phone = preg_replace("/\(\d{3}\)|\s|/", "", $phone->phone);

                //get the country code from the whole phone
                $country_code = "+" . substr($phone->phone,1,3);

                //check if phone country code equal the actual country code the the array will created and added to the main array
                if($country_code == $country['country_code']){
                    $countryPhoneArray = [
                        'country' => $country['country'],
                        'state' => $state,
                        'country_code' => $country['country_code'],
                        'phone' => $country_phone
                    ];

                    //adding the created array to the main array
                    array_push($countriesPhonesArray, $countryPhoneArray);
                }

            }
        }

        return $countriesPhonesArray;
    }
}