<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'wards';
    protected $fillable = ["id","name","ward_type","section_id"];
    public $timestamps = true;
    use HasFactory;
    public function sections(){
        return $this->belongsTo(Section::class ,'section_id');
    }
}
