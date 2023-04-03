<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Death extends Model
{
    protected $tabel = 'deaths';
    protected $guarded = [];
    use HasFactory;
    use SoftDeletes;
}
