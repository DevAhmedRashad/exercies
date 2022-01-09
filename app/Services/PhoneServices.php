<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 09/01/2022
 * Time: 02:08 AM
 */

namespace App\Services;


use App\ServicesDatabase\PhonesDB;
use Illuminate\Support\Facades\DB;

class PhoneServices
{
    /** @var PhoneDB */
    protected $PhoneDB;

    public function __construct(PhonesDB $PhoneDB)
    {
        $this->PhoneDB = $PhoneDB;
    }

    public function listAllPhones()
    {
        //Get all phones from DB
        $phones = $this->PhoneDB->listAllPhones();
        return $phones;
    }
}