<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';
    protected $fillable = ["id","name","id_num","phone_num","email","degree","title_job"];
    public $timestamps = true;
    use HasFactory;


}
