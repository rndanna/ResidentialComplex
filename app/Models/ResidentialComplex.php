<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResidentialComplex extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'city_id',
        'district_id'
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public static function residentialComplexesByFilters($params): Builder
    {
        $query = ResidentialComplex::query();

        if (!empty($params['city'])) {
            $query->whereIn('city_id', $params['city']);
        }

        if (!empty($params['district'])) {
            $query->whereIn('district_id', $params['district']);
        }

        return $query;
    }
}
