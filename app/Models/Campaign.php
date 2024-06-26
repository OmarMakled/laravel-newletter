<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use SoftDeletes;

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'campaign_group');
    }
}
