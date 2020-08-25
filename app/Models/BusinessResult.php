<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessResult extends Model
{
    public function business_fields()
    {
        return $this->hasMany(BusinessFields::class);
    }

}
