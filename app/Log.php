<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'personal_id', 'location', 'action', 'quantity', 'place', 'matchcode',
    ];
}
