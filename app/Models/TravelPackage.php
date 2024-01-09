<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class TravelPackage extends Model
{
    use HasFactory;
    use Commentable;

    protected $guarded = ['id'];

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
