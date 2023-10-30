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
    public function patientsFollowUps(){
        return $this->belongsTo(PatientFollowUp::class,'id', 'ticket_id');
    }
    public function oprations(){
        return $this->belongsTo(Operation::class,'id', 'ticket_id');
    }
    public function medicalRecords(){
        return $this->belongsTo(MedicalRecord::class,'id', 'ticket_id');
    }
}
