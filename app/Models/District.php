<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class District extends Model
{
    use HasFactory;
    use Filterable;
    use AsSource;

    protected $fillable = [
        'name',
        'city_id'
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
}
