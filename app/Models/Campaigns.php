<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaigns extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'campaign_id', 'campaign_name', 'target_url', 'bid_cpm', 'capping', 'daily_budget', 'status', 'deleted'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function countries(){
        return $this->belongsToMany(Campaigns::class, 'countries', 'campaign_id', 'country');
    }

    public function oss(){
        return $this->belongsToMany(Campaigns::class, 'oss', 'campaign_id', 'os');
    }

    public function niches(){
        return $this->belongsToMany(Campaigns::class, 'niches', 'campaign_id', 'niche');
    }
}