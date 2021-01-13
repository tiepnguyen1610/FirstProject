<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
        'fullname',
        'email',
        'address',
        'phone_number',
        'note',
    ];

    public function bill()
    {
    	return $this->hasMany('App\Bills');
    }
}
