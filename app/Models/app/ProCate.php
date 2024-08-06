<?php

namespace App\Models\app;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProCate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code'
    ];
}
