<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use SoftDeletes;
    protected $date=['deleted_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function experiences(){
        return $this->hasMany('App\Experience');
    }
}
