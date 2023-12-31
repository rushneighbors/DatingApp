<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;


class SkillLevel extends NeoEloquent
{
    use HasFactory;

    const PRESET_VALUES = [
        'No Experience',
        'Novice',
        'Moderate',
        'Advanced',
        'Professional'
    ];

    protected $fillable = [
        'name'
    ];
    protected $label = 'SkillLevel';

    public function interest()
    {
        return $this->belongsTo(UserInterest::class, 'AT_SKILL_LEVEL');
    }

}
