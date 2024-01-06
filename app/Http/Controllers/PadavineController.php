<?php

namespace App\Http\Controllers;

use App\Models\Padavine;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequests\StorePadavineRequest;
use App\Http\Requests\UpdateRequests\UpdatePadavineRequest;
use App\Http\Resources\PadavineResource;
use App\Http\Resources\PadavineCollection;
use App\Filters\PadavineFilter;
use Illuminate\Support\Arr;
use App\Http\Requests\BulkStoreRequests\BulkStorePadavineRequest;

class PadavineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new PadavineFilter();
        $filterItems = $filter ->transform($request); 

        if(count($filterItems)== 0){

            return new PadavineCollection(Padavine::paginate());
        }
            else {
                $padavine= Padavine::where($filterItems)->paginate();

                return new PadavineCollection($padavine->appends($request->filter()));
                
            }
        }

    public function store(StorePadavineRequest $request)
    {
        return new PadavineResource(Padavine::create($request->all()));
    }

    
    public function bulkStore(BulkStorePadavineRequest $request)
    {
        $bulk = collect ($request->all())->map(function($arr, $key){
            return Arr::except($arr, ['vremenskaStanicaId','Datum','kolicinaPadavina','prognozaId']);
        });
            Padavine::insert($bulk->toArray());
    }

    public function show(Padavine $padavine)
    {
      return new PadavineResource($padavine);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Padavine $padavine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePadavineRequest $request, Padavine $padavine)
    {
        $padavine->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Padavine $padavine)
    {
        //
    }
}
