<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'name',
        'name_ar',
        'main'
    ];


    public function leads()
    {
       return $this->hasMany('App\Models\City','city_id');
    }



    

}
