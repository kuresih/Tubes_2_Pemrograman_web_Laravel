<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Puisii extends Model
{
    use SoftDeletes;
 
    protected $fillable = [
        'judul', 'isi'
    ];
    protected $dates = ['deleted_at'];
}
