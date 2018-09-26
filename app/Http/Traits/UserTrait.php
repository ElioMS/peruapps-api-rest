<?php

namespace App\Http\Traits;
use Validator;

trait UserTrait
{
    protected function validator($request)
    {
         $rules =  [
            'name' => 'required',
            'email' => 'required|email',
            'paternal_surname' => 'required',
            'maternal_surname' => 'required',
            'birthday' => 'required',
//            'admission_date' => 'required'
        ];

         return Validator::make($request->all(), $rules);
    }
}