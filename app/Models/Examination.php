<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    protected $table = 'examinations';
    protected $fillable = ["id","ticket_id","diagnoses_id","test_results","test_status"];
    public $timestamps = true;
    use HasFactory;

    public function tickets(){
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
    public function pre_diagnoses(){
        return $this->belongsTo(Pre_diagnosis::class, 'diagnoses_id');
    }
}
