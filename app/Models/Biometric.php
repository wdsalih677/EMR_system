<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biometric extends Model
{
    protected $table = 'biometrics';
    protected $guarded = [];
    use HasFactory;

    public function intensives(){
        return $this->belongsTo(Intensive::class, 'intensive_id');
    }
    
}
