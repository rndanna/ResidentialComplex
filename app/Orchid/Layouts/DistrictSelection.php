<?php

namespace App\Orchid\Layouts;

use App\Orchid\Filters\CityFilter;
use Orchid\Filters\Filter;
use Orchid\Screen\Layouts\Selection;

class DistrictSelection extends Selection
{
    /**
     * @return Filter[]
     */
    public function filters(): array
    {
        return [
            CityFilter::class
        ];
    }
}
