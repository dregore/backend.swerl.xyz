<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oss extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'campaign_id', 'os'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function oss(){
        return $this->belongsToMany(Countries::class, 'campaigns', 'campaign_id', 'os');
    }
}