<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'name',
        'domain',
        'contact_email',
        'is_active'
    ];

    public function departments()
{
    return $this->hasMany(Department::class);
}

public function applications()
{
    return $this->hasMany(Application::class);
}

}

