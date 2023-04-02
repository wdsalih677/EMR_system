<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Birth extends Model
{
    protected $table = 'birth';
    protected $guarded = [];
    use HasFactory;
    use SoftDeletes;
}
