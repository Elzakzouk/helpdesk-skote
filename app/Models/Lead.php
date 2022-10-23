<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        "city_id",
        "name",
        "code",
        "address"

    ];


    public function city()
    {
        return $this->belongsTo('App\Models\City','city_id');
    }
}
