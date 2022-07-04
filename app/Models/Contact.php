<?php

namespace App\Models;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'address',
        'mobile',
        'website',
        'social',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
