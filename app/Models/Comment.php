<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $perPage = 5;
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function idea()
    {
        return $this->belongsTo(Idea::class)->withDefault();
    }

}
