<?php

namespace App\Http\Controllers;

use App\Models\Obavijesti;
use Illuminate\Http\Request;
use App\Filters\ObavijestiFilter;
use App\Http\Requests\StoreRequests\StoreObavijestiRequest;
use App\Http\Requests\UpdateRequests\UpdateObavijestiRequest;
use App\Http\Resources\ObavijestiResource;
use App\Http\Resources\ObavijestiCollection;
use Illuminate\Support\Arr;
use App\Http\Requests\BulkStoreRequests\BulkStoreObavijestiRequest;

class ObavijestiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new ObavijestiFilter();
        $filterItems = $filter ->transform($request); 

        if(count($filterItems)== 0){

            return new ObavijestiCollection(Obavijesti::paginate());
        }
            else {
                $obavijesti= Obavijesti::where($filterItems)->paginate();

                return new ObavijestiCollection($obavijesti->appends($request->filter()));
                
            }
        }


    public function store(StoreObavijestiRequest $request)
    {
        return new ObavijestiResource(Obavijesti::create($request->all()));
    }

    
    public function bulkStore(BulkStoreObavijestiRequest $request)
    {
        $bulk = collect ($request->all())->map(function($arr, $key){
            return Arr::except($arr, ['vremenskaStanicaId','tipObavijesti','Sadrzaj']);
        });
            Obavijesti::insert($bulk->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(Obavijesti $obavijesti)
    {
       return new ObavijestiResource($obavijesti);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateObavijestiRequest $request, Obavijesti $obavijesti)
    {
        $obavijesti->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obavijesti $obavijesti)
    {
        //
    }
}
