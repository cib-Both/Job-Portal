<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user_id',
        'job_id',
        'user_name',
        'user_email',
        'user_contact_phone',
        'status',
        'resume',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
