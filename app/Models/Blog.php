<?php

namespace App\Models;

use App\Models\BlogCategory;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory, LogsActivity, SoftDeletes;

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    protected static function booted()
    {
        static::creating(function ($request) {
            $request->ip_addr = request()->ip();
            $request->user_id = Auth::user()->id;
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['title', 'slug', 'file', 'file_source', 'author', 'datetime', 'description', 'publish', 'schedule_time', 'tags', 'blog_category_id']);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function comments() : HasMany
    {
        return $this->hasMany(BlogComment::class, 'blog_id');
    }
}
