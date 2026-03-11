<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'tenant_id',
        'name',
        'description'
    ];

    public function reviews()
{
    return $this->hasMany(ApplicationReview::class);
}
}
