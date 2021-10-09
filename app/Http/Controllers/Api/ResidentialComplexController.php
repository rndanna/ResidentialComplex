<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResidentialComplexResource;
use Illuminate\Http\Request;
use \App\Models\ResidentialComplex;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ResidentialComplexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $params = $request->except('_token');
        $residentialComplexes = ResidentialComplex::residentialComplexesByFilters($params)->paginate(8);

        return ResidentialComplexResource::collection($residentialComplexes);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return ResidentialComplexResource
     */
    public function show(int $id): ResidentialComplexResource
    {
        return new ResidentialComplexResource(ResidentialComplex::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, int $id): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        //
    }
}
