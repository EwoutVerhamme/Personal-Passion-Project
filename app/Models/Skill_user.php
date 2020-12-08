<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill_user extends Model
{
    protected $fillable = ['skill_id', 'user_id'];
    use HasFactory;
}
