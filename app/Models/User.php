<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function engineers()
    {
        return $this->hasMany(Engineer::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
