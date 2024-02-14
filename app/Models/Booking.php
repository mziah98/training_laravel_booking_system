<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'date',
        'time_from',
        'time_to',
        'pax',
        'remark',
    ];

    public function room(){
        return $this->belongsTo('App\Models\Room');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}