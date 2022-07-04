<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'position',
        'current',
        'startdatemonth',
        'startdateyear',
        'enddatemonth',
        'enddateyear',
        'description',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
