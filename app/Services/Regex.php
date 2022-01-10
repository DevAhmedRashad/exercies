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
        //Regular expressions Patterns
        $cameroon_regex = "/\(237\)\ ?[2368]\d{7,8}$/";
        $ethiopia_regex = "/\(251\)\ ?[1-59]\d{8}$/";
        $morocco_regex = "/\(212\)\ ?[5-9]\d{8}$/";
        $mozambique_regex = "/\(258\)\ ?[28]\d{7,8}$/";
        $uganda_regex = "/\(256\)\ ?\d{9}$/";

        //mapping the country code with the country
        $countries_code = [
            "+237" => 'Cameron',
            "+251" => 'Ethiopia',
            "+212" => 'Morocco',
            "+258" => 'Mozambique',
            "+256" => 'Uganda'
        ];

        //empty array to hold all the countries phone data
        $countriesPhonesArray = [];

        //loop on the phones
        foreach ($phones as $phone){
            //default state
            $state = "NOK";

            //Regex check
            if(preg_match($cameroon_regex, $phone->phone)){
                $state = "OK";
            }elseif (preg_match($ethiopia_regex, $phone->phone)){
                $state = "OK";
            }elseif (preg_match($morocco_regex, $phone->phone)){
                $state = "OK";
            }elseif (preg_match($mozambique_regex, $phone->phone)){
                $state = "OK";
            }elseif (preg_match($uganda_regex, $phone->phone)){
                $state = "OK";
            }

            //get the country code from the whole phone
            $country_code = "+" . substr($phone->phone,1,3);

            //get the country from the mapping array for countries with country code
            $country = $countries_code[$country_code];

            //get the phone without the country code
            $country_phone = preg_replace("/\(\d{3}\)|\s|/", "", $phone->phone);

            //the created array for each phone
            $countryPhoneArray = [
                'country' => $country,
                'state' => $state,
                'country_code' => $country_code,
                'phone' => $country_phone
            ];

            //push the created array to be added to the main array
            array_push($countriesPhonesArray, $countryPhoneArray);
        }

        return $countriesPhonesArray;
    }
}