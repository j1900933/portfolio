<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Engineer extends Model
{
   
    public function employment_status()
    {
        return $this->belongsTo('App\Models\EmploymentStatus');
    }
    
    public function in_house_status()
    {
        return $this->belongsTo('App\Models\InHouseStatus');
    }

    public function engineer_skill()
    {
        return $this->belongsTo('App\Models\EngineerSkill');
    }

    public function human_skill()
    {
        return $this->belongsTo('App\Models\HumanSkill');
    }

    public function getFullNameAttribute()
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['birth_date'])->age;
    }

    protected $dates = ['birth_date']; //.show format()

    protected $guarded = ['prefecture', 'town', 'city', 'after_address', 'action','q',];

    use SoftDeletes;

    use Sortable;
    public $sortable = ['id', 'last_name', 'birth_date', 'address'];
}