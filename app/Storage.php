<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'place', 'matchcode', 'min_quantity', 'location', 'category_id', 'quantity', 'status', 'email_send', 'ebm_started'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
