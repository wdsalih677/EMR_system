<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationAttachment extends Model
{
    protected $tabel = 'operations';
    protected $guarded = [];
    use HasFactory;

    public function operations(){
        return $this->belongsTo(Operation::class ,'operation_id');
    }
}
