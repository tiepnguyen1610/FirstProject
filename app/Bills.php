<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $table = 'bills';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
        'id_customer',
        'date_order',
        'total',
        'payment',
        'note',
    ];

    public function bill_detail()
    {
    	return $this->hasMany('App\BillDateil');
    }

    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }

}
