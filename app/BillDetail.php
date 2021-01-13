<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = 'bill_details';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
        'id_bill',
        'id_product',
        'quantity',
        'unitprice',
    ];

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }

    public function bill()
    {
    	return $this->belongsTo('App\Bills');
    }
}
