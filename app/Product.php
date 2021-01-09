<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cat_id',
        'unitprice',
        'promotionprice',
        'image',
        'description',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    //public $timestamps = false;
    
    public function category()
    {
    	return $this->belongsTo('App\Category','cat_id');
    }

   
}
