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

    /**
     * Filter by email.
     * 
     * @param  string  $email
     * @param   $query
     * @return query
     */

    public function scopeFilterByEmail($query, $email)
    {
        if ($email) {
        return $query->where('email', 'like' ,"%$email%");
        }
    }
    
    /**
     * Filter by state.
     * @param  int  $state_id
     * @param   $query
     * @return query
     */

    public function scopeFilterByState($query, $state_id)
    {
        if ($state_id) {
        return $query->where('state_id', $state_id);
        }
    }
}
