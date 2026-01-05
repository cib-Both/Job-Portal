<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCv extends Model
{
    protected $table = 'user_cv';

    protected $fillable = [
        'user_id',
        'resume_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function application()
    {
        return $this->belongsTo(Application::class, 'user_id', 'user_id');
    }
}