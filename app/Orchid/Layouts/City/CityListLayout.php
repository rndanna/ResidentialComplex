<?php

namespace App\Orchid\Layouts\City;

use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use App\Models\City;

class CityListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'city';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('name', 'Город')
                ->sort()
                ->filter(TD::FILTER_TEXT),
            TD::make('created_at', 'Дата создания')->defaultHidden(),
            TD::make('updated_at', 'Дата обновления')->defaultHidden(),
            TD::make('Действия')
                ->align(TD::ALIGN_CENTER)
                ->render(function (City $city){
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([
                            ModalToggle::make('Редактировать')
                                ->icon('pencil')
                                ->modal('cityEdit')
                                ->method('createOrUpdate')
                                ->modalTitle('Редактировать')
                                ->asyncParameters([
                                    'city' => $city->id
                                ]),

                            Button::make('Удалить')
                                ->icon('trash')
                                ->method('remove', [
                                    'id' => $city->id,
                                ]),
                        ]);
                })
        ];
    }
}
