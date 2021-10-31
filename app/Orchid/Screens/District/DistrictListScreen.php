<?php

namespace App\Orchid\Screens\District;

use App\Models\District;
use App\Orchid\Filters\CityFilter;
use App\Orchid\Layouts\District\DistrictCreateOrUpdateLayout;
use App\Orchid\Layouts\District\DistrictListLayout;
use App\Orchid\Layouts\DistrictSelection;
use Illuminate\Http\Request;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class DistrictListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Районы';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'district' => District::with('city')
                ->filtersApply([CityFilter::class])
                ->filters()
                ->paginate(10)
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [
            ModalToggle::make('Добавить район')
                ->modal('createDistrict')
                ->method('createOrUpdate')
                ->icon('plus'),
        ];
    }

    /**
     * Views.
     *
     * @return array
     */
    public function layout(): array
    {
        return [
            DistrictSelection::class,
            DistrictListLayout::class,

            Layout::modal('createDistrict', DistrictCreateOrUpdateLayout::class)
                ->title('Добавить район')
                ->applyButton('Добавить')
                ->closeButton('Закрыть'),

            Layout::modal('districtEdit', DistrictCreateOrUpdateLayout::class)
                ->async('asyncGetDistrict')
                ->applyButton('Сохранить')
                ->closeButton('Закрыть'),
        ];
    }

    public function asyncGetDistrict(District $district): array
    {
        return [
            'district' => $district,
        ];
    }

    public function createOrUpdate(Request $request)
    {
        $districtId = $request->input('district.id');

        $validated = $request->validate([
            'district.name' => ['required'],
        ]);

        $district = District::updateOrCreate([
            'id' =>  $districtId
        ], array_merge($validated)['district']);

        is_null($districtId) ? Toast::info('Район создан') : Toast::info('Район обновлён');
    }

    public function remove(Request $request): void
    {
        District::findOrFail($request->get('id'))
            ->delete();

        Toast::info('Район был удалён');
    }
}
