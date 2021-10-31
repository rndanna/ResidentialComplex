<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class ResidentialComplex extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;
    use Attachable;

    protected $fillable = [
        'name',
        'description',
        'city_id',
        'district_id',
        'created_at',
        'updated_at'
    ];

    protected array $allowedSorts = [
        'name'
    ];

    protected $allowedFilters = [
        'name'
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function image()
    {
        return $this->hasMany(Attachment::class)->where('group','photo');
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
