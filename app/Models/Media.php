<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['uuid', 'file_path', 'fileable_id', 'fileable_type'];

    protected $appends = [
        'file_url',
    ];

    protected $hidden = [
        'file_path',
    ];

    public function fileable()
    {
        return $this->morphTo();
    }

    public function getFileUrlAttribute()
    {
        if ($this->file_path != null) {
            return Storage::disk('s3')->url($this->file_path);
        }
        return null;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($media) {
            $media->uuid = Str::orderedUuid();
        });
    }
}
