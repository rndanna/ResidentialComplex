<?php

namespace App\Orchid\Layouts\ResidentialComplex;

use App\Models\City;
use App\Models\District;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Rows;

class ResidentialComplexCreateOrUpdateLayout extends Rows
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
            Input::make('residentialComplex.id')
                ->type('hidden'),

            Input::make('residentialComplex.name')
                ->type('text')
                ->required()
                ->title('Название'),

            TextArea::make()
                ->name('residentialComplex.description')
                ->rows(5)
                ->title('Описание')
                ->required(),

            Relation::make('residentialComplex.city_id')
                ->fromModel(City::class, 'name')
                ->title('Выберите город')
                ->required(),

            Relation::make('residentialComplex.district_id')
                ->fromModel(District::class, 'name')
                ->title('Выберите район')
                ->required(),

            Upload::make('residentialComplex.attachment')
            ->title('Загрузить картинку')
            ->maxFiles(1)
        ];
    }
}
