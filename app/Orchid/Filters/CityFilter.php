<?php

namespace App\Orchid\Filters;

use App\Models\City;
use App\Models\District;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Select;

class CityFilter extends Filter
{
    /**
     * @var array
     */
    public $parameters = [
        'name'
    ];

    /**
     * @return string
     */
    public function name(): string
    {
        return 'Город';
    }

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
//        return $builder->where('name', $this->request->get('name'));
        return $builder->whereHas('city', function (Builder $query){
            $query->where('name', $this->request->get('name'));
        });
    }

    /**
     * @return Field[]
     */
    public function display(): array
    {
        return [
            Select::make('name')
                ->fromModel(City::class, 'name', 'name')
                ->empty()
                ->value($this->request->get('name'))
            ->title('Город')
        ];
    }
}
