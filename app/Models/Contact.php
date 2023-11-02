<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
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
        return LogOptions::defaults()->logOnly(['type', 'title', 'content', 'actived']);
    }
}
