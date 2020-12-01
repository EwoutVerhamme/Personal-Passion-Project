<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use User;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_id'];

    public function skills()
    {
        return $this->belongsTo(User::class);
    }
}
