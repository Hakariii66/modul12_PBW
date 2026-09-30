<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class publikasi extends Model
{
    protected $fillable = [
        'judul',
        'tanggal_rilis',
        'sampul',
    ];
}
