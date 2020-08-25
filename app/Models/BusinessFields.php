<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BusinessFields extends Model
{
    public function getData()
    {
        $data = DB::table('business_fields')->get();

        return $data;
    }
}
