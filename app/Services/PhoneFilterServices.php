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
        $Validation = new Validation();
        $inputs = $Validation->FilteredPhonesValidation($request);

        $allData = $this->getData();
        $filteredData = [];

        if(!empty($inputs['country'] || !empty($inputs['state']))){
            foreach ($allData as $data){
                if($data['country'] == $inputs['country'] && $data['state'] == $inputs['state'])
                    array_push($filteredData, $data);
                elseif ($data['country'] == $inputs['country'] && empty($inputs['state']))
                    array_push($filteredData, $data);
                elseif ($data['state'] == $inputs['state'] && empty($inputs['country']))
                    array_push($filteredData, $data);
            }
        }else{
            $filteredData = $allData;
        }

        return $filteredData;
    }
}