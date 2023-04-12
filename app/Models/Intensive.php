<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intensive extends Model
{
    protected $table = 'intensives';
    protected $guarded = [];
    use HasFactory;

    public function tickets(){
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
    public function bio(){
        return $this->belongsTo(Biometric::class,'id', 'intensive_id');
    }
}
