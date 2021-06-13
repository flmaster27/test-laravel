<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConvertHistory extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'currency_from',
        'currency_to',
        'value',
        'converted_value',
        'rate',
        'created_at',
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'id',
    ];
}
