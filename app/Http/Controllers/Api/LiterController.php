<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LiterResource;
use App\Models\Liter;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class LiterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return LiterResource::collection(Liter::with('apartments')->get());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return LiterResource
     */
    public function show(int $id): LiterResource
    {
        return new LiterResource(Liter::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Liter  $liter
     * @return Response
     */
    public function update(Request $request, Liter $liter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Liter  $liter
     * @return Response
     */
    public function destroy(Liter $liter)
    {
        //
    }
}
