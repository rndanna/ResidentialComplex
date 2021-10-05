<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function residentialComlexes()
    {
        return $this->hasMany(ResidentialComplex::class);
    }
    use HasFactory;
}
