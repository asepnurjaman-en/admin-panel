<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Strbox extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    protected static function booted()
    {
        static::creating(function ($request) {
            $request->ip_addr = request()->ip();
            $request->user_id = Auth::user()->id;
        });
    }
}
