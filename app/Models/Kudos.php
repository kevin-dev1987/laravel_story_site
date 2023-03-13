<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kudos extends Model
{
    use HasFactory;

    protected $fillable = [
        'kudos_from',
        'kudos_to'
    ];
}
