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

}
