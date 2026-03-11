<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'application_id',
        'uploaded_by',
        'file_name',
        'file_path',
        'file_type',
        'file_size'
    ];
}
