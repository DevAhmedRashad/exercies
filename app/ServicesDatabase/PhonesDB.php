<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 09/01/2022
 * Time: 03:13 AM
 */

namespace App\ServicesDatabase;


use Illuminate\Support\Facades\DB;

class PhonesDB
{
    //Return All phones from Database
    public function listAllPhones()
    {
        //Get all phones from DB
        return DB::table('customer')->select('phone')->get();
    }

}