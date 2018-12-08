<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    public function country()
    {
        return $this->hasMany(country::class);

    }
    public function city()
    {
        return $this->hasMany(city::class);

    }
}
