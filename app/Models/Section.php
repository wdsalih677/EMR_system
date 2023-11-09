<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';
    protected $fillable = ["id","name","ward_num","doctor_id"];
    public $timestamps = true;
    use HasFactory;


////////////////////////////////////////////////////////////////////
    public function doctors(){
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

//////////////////////////////////////////////////////////////////

    public function patientsfinaldata(){
        return $this->belongsTo(PatientFinalData::class,'id', 'section_id');
    }
}
