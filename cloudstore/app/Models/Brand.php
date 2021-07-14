<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Translatable;

    protected $with = ['translations'];

    protected $fillable = [
        'is_active','photo'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $translatedAttributes = ['name'];

    public function getActive()
    {

        return $this->is_active == 0 ? 'غير مفعل' : 'مفعل';
    }


    public function getPhotoAttribute($val){
        return ($val !== null) ? asset('assets/images/brands/' . $val) : "";
    }

    public function scopeActive($query){
        return $query -> where('is_active',1) ;
    }



}
