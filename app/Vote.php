<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['restaurant_id', 'star', 'id'];

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant', 'restaurant_id','id') ;
    }

}
