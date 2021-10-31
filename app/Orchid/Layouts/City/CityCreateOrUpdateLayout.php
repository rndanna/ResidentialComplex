<?php

namespace App\Orchid\Layouts\City;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class CityCreateOrUpdateLayout extends Rows
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
            Input::make('city.id')
                ->type('hidden'),

            Input::make('city.name')
                ->type('text')
                ->required()
                ->title('Название'),
        ];
    }
}
