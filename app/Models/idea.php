<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class idea extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }
    public function votes()
    {
        return $this->belongsToMany(User::class, 'votes');
    }
    public function isVotedByUser(?User $user)
    {
        if (!$user){
            return false;
        }
        return Vote::where('user_id', $user->id)->where('idea_id', $this->id)->exists();
    }

    public function getStatusclass()
    {
        $allStatus = [
            'open' => 'bg-gray-500 text-white',
            'considering' => 'bg-purple-500 text-white',
            'in-progress' => 'bg-yellow-500 text-white',
            'implemented' => 'bg-green-500 text-white',
            'closed' => 'bg-red-500 text-white',
        ];
        return $allStatus[$this->status];
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


}
