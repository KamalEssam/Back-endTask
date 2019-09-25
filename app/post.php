<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = [
          'first_name'	,
          'last_name'	,
          'email'		,
          'password'	,
          'gender'		,
          'countryCode'	,
          'phone_number',
          'birth_date'	,
    ];
}
