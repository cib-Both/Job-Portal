<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job';
    
    protected $fillable = [
        'title',
        'description',
        'is_active',
        'company_id',
        'category_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
