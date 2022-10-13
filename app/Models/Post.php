<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
       protected $guarded  = [
        'id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function postApprove($query)
    {
        return $query->where('is_approved', 1);
    }
    public function postPublished($query)
    {
        return $query->where('status', 1);
    }
    public function comments()
    {
        return $this->morphMany(Comments::class, 'commentable')->whereNull('parent_id');
    }
}
