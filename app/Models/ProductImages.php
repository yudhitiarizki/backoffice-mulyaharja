<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;

    public function getImageUrlAttribute()
    {
        if ($this->attributes['image_url'] != '' && $this->attributes['image_url'] != null) {
            return asset('assets/images/products/') . '/' . $this->attributes['image_url'];
        } else {
            return $this->attributes['image_url'] . 'https://ui-avatars.com/api/?background=DBFED7&color=085702&name=' . 'kampung mulyaharja';
        }

        return '';
    }

    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
