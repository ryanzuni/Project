<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class Comment extends Model
{
    use HasFactory;
    use Commentable;

    protected $fillable = ['title', 'description', 'image', 'comment'];
    public function travelPackage()
    {
        return $this->belongsTo(TravelPackage::class);
    }
}
