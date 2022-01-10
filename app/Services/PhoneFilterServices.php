<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 10/01/2022
 * Time: 07:32 PM
 */

namespace App\Services;

class PhoneFilterServices extends PhoneServices
{

    //list all countries only for the drop down countries input
    public function listFilteredPhonesData($request)
    {
        //Validate the passed inputs in the service validation class
        $Validation = new Validation();
        $inputs = $Validation->FilteredPhonesValidation($request);

        $allData = $this->getData();
        $filteredData = [];

        //check if the country input or state input are not empty and if they are empty return all data
        if(!empty($inputs['country'] || !empty($inputs['state']))){

            //looping on all data to get the required data and added them to the filteredData array
            foreach ($allData as $data){

                //if country data matches the country inputs and the state matches the state inputs
                if($data['country'] == $inputs['country'] && $data['state'] == $inputs['state'])
                    array_push($filteredData, $data);
                elseif ($data['country'] == $inputs['country'] && empty($inputs['state'])) //if country data matches the country inputs but empty state input
                    array_push($filteredData, $data);
                elseif ($data['state'] == $inputs['state'] && empty($inputs['country'])) //if state matches the state inputs but empty country input
                    array_push($filteredData, $data);

            }
        }else{
            //return all data if country input and state input are empty
            $filteredData = $allData;
        }

        return $filteredData;
    }
}