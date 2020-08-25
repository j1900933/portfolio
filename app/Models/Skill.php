<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function skill_fields()
    {
        return $this->hasMany(SkillField::class);
    }

}
