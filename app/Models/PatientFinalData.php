<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientFinalData extends Model
{
    protected $table = 'patients_final_data';
    protected $fillable = ["id","ticket_id","ward_id","section_id","final_diagnosis","residence_type","follow_up_date","treatment_diet"];
    public $timestamps = true;

    use HasFactory;

    public function tickets(){
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
    public function sections(){
        return $this->belongsTo(Section::class ,'section_id');
    }
    // public function wards(){
    //     return $this->belongsTo(Ward::class ,'ward_id');
    // }
}
