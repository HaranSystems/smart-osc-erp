<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'tenant_id',
        'submitted_by',
        'title',
        'description',
        'status',
        'submitted_at'
    ];

    public function reviews()
{
    return $this->hasMany(ApplicationReview::class);
}

public function documents()
{
    return $this->hasMany(Document::class);
}
}
