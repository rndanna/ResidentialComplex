<?php

namespace App\Orchid\Layouts\District;

use App\Models\City;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Layouts\Rows;

class DistrictCreateOrUpdateLayout extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): array
    {
        return [
            Input::make('district.id')
                ->type('hidden'),

            Input::make('district.name')
                ->type('text')
                ->required()
                ->title('Название'),

            Relation::make('district.city_id')
                ->fromModel(City::class, 'name')
                ->title('Выберите город')
                ->required(),
        ];
    }
}
