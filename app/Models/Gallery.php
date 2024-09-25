<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    public function getImageUrlAttribute()
    {
        if ($this->attributes['image_url'] != '' && $this->attributes['image_url'] != null) {
            return asset('assets/images/gallery/') . '/' . $this->attributes['image_url'];
        } else {
            return $this->attributes['image_url'] . 'https://ui-avatars.com/api/?name=' . urlencode($this->attributes['name']);
        }

        return '';
    }
}
