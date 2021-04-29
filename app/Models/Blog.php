<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text'
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function isOwner()
    {
        return $this->author()->where('email', Auth::user()->email)->exists();
    }
}
