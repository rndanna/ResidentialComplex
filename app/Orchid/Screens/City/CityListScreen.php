<?php

namespace App\Orchid\Screens\City;

use App\Models\City;
use App\Orchid\Layouts\City\CityCreateOrUpdateLayout;
use App\Orchid\Layouts\City\CityListLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class CityListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Города';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(City $city): array
    {
        return [
            'city' => City::with('districts')->filters()->paginate(10)
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
                ModalToggle::make('Добавить город')
                    ->modal('createCity')
                    ->method('createOrUpdate')
                    ->icon('plus'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            CityListLayout::class,

            Layout::modal('createCity', CityCreateOrUpdateLayout::class)
                ->title('Добавить город')
                ->applyButton('Добавить')
                ->closeButton('Закрыть'),

            Layout::modal('cityEdit', CityCreateOrUpdateLayout::class)
                ->async('asyncGetCity')
                ->applyButton('Сохранить')
                ->closeButton('Закрыть'),
        ];
    }

    public function asyncGetCity(City $city): array
    {
        return [
            'city' => $city,
        ];
    }

    public function createOrUpdate(Request $request)
    {
        $cityId = $request->input('city.id');

        $validated = $request->validate([
            'city.name' => ['required'],
        ]);

        $city = City::updateOrCreate([
            'id' =>  $cityId
        ], array_merge($validated)['city']);

        is_null($cityId) ? Toast::info('Город создан') : Toast::info('Город обновлён');
    }

    public function remove(Request $request): void
    {
        City::findOrFail($request->get('id'))
            ->delete();

        Toast::info('Город был удалён');
    }
}
