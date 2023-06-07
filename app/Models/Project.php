<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'link_cover', 'link_live', 'link_code', 'start_date', 'last_commit', 'code_line', 'folders', 'category_id'];

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }

    /**
     * Get the type that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
