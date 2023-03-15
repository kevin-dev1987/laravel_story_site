<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public $table = 'reports';

    protected $fillable = [
        'story_id',
        'user_id',
        'reporter_id',
        'reason'
    ];
}
