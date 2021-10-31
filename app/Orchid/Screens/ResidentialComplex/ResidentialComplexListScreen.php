<?php

namespace App\Orchid\Screens\ResidentialComplex;

use App\Models\ResidentialComplex;
use App\Orchid\Filters\CityFilter;
use App\Orchid\Layouts\DistrictSelection;
use App\Orchid\Layouts\ResidentialComplex\ResidentialComplexCreateOrUpdateLayout;
use App\Orchid\Layouts\ResidentialComplex\ResidentialComplexListLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class ResidentialComplexListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Жилые комплексы';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(ResidentialComplex $residentialComplex): array
    {
        $residentialComplex->load('attachment');
        return [
            'residentialComplex' => ResidentialComplex::with('city', 'district')
                ->filters()
                ->filtersApply([CityFilter::class])
                ->paginate(10)
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
            ModalToggle::make('Добавить жилой комплекс')
                ->modal('createResidentialComplex')
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
            ResidentialComplexListLayout::class,

            Layout::modal('createResidentialComplex', ResidentialComplexCreateOrUpdateLayout::class)
                ->title('Добавить жилой комплекс')
                ->applyButton('Добавить')
                ->closeButton('Закрыть'),

            Layout::modal('residentialComplexEdit', ResidentialComplexCreateOrUpdateLayout::class)
                ->async('asyncGetResidentialComplex')
                ->applyButton('Сохранить')
                ->closeButton('Закрыть'),

        ];
    }

    public function asyncGetResidentialComplex(ResidentialComplex $residentialComplex): array
    {
        $residentialComplex->load('attachment');

        return [
            'residentialComplex' => $residentialComplex,
        ];
    }

    public function createOrUpdate(Request $request)
    {
        $complexId = $request->input('residentialComplex.id');

        $validated = $request->validate([
            'residentialComplex.name' => ['required'],
            'residentialComplex.description' => ['required'],
            'residentialComplex.city_id' => ['required', 'exists:cities,id'],
            'residentialComplex.district_id' => ['required', 'exists:districts,id']
        ]);

        $residentialComplex = ResidentialComplex::updateOrCreate([
            'id' =>  $complexId
        ], array_merge($validated)['residentialComplex']);

        $residentialComplex->attachment()->syncWithoutDetaching(
            $request->input('residentialComplex.attachment', [])
        );

        is_null($complexId) ? Toast::info('Комплекс создан') : Toast::info('Комплекс обновлёен');
    }

    public function remove(Request $request): void
    {
        ResidentialComplex::findOrFail($request->get('id'))
            ->delete();

        Toast::info('Комплекс был удалён');
    }
}
