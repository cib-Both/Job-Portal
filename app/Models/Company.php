<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'description',
        'website',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function publishedJobs()
    {
        return $this->hasMany(Job::class)->whereHas('posts', function ($query) 
        {
            $query->where('status', 'published');
        });
    }
}
