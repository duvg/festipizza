<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['name', 'address', 'telephone', 'picture'];

    public function votes()
    {
        return $this->hasMany('App\Vote', 'restaurant_id','id') ;
    }


}
