<?php

namespace App\Http\Controllers;

use App\Models\KvalitetVazduha;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Filters\KvalitetVazduhaFilter;
use App\Http\Requests\StoreRequests\StoreKvalitetVazduhaRequest;
use App\Http\Requests\UpdateRequests\UpdateKvalitetVazduhaRequest;
use App\Http\Resources\KvalitetVazduhaResource;
use App\Http\Resources\KvalitetVazduhaCollection;   
use App\Http\Requests\BulkStoreRequests\BulkStoreKvalitetVazduhaRequest;


class KvalitetVazduhaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new KvalitetVazduhaFilter();
        $filterItems = $filter ->transform($request); 

        if(count($filterItems)== 0){

            return new KvalitetVazduhaCollection(KvalitetVazduha::paginate());
        }
            else {
                $kvalitetVazduha= KvalitetVazduha::where($filterItems)->paginate();

                return new KvalitetVazduhaCollection($kvalitetVazduha->appends($request->filter()));
                
            }
        }

    public function store(StoreKvalitetVazduhaRequest $request)
    {
        return new KvalitetVazduhaResource(KvalitetVazduha::create($request->all()));
    }

    public function bulkStore(BulkStoreKvalitetVazduhaRequest $request)
    {
        $bulk = collect ($request->all())->map(function($arr, $key){
            return Arr::except($arr, ['vremenskaStanicaId', 'PM10', 'PM25', 'SO2', 'CO', 'O3', 'azotDioksid', 'sumporDioksid']);
        });
            KvalitetVazduha::insert($bulk->toArray());
    }
    public function show(KvalitetVazduha $kvalitetVazduha)
    {
        return new KvalitetVazduhaResource($kvalitetVazduha);
    }


    public function update(UpdateKvalitetVazduhaRequest $request, KvalitetVazduha $kvalitetVazduha)
    {
        $kvalitetVazduha->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KvalitetVazduha $kvalitetVazduha)
    {
        //
    }
}
