<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = ["id","name","ticket_num","identity_num","address","gender","age","age_type","job","date_entry","phone_num"];
    public $timestamps = true;
    use HasFactory;

    public function pre_diagnoses(){
        return $this->belongsTo(Pre_diagnosis::class,'id', 'ticket_id');
    }
    public function examinations(){
        return $this->belongsTo(Examination::class,'id', 'ticket_id');
    }
    public function patientsfinaldata(){
        return $this->belongsTo(PatientFinalData::class,'id', 'ticket_id');
    }
    // public function ticketsbio(){
    //     return $this->belongsTo(Biometric::class,'id', 'ticket_id');
    // }
    // public function ticketsinten(){
    //     return $this->belongsTo(Ticket::class,'id', 'ticket_id');
    // }
}
