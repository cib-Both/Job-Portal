<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'job_id',
        'reqirement',
        'skill',
        'salary_option',
        'salary',
        'location',
        'type',
        'deadline_option',
        'deadline',
        'status',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
