<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscription extends Model
{
    const ACTIVE = 0;
    const DELETED = 1;

    use HasFactory;

    protected $fillable = [        
        'state_id',
        'email'       
    ];

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d-m-Y H:i:s');
    }

    public function getUpdatedAtAttribute($value){
        return Carbon::parse($value)->format('d-m-Y H:i:s');
    }
}
