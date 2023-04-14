<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BioFollowUp extends Model
{
    protected $table = 'biometrics_follow_ups';
    protected $guarded = [];
    use HasFactory;

    public function patientsFollowUp(){
        return $this->belongsTo(PatientFollowUp::class, 'patientFollowUp_id');
    }
}
