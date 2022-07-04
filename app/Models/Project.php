<?php

namespace App\Models;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'title',
        'description',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
