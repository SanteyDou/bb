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
        'place', 'matchcode', 'min_quantity', 'location', 'category_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
