<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientFollowUp extends Model
{
    protected $tabel = 'patient_follow_ups';
    protected $guarded = [];
    use HasFactory;
    public function tickets(){
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
    public function wards(){
        return $this->belongsTo(Ward::class, 'ward_id');
    }
    public function bio(){
        return $this->belongsTo(BioFollowUp::class,'id', 'patientFollowUp_id');
    }
}
