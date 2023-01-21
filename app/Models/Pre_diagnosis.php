<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pre_diagnosis extends Model
{
    protected $table = 'pre_diagnoses';
    protected $fillable = ["id","ticket_id","provisional_diagnosis","symptoms","examinations"];
    public $timestamps = true;
    use HasFactory;

    public function tickets(){
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
}
