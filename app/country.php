<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    public function city()
    {
        return $this->hasMany(city::class);

    }
}
