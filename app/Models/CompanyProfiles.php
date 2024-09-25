<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfiles extends Model
{
    use HasFactory;

    public function getLogoAttribute()
    {
        if ($this->attributes['logo'] != '' && $this->attributes['logo'] != null) {
            return asset('assets/images/logo/') . '/' . $this->attributes['logo'];
        } else {
            return $this->attributes['logo'] . 'https://ui-avatars.com/api/?background=DBFED7&color=085702&name=' . urlencode($this->attributes['name']);
        }

        return '';
    }
}
