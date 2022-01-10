<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 10/01/2022
 * Time: 08:08 PM
 */

namespace App\Services;

use Illuminate\Foundation\Validation\ValidatesRequests;

class Validation
{
    use ValidatesRequests;
    public function FilteredPhonesValidation($request)
    {
        $this->validate($request,[
            'country' => 'string',
            'state' => 'string',
        ]);

        $country = $request->input('country');
        $state = $request->input('state');

        $inputs = ['country' => $country, 'state' => $state];
        return $inputs;
    }
}