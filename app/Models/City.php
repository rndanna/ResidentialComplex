<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class City extends Model
{
    use HasFactory;
    use Filterable;
    use AsSource;

    protected $fillable = [
        'name',
    ];

    protected array $allowedSorts = [
        'name'
    ];

    protected $allowedFilters = [
        'name'
    ];

    public function residentialComplexes(): HasMany
    {
        return $this->hasMany(ResidentialComplex::class);
    }

    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }
}
