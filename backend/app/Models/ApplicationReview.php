<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationReview extends Model
{
    protected $fillable = [
        'application_id',
        'department_id',
        'reviewed_by',
        'status',
        'remarks',
        'reviewed_at'
    ];
}
