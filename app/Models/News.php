<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public function getCoverAttribute()
    {
        if ($this->attributes['cover'] != '' && $this->attributes['cover'] != null) {
            return asset('assets/images/news/') . '/' . $this->attributes['cover'];
        } else {
            return 'https://ui-avatars.com/api/?background=DBFED7&color=085702&name=' . urlencode($this->attributes['title']);
        }

        return '';
    }

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
