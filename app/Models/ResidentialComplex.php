<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentialComplex extends Model
{
    protected $fillable = [
        'name',
        'description',
        'img'
    ];

    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function district(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    use HasFactory;
}
