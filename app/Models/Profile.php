<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Contact;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'definition',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contact()
    {
        return $this->hasOne(Contact::class);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class)->orderBy('created_at', 'DESC');
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class)->orderBy('created_at', 'DESC');
    }

    public function projects()
    {
        return $this->hasMany(Project::class)->orderBy('created_at', 'DESC');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'DESC');
    }
}
