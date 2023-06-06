<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'link_cover', 'link_live', 'link_code', 'start_date', 'last_commit', 'code_line', 'folders'];

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }
}
