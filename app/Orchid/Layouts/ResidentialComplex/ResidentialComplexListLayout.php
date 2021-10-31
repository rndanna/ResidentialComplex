<?php

namespace App\Orchid\Layouts\ResidentialComplex;

use App\Models\ResidentialComplex;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ResidentialComplexListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'residentialComplex';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('name', 'Название')
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->width('200px'),
            TD::make('description', 'Описание')->width('400px'),
            TD::make('city.name', 'Город'),
            TD::make('district.name', 'Район'),
            TD::make('created_at', 'Дата создания')->defaultHidden(),
            TD::make('updated_at', 'Дата обновления')->defaultHidden(),
            TD::make('Действия')
                ->align(TD::ALIGN_CENTER)
                ->render(function (ResidentialComplex $residentialComplex) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([
                            ModalToggle::make('Редактировать')
                            ->icon('pencil')
                            ->modal('residentialComplexEdit')
                            ->method('createOrUpdate')
                            ->modalTitle('Редактировать')
                            ->asyncParameters([
                                'residentialComplex' => $residentialComplex->id
                            ]),

                            Button::make('Удалить')
                                ->icon('trash')
                                ->method('remove', [
                                    'id' => $residentialComplex->id,
                                ]),
                    ]);
                }),
        ];
    }
}
