<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    public function getCoverAttribute()
    {
        if ($this->attributes['cover'] != '' && $this->attributes['cover'] != null) {
            return asset('assets/images/videos/') . '/' . $this->attributes['cover'];
        } else {
            return 'https://img.youtube.com/vi/' . urlencode($this->attributes['youtube_id']) . '/0.jpg';
        }

        return '';
    }

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
