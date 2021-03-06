<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = ['creator_name', 'creator_img', 'info', 'location', 'date', 'user_id', 'skill_id'];

    public function ads()
    {
        return $this->belongsTo(User::class);
    }
}
