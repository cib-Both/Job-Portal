<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function availableJobs()
    {
        return $this->hasMany(Job::class)->whereHas('posts', function ($query) 
        {
            $query->where('status', 'published');
        });
    }
}
