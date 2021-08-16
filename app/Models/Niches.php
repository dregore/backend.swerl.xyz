<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Niches extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'campaign_id', 'niche'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function niches(){
        return $this->belongsToMany(Countries::class, 'campaigns', 'campaign_id', 'niche');
    }
}