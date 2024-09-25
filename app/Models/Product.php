<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function getCoverAttribute()
    {
        if ($this->attributes['cover'] != '' && $this->attributes['cover'] != null) {
            return asset('assets/images/products/') . '/' . $this->attributes['cover'];
        } else {
            return 'https://ui-avatars.com/api/?background=DBFED7&color=085702&name=' . urlencode($this->attributes['title']);
        }

        return '';
    }

    public function ProductImages()
    {
        return $this->hasMany(ProductImages::class, 'product_id', 'id');
    }

    public function Category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }
}
