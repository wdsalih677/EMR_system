<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operation extends Model
{
    protected $table = 'operations';
    protected $guarded = [];
    use HasFactory;
    use SoftDeletes;

    public function tickets(){
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
}
