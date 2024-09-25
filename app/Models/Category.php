<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory, SoftDeletes;

    public function getImageUrlAttribute()
    {
        if ($this->attributes['image_url'] != '' && $this->attributes['image_url'] != null) {
            return asset('assets/images/category/') . '/' . $this->attributes['image_url'];
        } else {
            return $this->attributes['image_url'] . 'https://ui-avatars.com/api/?name=' . urlencode($this->attributes['name']);
        }

        return '';
    }
}
